<template>
  <el-card class="search-card">
    <template #header>
      <h2>Property Search</h2>
    </template>

    <el-form @submit.prevent="handleSubmit" class="search-form" :model="form">
      <el-row :gutter="20">
        <el-col :span="8">
          <el-form-item
            :label="FIELD_LABELS[FORM_FIELDS.NAME]"
            :error="validationErrors?.name?.[0]"
          >
            <el-input
              v-model="form.name"
              placeholder="Search by name"
              @keyup.enter="handleSubmit"
            ></el-input>
          </el-form-item>
        </el-col>

        <el-col :span="8">
          <el-form-item
            :label="FIELD_LABELS[FORM_FIELDS.BEDROOMS]"
            :error="validationErrors?.bedrooms?.[0]"
          >
            <el-input-number
              v-model="form.bedrooms"
              :min="0"
              placeholder="Bedrooms"
              controls-position="right"
              class="w-full"
            ></el-input-number>
          </el-form-item>
        </el-col>

        <el-col :span="8">
          <el-form-item
            :label="FIELD_LABELS[FORM_FIELDS.BATHROOMS]"
            :error="validationErrors?.bathrooms?.[0]"
          >
            <el-input-number
              v-model="form.bathrooms"
              :min="0"
              placeholder="Bathrooms"
              controls-position="right"
              class="w-full"
            ></el-input-number>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row :gutter="20">
        <el-col :span="8">
          <el-form-item
            :label="FIELD_LABELS[FORM_FIELDS.STOREYS]"
            :error="validationErrors?.storeys?.[0]"
          >
            <el-input-number
              v-model="form.storeys"
              :min="0"
              placeholder="Storeys"
              controls-position="right"
              class="w-full"
            ></el-input-number>
          </el-form-item>
        </el-col>

        <el-col :span="8">
          <el-form-item
            :label="FIELD_LABELS[FORM_FIELDS.GARAGES]"
            :error="validationErrors?.garages?.[0]"
          >
            <el-input-number
              v-model="form.garages"
              :min="0"
              placeholder="Garages"
              controls-position="right"
              class="w-full"
            ></el-input-number>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row :gutter="20">
        <el-col :span="12">
          <el-form-item label="Price Range">
            <div class="price-range">
              <el-form-item
                :error="validationErrors?.price_from?.[0]"
                class="mb-0"
              >
                <el-input-number
                  v-model="form.price_from"
                  :min="0"
                  placeholder="From"
                  controls-position="right"
                  class="w-full"
                ></el-input-number>
              </el-form-item>
              <el-form-item
                :error="validationErrors?.price_to?.[0]"
                class="mb-0"
              >
                <el-input-number
                  v-model="form.price_to"
                  :min="0"
                  placeholder="To"
                  controls-position="right"
                  class="w-full"
                ></el-input-number>
              </el-form-item>
            </div>
          </el-form-item>
        </el-col>
      </el-row>

      <el-form-item>
        <el-button
          type="primary"
          @click="handleSubmit"
          :loading="isLoading"
          :disabled="isLoading"
        >
          {{ isLoading ? 'Searching...' : 'Search' }}
        </el-button>
        <el-button
          @click="handleReset"
          :disabled="isLoading"
        >
          Reset
        </el-button>
      </el-form-item>
    </el-form>
  </el-card>
</template>

<script setup>
import { usePropertySearchForm } from '../../composables/usePropertySearchForm'
import { FORM_FIELDS, FIELD_LABELS } from '../../constants/propertySearch'

const props = defineProps({
  isLoading: {
    type: Boolean,
    default: false
  },
  validationErrors: {
    type: Object,
    default: () => ({})
  }
})

const emit = defineEmits(['search', 'reset'])

const { form, resetForm } = usePropertySearchForm()

const handleSubmit = () => {
  emit('search', { ...form })
}

const handleReset = () => {
  resetForm()
  emit('reset')
}
</script>

<style scoped>
.search-card {
  margin-bottom: 20px;
}

.search-form {
  padding: 20px 0;
}

.price-range {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 10px;
}

:deep(.el-input-number) {
  width: 100%;
}

:deep(.el-form-item__label) {
  font-weight: bold;
}

:deep(.el-form-item__error) {
  color: var(--el-color-danger);
  font-size: 12px;
  line-height: 1;
  padding-top: 4px;
  position: absolute;
  top: 100%;
  left: 0;
}

.w-full {
  width: 100%;
}

.mb-0 {
  margin-bottom: 0;
}
</style>
