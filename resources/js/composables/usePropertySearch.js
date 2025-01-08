import { ref, reactive } from 'vue'
import { ElMessage } from 'element-plus'
import { PropertyService } from '../services/PropertyService'

export function usePropertySearch() {
    const properties = ref([])
    const searchState = reactive({
        isLoading: false,
        hasSearched: false,
        error: null,
        validationErrors: {}
    })

    const handleSearch = async (filters) => {
        searchState.isLoading = true
        searchState.error = null
        searchState.validationErrors = {}

        try {
            const data = await PropertyService.searchProperties(filters)
            properties.value = data
            searchState.hasSearched = true

            if (data.length === 0) {
                ElMessage({
                    message: 'No properties found',
                    type: 'info'
                })
            }
        } catch (error) {
            if (error.response?.status === 422) {
                searchState.validationErrors = error.response.data.errors
            } else {
                searchState.error = error.response?.data?.message || 'An error occurred while searching'
            }
        } finally {
            searchState.isLoading = false
        }
    }

    const handleReset = () => {
        properties.value = []
        searchState.hasSearched = false
        searchState.error = null
        searchState.validationErrors = {}
    }

    const clearError = () => {
        searchState.error = null
    }

    return {
        properties,
        searchState,
        handleSearch,
        handleReset,
        clearError
    }
}
