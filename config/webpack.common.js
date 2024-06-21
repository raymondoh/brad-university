const path = require("path");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const CopyWebpackPlugin = require("copy-webpack-plugin");

const environment = require("./environment");

module.exports = {
  entry: {
    main: path.resolve(environment.paths.source, "js", "main.js"),
  },
  output: {
    filename: "js/[name].js",
    path: environment.paths.output,
  },
  module: {
    rules: [
      {
        test: /\.(png|jpe?g|gif|svg)$/i,
        type: "asset",
        parser: {
          dataUrlCondition: {
            maxSize: 8192, // 8kb
          },
        },
      },
      {
        test: /\.(woff(2)?|eot|ttf|otf)$/,
        type: "asset/resource",
      },
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: ["babel-loader"],
      },
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          "css-loader",
          "postcss-loader",
          "sass-loader",
        ],
      },
      {
        test: /\.css$/,
        use: [MiniCssExtractPlugin.loader, "css-loader"],
      },
    ],
  },
  plugins: [
    new CleanWebpackPlugin(),
    new MiniCssExtractPlugin({
      filename: "css/[name].css",
    }),
    new CopyWebpackPlugin({
      patterns: [
        {
          from: path.resolve(environment.paths.source, "images"),
          to: path.resolve(environment.paths.output, "images"),
        },
      ],
    }),
    ...["index", "about", "services", "service-1"].map(
      (name) =>
        new HtmlWebpackPlugin({
          template: path.resolve(environment.paths.source, `${name}.html`),
          favicon: path.resolve(
            environment.paths.source,
            "images/icons/favicon.ico",
          ),
          filename: `${name}.html`,
          inject: true,
          hash: true,
        }),
    ),
  ],
};
