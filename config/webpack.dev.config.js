const { merge } = require("webpack-merge");
const commonConfig = require("./webpack.common");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const DashboardPlugin = require("webpack-dashboard/plugin");

module.exports = merge(commonConfig, {
  mode: "development",
  devtool: "eval-source-map",
  plugins: [
    new BrowserSyncPlugin({
      host: "localhost",
      port: 3001,
      proxy: "http://localhost:8080",
    }),
    new DashboardPlugin(),
  ],
  devServer: {
    static: "./dist",
    hot: true,
    client: {
      overlay: true,
    },
    compress: true,
    port: 8080,
  },
});
