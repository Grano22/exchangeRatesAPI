const { buildSchema } = require('graphql');

const schemas = buildSchema(`
  type Query {
    hello: String
  }

  type Currency {
       
  }
`);

module.exports = schemas;