import Vue from 'vue'
import App from './App'
import uView from "uview-ui"
import http from './common/http/axios.js'
import httpApi from './common/httpApi.js'
Vue.use(uView);
//import './assets/styles/iconfont/iconfont.css'

Vue.config.productionTip = false
Vue.prototype.$http = http;
Vue.prototype.$api = httpApi;

App.mpType = 'app'

const app = new Vue({
    ...App
})
app.$mount()
