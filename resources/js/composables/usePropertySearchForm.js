import { reactive } from 'vue'

export function usePropertySearchForm() {
    const form = reactive({
        name: '',
        bedrooms: null,
        bathrooms: null,
        storeys: null,
        garages: null,
        price_from: null,
        price_to: null
    })

    const resetForm = () => {
        Object.keys(form).forEach(key => {
            form[key] = null
        })
        form.name = ''
    }

    return {
        form,
        resetForm
    }
}
