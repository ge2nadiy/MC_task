<template>
  <div>
    <h1> Department {{department.name}}</h1>
    <hr />
    <div v-if="errors" class="alert alert-danger">
      <div v-for="error in errors" :key="error.id">
        <p class="text-sm">
          {{ error[0] }}
        </p>
      </div>
    </div>
    <div class="container">
      <form class="form-horizontal" @submit.prevent="editDepart()">
        <label for="">Название отдела</label>
        <input type="text" class="form-control" name="name" v-model="department.name">
        <hr />
        <input class="btn btn-primary" type="submit" value="Сохранить">
      </form>
    </div>
  </div>
</template>

<script>
  export default {
    async asyncData({$axios, params}) {
      const department = await $axios.$get('http://localhost:8000/api/departments/' + params.id)
      return {department: department.data}
    },
    methods: {
      editDepart() {
        this.$axios
          .$put('http://localhost:8000/api/departments/' + this.department.id, this.department)
          .then((res) => {
            this.$router.push('/departments')
          })
          .catch(e => this.errors = e.response.data.errors)
        }
      },
    data () {
      return {
        department: null,
        errors: null,
      }
    }
  }
</script>
