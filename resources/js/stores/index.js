import { createPinia } from "pinia";
import router from "../router";
import { markRaw } from 'vue'
const stores = createPinia()
stores.use(({ store }) => {
    store.router = markRaw(router)
    })
export default stores
