import js from '@eslint/js'
import pluginVue from 'eslint-plugin-vue'
import globals from 'globals'

export default [
    {
        files: ['**/*.{js,vue}'],
        languageOptions: {
            globals: globals.browser,
        },
        rules: {
            'vue/multi-word-component-names': 'off',
            'vue/require-v-for-key': 'error',
            'vue/no-unused-vars': 'error',
        },
    },

    js.configs.recommended,

    ...pluginVue.configs['flat/recommended'],

    {
        ignores: [
            'dist/**',
            'node_modules/**',
        ],
    },
]
