import './bootstrap';
import { createApp } from 'vue'
import ElementPlus from 'element-plus';
import 'element-plus/dist/index.css';
import PropertySearch from './components/PropertySearch/index.vue'

const app = createApp(PropertySearch)
app.use(ElementPlus)
app.mount('#app')

// For debugging
console.log('Vue app mounted')
