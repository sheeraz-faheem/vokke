import Vue from 'vue'
import Router from 'vue-router'
import Kangaroo from '@/components/Kangaroo'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Kangaroo',
      component: Kangaroo
    }
  ]
})
