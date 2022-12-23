<template>
  <div>
    <b-container>
      <b-row class="justify-content-md-center">
        <b-col sm="6">
          <b-alert
            :show="success"
            dismissible
            fade
            variant="success"
          >
            Kangaroo successfully added!
          </b-alert>
          <b-card>
            <b-form @submit="onSubmit" @reset="onReset" v-if="show">
              <b-form-group id="input-group-2" label="Name:" label-for="input-2">
                <b-form-input
                  id="input-2"
                  v-model="form.name"
                  placeholder="Enter name"
                  required
                ></b-form-input>
              </b-form-group>

              <b-form-group id="input-group-2" label="Nickname:" label-for="input-2">
                <b-form-input
                  id="input-2"
                  v-model="form.nickname"
                  placeholder="Enter nickname"
                ></b-form-input>
              </b-form-group>

              <b-form-group id="input-group-2" label="Weight:" label-for="input-2">
                <b-form-input
                  id="input-2"
                  v-model="form.weight"
                  placeholder="Enter Weight"
                  required
                ></b-form-input>
              </b-form-group>

              <b-form-group id="input-group-2" label="Height:" label-for="input-2">
                <b-form-input
                  id="input-2"
                  v-model="form.height"
                  placeholder="Enter Weight"
                  required
                ></b-form-input>
              </b-form-group>

              <b-form-group id="input-group-3" label="Gender:" label-for="input-3">
                <b-form-select
                  id="input-3"
                  v-model="form.gender"
                  :options="genders"
                  required
                ></b-form-select>
              </b-form-group>

              <b-form-group id="input-group-2" label="Color:" label-for="input-2">
                <b-form-input
                  id="input-2"
                  v-model="form.color"
                  placeholder="Enter color"
                ></b-form-input>
              </b-form-group>

              <b-form-group id="input-group-3" label="Friendliness:" label-for="input-3">
                <b-form-select
                  id="input-3"
                  v-model="form.friendliness"
                  :options="friendliness"
                ></b-form-select>
              </b-form-group>

              <b-form-group id="input-group-3" label="Birthdate:" label-for="input-3">
                <b-form-datepicker
                  id="example-datepicker"
                  v-model="form.birthday"
                  class="mb-2"
                ></b-form-datepicker>
              </b-form-group>

              <b-button type="submit" variant="primary">Submit</b-button>
              <b-button type="reset" variant="danger">Reset</b-button>
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
  data () {
    return {
      success: false,
      form: {
        name: '',
        nickname: '',
        weight: 0,
        height: 0,
        color: '',
        friendliness: '',
        gender: '',
        birthday: ''
      },
      friendliness: [{ text: 'Select One', value: null }, 'Friendly', 'Not Friendly'],
      genders: [{ text: 'Select One', value: null }, 'Male', 'Female'],
      show: true
    }
  },
  methods: {
    onSubmit (event) {
      event.preventDefault()

      KangarooService.create(this.form).then((response) => {
        console.log(response.data)
        this.success = true
      })
    },
    onReset (event) {
      event.preventDefault()

      this.form.name = ''
      this.form.nickname = ''
      this.form.weight = 0
      this.form.height = 0
      this.form.gender = ''
      this.form.color = ''
      this.form.friendliness = ''
      this.form.birthday = ''

      // Trick to reset/clear native browser form validation state
      this.show = false
      this.$nextTick(() => {
        this.show = true
      })
    },
    countDownChanged (dismissCountDown) {
      this.dismissCountDown = dismissCountDown
    }
  }
}
</script>
<style>
.form-horizontal .control-label{
    text-align: left;
}
</style>
