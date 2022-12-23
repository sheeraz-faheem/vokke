<template>
  <div class="list row">
    <div class="col-md-6">
      <h4>Kangaroos List</h4>
      <DxDataGrid
        :data-source="kangaroos.data"
        key-expr="id"
        :columns="columns"
        :show-borders="true"
        width="900"
      >
        <DxColumn data-field="name"/>
        <DxColumn data-field="weight"/>
        <DxColumn data-field="height"/>
        <DxColumn data-field="friendliness"/>
        <DxColumn data-field="birthday"/>
        <DxColumn data-field="id" caption="Actions" cell-template="cellTemplate"/>
        <template #cellTemplate="{ data }">
          <div>
            <b-button size="sm" @click="editKangaroo(data.value)">Edit</b-button>
            <b-button variant="danger" size="sm" @click="deleteKangaroo(data.value)">Delete</b-button>
          </div>
        </template>
      </DxDataGrid>
    </div>
  </div>
</template>

<script>
import DxDataGrid, { DxColumn } from 'devextreme-vue/data-grid'
import KangarooService from '../services/KangarooService'

export default {
  components: {
    DxDataGrid,
    DxColumn
  },
  data () {
    return {
      kangaroos: [],
      columns: ['name', 'weight', 'height', 'friendliness', 'birthday', 'id']
    }
  },
  methods: {
    retrieveKangaroos () {
      KangarooService.getAll()
        .then(response => {
          this.kangaroos = response.data
        })
        .catch(e => {
          console.log(e)
        })
    },
    refreshList () {
      this.retrieveKangaroos()
      this.currentKangaroo = null
      this.currentIndex = -1
    },
    editKangaroo (id) {
      this.$router.push(`/kangaroo/${id}`)
    },
    deleteKangaroo (id) {
      KangarooService.delete(id)
        .then(response => {
          this.retrieveKangaroos()
          console.log(response.data)
        })
        .catch(e => {
          console.log(e)
        })
    }
  },
  mounted () {
    this.retrieveKangaroos()
  }
}
</script>

<style>
.list {
  text-align: left;
  max-width: 750px;
  margin: auto;
}
</style>
