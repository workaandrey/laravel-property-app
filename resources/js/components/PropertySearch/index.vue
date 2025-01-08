<template>
  <div class="property-search">
    <el-alert
      v-if="searchState.error"
      :title="searchState.error"
      type="error"
      show-icon
      :closable="true"
      @close="clearError"
    />

    <SearchForm
      :is-loading="searchState.isLoading"
      :validation-errors="searchState.validationErrors"
      @search="handleSearch"
      @reset="handleReset"
    />

    <ResultsTable
      :properties="properties"
      :is-loading="searchState.isLoading"
      :has-searched="searchState.hasSearched"
    />
  </div>
</template>

<script setup>
import { usePropertySearch } from '../../composables/usePropertySearch'
import SearchForm from './SearchForm.vue'
import ResultsTable from './ResultsTable.vue'

const {
    properties,
    searchState,
    handleSearch,
    handleReset,
    clearError
} = usePropertySearch()
</script>

<style scoped>
.property-search {
  max-width: 1200px;
  margin: 20px auto;
  padding: 0 20px;
}

.el-alert {
  margin-bottom: 20px;
}
</style>
