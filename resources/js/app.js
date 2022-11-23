import './bootstrap'

import '../sass/app.scss'

import * as bootstrap from 'bootstrap'


// import { createApp } from 'vue';



// import app from './layouts/app.vue'
// import app2 from './components/ExampleComponent.vue'


// import MyComponent from './layouts/app.vue'

import {createApp} from 'vue'

import AlumnoList from './components/AlumnoList.vue'

createApp(AlumnoList).mount("#app")


// createApp(app).mount("#app")


// createApp(app).mount("#app")
// createApp(app2).mount("#app2")
