import postcss from 'rollup-plugin-postcss'
import postcssNesting from 'postcss-nesting'
import watch from 'rollup-plugin-watch'

export default [
    {
        input: './src/js/main.js',
        output: {
            file: './assets/js/main.js',
        },
        plugins: [
            watch({
                dir: './src/js/',
            }),
        ],
    },
    {
        input: './src/css/main.css',
        output: {
            file: './assets/css/main.css',
        },
        plugins: [
            watch({
                dir: './src/css/',
            }),
            postcss({
                extract: true,
                minimize: true,
            }),
            postcssNesting(),
        ],
    },
    // {
    //     input: {
    //         edit: './src/blocks/copyright-date-block/src/edit.js',
    //         index: './src/blocks/copyright-date-block/src/index.js',
    //         view: './src/blocks/copyright-date-block/src/view.js',
    //     },
    //     output: {
    //         chunkFileNames: '[name].[ext]',
    //         entryFileNames: '[name].js',
    //         dir: './src/blocks/copyright-date-block/build',
    //     },
    //     plugins: [
    //         babel({
    //             babelHelpers: 'bundled',
    //             exclude: 'node_modules/**',
    //             presets: ['@babel/preset-env', '@babel/preset-react'],
    //         }),
    //         json(),
    //         postcss({
    //             extract: true,
    //             minimize: true,
    //         }),
    //     ],
    // },
]
