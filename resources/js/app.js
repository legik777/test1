import { createApp, markRaw } from "vue";
import "./bootstrap";
import "../css/app.css";
import Index from "./components/Index.vue";
import router from "./router";
import stores from "./stores";
import axios from "axios";
stores.use(({ store }) => {
    store.router = markRaw(router);
});
const app = createApp({});
app.use(router);
app.use(stores);
app.config.globalProperties.axios = axios;
app.component("index-component", Index);
app.mount("#app");
import "/src/plugins/fontello/fontello.css";
