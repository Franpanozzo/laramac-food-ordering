import { usePage } from '@inertiajs/vue3'

export const Can = {
    install: (v) => {
        const page = usePage()

        console.log('Installing Can plugin');

        const can = (permission) => {
            return page.props.auth.permissions.includes(permission)
        }

        v.mixin({
            methods: { can }
        })
    }
} 