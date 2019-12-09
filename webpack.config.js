const path = require('path')
const { VueLoaderPlugin } = require('vue-loader')
const { HotModuleReplacementPlugin } = require('webpack')

module.exports = {
  entry: './app.js',
  output: {
    path: path.resolve(__dirname, 'js'),
    filename: 'bundle.js',
    hotUpdateChunkFilename: 'hot/hot-update.js',
    hotUpdateMainFilename: 'hot/hot-update.json'
  },
  module: {
    rules: [{
      test: /\js$/,
      exclude: /node-modules/,
      use: {
        loader: 'babel-loader',
        options: {
          presets: ['@babel/preset-env']
        }
      }
    },
    {
      test: /\.vue$/,
      loader: 'vue-loader'
    },
    {
      test: /\.css$/,
      use: [
        'vue-style-loader',
        'css-loader'
      ]
    }
  ]
  },
  plugins: [
    new VueLoaderPlugin(),
    new HotModuleReplacementPlugin(),
  ]
}