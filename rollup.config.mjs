import postcss from 'rollup-plugin-postcss'
import postcssNesting from 'postcss-nesting'
import { folderInput } from 'rollup-plugin-folder-input'

export default [
    {
        input: './src/js/main.js',
        output: {
            file: './assets/js/main.js',
        },
        plugins: [],
    },
    {
        input: './src/css/main.css',
        output: {
            file: './assets/css/main.css',
        },
        plugins: [
            postcss({
                extract: true,
                minimize: true,
            }),
            postcssNesting(),
        ],
    },
    {
        input: './src/blocks/**/*.css',
        output: {
            dir: './assets/blocks/css/',
        },
        plugins: [
            folderInput(),
            postcss({
                extract: true,
                minimize: true,
            }),
            postcssNesting(),
        ],
    },
]
