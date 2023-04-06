import './bootstrap';

import {createApp} from 'vue'

import App from './App.vue'
import AddClient from "./Components/AddClient.vue";

createApp(App).mount("#app")
createApp(AddClient).mount('#addClient')
