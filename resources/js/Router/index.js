import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from './../components/Login/Login'
import SignUp from './../components/Login/Signup'
Vue.use(VueRouter)


const routes = [
     { path: '/login', component: Login },
     { path: '/signup', component: SignUp }
  ]

  const router = new VueRouter({
      mode:'history',
    routes // short for `routes: routes`
  })

  export default router;
