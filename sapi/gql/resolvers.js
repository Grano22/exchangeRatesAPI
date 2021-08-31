var sdmxrest = require('sdmx-rest');
const { calculateDateDiff } = require('../helpers/datetime');

const resolvers = {
    metaDetails() {

    },
    currencies() {
       return [];
    },
    historicalData() {
      var query = {
        flow: 'EXR',
        key: 'A.CHF.EUR.SP00.A',
        startPeroid:calculateDateDiff(new Date(), -2).getFullYear(),
        endPeroid:new Date().getFullYear(),
        includeHistory:true
      };
      return sdmxrest.request(query, 'ECB')
      .then(function(data) {
          let readyData = Object.assign(data);
          return data['dataSets'];
      })
    }
  };
  
module.exports = resolvers;