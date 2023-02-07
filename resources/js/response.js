require('./bootstrap');

import { createApp } from "vue";
import ResponseComponent from "./components/ResponseComponent.vue";
createApp({
    components: {
        ResponseComponent,
        
    },
}).mount("#response");