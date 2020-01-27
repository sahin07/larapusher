import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from './../components/Login/Login'
import SignUp from './../components/Login/Signup'
import Forum from './../components/Forum/Forum'
import Logout from './../components/Login/Logout'
import Read from './../components/Forum/SingleQuestion'
import CreateQuestion from './../components/Forum/CreateQuestion'
Vue.use(VueRouter)


const routes = [
     { path: '/login', component: Login },
     { path: '/signup', component: SignUp },
     { path: '/craetequestion', component: CreateQuestion },
     { path: '/forum', component: Forum, name:'forum' },
     { path: '/question/:slug', component: Read },
     { path: '/logout', component: Logout },
  ]

  const router = new VueRouter({
      mode:'history',
    routes // short for `routes: routes`
  })

  export default router;
