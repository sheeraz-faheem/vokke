import Vue from 'vue'
import Router from 'vue-router'
import KangarooList from '@/components/KangarooList'
import AddKangaroo from '@/components/AddKangaroo'
import Kangaroo from '@/components/Kangaroo'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Kangaroo',
      component: KangarooList
    },
    {
      path: '/kangaroo/:id',
      name: 'Kangaroo Details',
      component: Kangaroo
    },
    {
      path: '/add',
      name: 'Add Kangaroo',
      component: AddKangaroo
    }
  ]
})
