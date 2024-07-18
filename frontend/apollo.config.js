// apollo.config.js
module.exports = {
    client: {
      service: {
        name: 'youtube-clone',
        // URL to the GraphQL API
        url: 'http://localhost:80/graphql',
      },
      // Files processed by the extension
      includes: [
        'src/**/*.vue',
        'src/**/*.ts',
      ],
    },
  }