import pluginVue from 'eslint-plugin-vue'
import skipFormatting from '@vue/eslint-config-prettier/skip-formatting'
import gitignore from 'eslint-config-flat-gitignore'

export default [
    gitignore(),
    {
        files: ['**/*.{js,ts,mts,tsx,vue}'],
        languageOptions: {
            ecmaVersion: 'latest'
        }
    },
    ...pluginVue.configs['flat/essential'],
    skipFormatting,
    {
        languageOptions: {
            globals: { process: 'readonly' }
        },
        rules: {
            'no-console': process.env.NODE_ENV === 'production' ? 'warn' : 'off',
            'no-debugger': process.env.NODE_ENV === 'production' ? 'warn' : 'off',
            'vue/multi-word-component-names': 'off',
            'no-undef': 'off'
        }
    }
]
