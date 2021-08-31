const { buildSchema } = require('graphql');

const schemas = buildSchema(`
  type Query {
    currencies: [Currency!],
    historicalData: [DataFlow!]
  }

  type Currency {
    id: String!

  }

  type DataSeriesDetails {
    attributes: []
    observations: []
  }

  type DataSet {
    action: String
    validFrom: String
    series: []
  }

  type DataLink {
    title: String
    rel: String
    href: String
  }

  type DataStructure {
    links: [DataLink]
    name: String
    dimensions: [DataSet]
  }

  
`);

module.exports = schemas;