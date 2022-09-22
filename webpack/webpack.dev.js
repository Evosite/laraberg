const { merge } = require('webpack-merge')
const common = require('./webpack.common.js');
const path = require('path');

module.exports = merge(common, {
    mode: 'development',
    devtool: 'eval-source-map',
    output: {
        filename: 'js/laraberg.js',
        path: path.resolve(__dirname, '../public'),
        library: {
            name: 'Laraberg',
            type: 'umd'
        }
    }
})
