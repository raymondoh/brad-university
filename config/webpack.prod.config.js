const { merge } = require("webpack-merge");
const commonConfig = require("./webpack.common");
const TerserPlugin = require("terser-webpack-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const BundleAnalyzerPlugin =
  require("webpack-bundle-analyzer").BundleAnalyzerPlugin;

module.exports = merge(commonConfig, {
  mode: "production",
  optimization: {
    minimizer: [new TerserPlugin({ parallel: true }), new CssMinimizerPlugin()],
  },
  plugins: [
    new BundleAnalyzerPlugin({
      analyzerMode: "static",
      openAnalyzer: true,
    }),
  ],
});
