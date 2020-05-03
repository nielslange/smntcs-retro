/// <reference types="cypress" />
// ***********************************************************
// This example plugins/index.js can be used to load plugins
//
// You can change the location of this file or turn off loading
// the plugins file with the 'pluginsFile' configuration option.
//
// You can read more here:
// https://on.cypress.io/plugins-guide
// ***********************************************************

const browserify = require('@cypress/browserify-preprocessor')

module.exports = (on) => {
  const options = browserify.defaultOptions
  const envPreset = options.browserifyOptions.transform[1][1].presets[0]
  options.browserifyOptions.transform[1][1].presets[0] = [envPreset, { ignoreBrowserslistConfig: true }]

  on('file:preprocessor', browserify(options))
}