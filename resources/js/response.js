require('./bootstrap');

// import { createApp } from "vue";

// createApp({
//     data() {
//       return {
//         message: 'Hello Vue!'
//       }
//     }
//   }).mount('#response')

import { createApp } from "vue";
import ResponseComponent from "./components/ResponseComponent.vue";

createApp({
    components: {
        ResponseComponent,
    },
}).mount("#response");