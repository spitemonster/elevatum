import postcss from 'rollup-plugin-postcss'
import postcssNesting from 'postcss-nesting'
import { folderInput } from 'rollup-plugin-folder-input'
import fs from 'fs'

function getDirectories(path) {
    return fs.readdirSync(path).filter(function (file) {
        return fs.statSync(path + '/' + file).isDirectory()
    })
}

const blocks = getDirectories('./blocks/')

let config = [
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
]

blocks.forEach((b) => {
    const bConfig = [
        {
            input: `blocks/${b}/${b}.css`,
            output: {
                file: `./assets/blocks/${b}/${b}.min.css`,
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
            input: `blocks/${b}/${b}.js`,
            output: {
                file: `./assets/blocks/${b}/${b}.min.js`,
            },
        },
    ]

    config = [...config, ...bConfig]
})

console.log(config)
export default config
