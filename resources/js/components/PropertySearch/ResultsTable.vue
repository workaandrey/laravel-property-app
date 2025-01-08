<template>
  <el-card v-if="properties.length > 0" class="results-card">
    <template #header>
      <h3>Search Results ({{ properties.length }} properties found)</h3>
    </template>

    <el-table
      :data="properties"
      style="width: 100%"
      v-loading="isLoading"
    >
      <el-table-column prop="name" label="Name" sortable></el-table-column>
      <el-table-column prop="price" label="Price" sortable>
        <template #default="scope">
          ${{ formatPrice(scope.row.price) }}
        </template>
      </el-table-column>
      <el-table-column prop="bedrooms" label="Bedrooms" sortable></el-table-column>
      <el-table-column prop="bathrooms" label="Bathrooms" sortable></el-table-column>
      <el-table-column prop="storeys" label="Storeys" sortable></el-table-column>
      <el-table-column prop="garages" label="Garages" sortable></el-table-column>
    </el-table>
  </el-card>

  <el-empty
    v-else-if="!isLoading && hasSearched"
    description="No properties found matching your criteria"
  ></el-empty>
</template>

<script setup>
defineProps({
  properties: {
    type: Array,
    required: true
  },
  isLoading: {
    type: Boolean,
    default: false
  },
  hasSearched: {
    type: Boolean,
    default: false
  }
})

const formatPrice = (price) => {
  return new Intl.NumberFormat('en-US').format(price)
}
</script>

<style scoped>
.results-card {
  margin-top: 20px;
}

:deep(.el-table .cell) {
  white-space: nowrap;
}
</style>
