import './bootstrap'

import '../sass/app.scss'

import * as bootstrap from 'bootstrap'




import {createApp} from 'vue'

// import AlumnoList from './components/AlumnoList.vue'
import MaestroList from './components/MaestroList.vue'

// createApp(AlumnoList).mount("#app")
createApp(MaestroList).mount("#app")

