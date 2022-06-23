import { defineCustomElement } from 'vue'
import Results from './App.ce.vue'

const element = defineCustomElement(Results)
customElements.define('guidance-results', element)