import Vue from 'vue'
import Router from 'vue-router'
import KangarooList from '@/components/KangarooList'
import AddKangaroo from '@/components/AddKangaroo'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Kangaroo',
      component: KangarooList
    },
    {
      path: '/add',
      name: 'Add Kangaroo',
      component: AddKangaroo
    }
  ]
})
