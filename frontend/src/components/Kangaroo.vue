<template>
  <div v-if="kangaroo">
    <b-container>
      <b-row class="justify-content-md-center">
        <b-col sm="6">
          <b-alert
            :show="success"
            dismissible
            fade
            variant="success"
          >
            {{ message }}
          </b-alert>
          <b-card>
            <b-form @submit="updateKangaroo">
              <b-form-group id="input-group-2" label="Name:" label-for="input-2">
                <b-form-input
                  id="input-2"
                  v-model="kangaroo.name"
                  placeholder="Enter name"
                  required
                ></b-form-input>
              </b-form-group>

              <b-form-group id="input-group-2" label="Nickname:" label-for="input-2">
                <b-form-input
                  id="input-2"
                  v-model="kangaroo.nickname"
                  placeholder="Enter nickname"
                ></b-form-input>
              </b-form-group>

              <b-form-group id="input-group-2" label="Weight:" label-for="input-2">
                <b-form-input
                  id="input-2"
                  v-model="kangaroo.weight"
                  placeholder="Enter Weight"
                  required
                ></b-form-input>
              </b-form-group>

              <b-form-group id="input-group-2" label="Height:" label-for="input-2">
                <b-form-input
                  id="input-2"
                  v-model="kangaroo.height"
                  placeholder="Enter Weight"
                  required
                ></b-form-input>
              </b-form-group>

              <b-form-group id="input-group-3" label="Gender:" label-for="input-3">
                <b-form-select
                  id="input-3"
                  v-model="kangaroo.gender"
                  :options="genders"
                  required
                ></b-form-select>
              </b-form-group>

              <b-form-group id="input-group-2" label="Color:" label-for="input-2">
                <b-form-input
                  id="input-2"
                  v-model="kangaroo.color"
                  placeholder="Enter color"
                ></b-form-input>
              </b-form-group>

              <b-form-group id="input-group-3" label="Friendliness:" label-for="input-3">
                <b-form-select
                  id="input-3"
                  v-model="kangaroo.friendliness"
                  :options="friendliness"
                ></b-form-select>
              </b-form-group>

              <b-form-group id="input-group-3" label="Birthdate:" label-for="input-3">
                <b-form-datepicker
                  id="example-datepicker"
                  v-model="kangaroo.birthday"
                  class="mb-2"
                ></b-form-datepicker>
              </b-form-group>

              <b-button type="submit" variant="primary">Update</b-button>
            </b-form>
          </b-card>
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
import KangarooService from '../services/KangarooService'

export default {
  name: 'kangaroo',
  data () {
    return {
      success: false,
      kangaroo: null,
      message: 'Kangaroo was updated successfully!',
      friendliness: [{ text: 'Select One', value: null }, 'Friendly', 'Not Friendly'],
      genders: [{ text: 'Select One', value: null }, 'Male', 'Female']
    }
  },
  methods: {
    getKangaroo (id) {
      KangarooService.get(id)
        .then(response => {
          this.kangaroo = response.data.data
          console.log(this.kangaroo)
        })
        .catch(e => {
          console.log(e)
        })
    },
    updateKangaroo () {
      KangarooService.update(this.kangaroo.id, this.kangaroo)
        .then(response => {
          console.log(response.data)
          this.success = true
        })
        .catch(e => {
          console.log(e)
        })
    }
  },
  mounted () {
    this.getKangaroo(this.$route.params.id)
  }
}
</script>
