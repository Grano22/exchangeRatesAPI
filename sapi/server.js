'use strict';

const express = require('express');
const { graphqlHTTP } = require('express-graphql')
const resolvers = require('./gql/resolvers');
const schemas = require('./gql/schemas');
const SDWService = require('./services/sdw');

var sdmxrest = require('sdmx-rest');

const PORT = 9082;
const HOST = '0.0.0.0';

(async ()=>{    
    const app = express();

    app.set('views', './views');
    app.set('view engine', 'pug');

    app.use('/graphql', graphqlHTTP({
        schema: schemas,
        rootValue: resolvers,
        graphiql: true,
    }));

    app.get('*', (req, res, next) => {
        //res.status(200).send('404');
        next();
    });

    app.get('/', (req, res) => {
        res.render('index');
    });

    app.get('/fetch', async (req, res) => {
        res.type('json');
        var query = {
            flow: 'EXR',
            key: 'A.CHF.EUR.SP00.A'
        };
        sdmxrest.request(query, 'ECB')
        .then(function(data) {
            let readyData = Object.assign(data);
            res.end(data);
        })
        .catch(function(error){
            res.end('{"status":"fail"}');
        });
    });

    app.listen(PORT, HOST);
    console.log(`Running on http://${HOST}:${PORT}`);
})();