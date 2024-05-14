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

function fileExists(name) {
    try {
        return fs.statSync(name).isFile()
    } catch {
        return false
    }
}

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
    const cssInput = `blocks/${b}/${b}.css`
    const jsInput = `blocks/${b}/${b}.js`
    const bConfig = []

    if (fileExists(cssInput)) {
        bConfig.push({
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
        })
    }

    if (fileExists(jsInput)) {
        bConfig.push({
            input: `blocks/${b}/${b}.js`,
            output: {
                file: `./assets/blocks/${b}/${b}.min.js`,
            },
        })
    }

    config = [...config, ...bConfig]
})

export default config
