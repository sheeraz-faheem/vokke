<template>
  <div class="list row">
    <div class="col-md-6">
      <h4>Kangaroos List</h4>
      <ul class="list-group">
        <li class="list-group-item" :class="{ active: index == currentIndex }" v-for="(kangaroo, index) in kangaroos"
          :key="index">
          {{ kangaroo.name }}
        </li>
      </ul>
    </div>
    <div class="col-md-6">
      <div v-if="currentKangaroo">
        <h4>Kangaroo</h4>
        <div>
          <label><strong>Name:</strong></label> {{ currentKangaroo.name }}
        </div>
        <div>
          <label><strong>Birthday:</strong></label> {{ currentKangaroo.birthday }}
        </div>
        <div>
          <label><strong>Weight:</strong></label> {{ currentKangaroo.weight }}
        </div>
        <div>
          <label><strong>Height:</strong></label> {{ currentKangaroo.height }}
        </div>
        <div>
          <label><strong>Friendliness:</strong></label> {{ currentKangaroo.friendliness }}
        </div>

        <a class="badge badge-warning" :href="'/kangaroos/' + currentKangaroo.id">
          Edit
        </a>
      </div>
    </div>
  </div>
</template>

<script>
import KangarooService from '../services/KangarooService'

export default {
  data () {
    return {
      kangaroos: [],
      currentKangaroo: null,
      currentIndex: -1,
      name: ''
    }
  },
  methods: {
    retrieveKangaroos () {
      KangarooService.getAll()
        .then(response => {
          this.kangaroos = response.data
          console.log(response.data)
        })
        .catch(e => {
          console.log(e)
        })
    },
    refreshList () {
      this.retrieveKangaroos()
      this.currentKangaroo = null
      this.currentIndex = -1
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
