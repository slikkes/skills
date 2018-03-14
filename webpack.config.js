module.exports = {
    module: {
        rules: [
            {
                test: /\.vue$/,
                use: [
                    {loader: 'vue-loader'}
                ]
            }
        ],
    }
}