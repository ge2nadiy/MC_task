<template>
  <div>
    <div v-if="errors" class="alert alert-danger">
      <div v-for="error in errors" :key="error.id">
        <p class="text-sm">
          {{ error[0] }}
        </p>
      </div>
    </div>
    <div class="container">
      <form class="form-horizontal" @submit.prevent="departmentSave()">
        <label>Название отдела</label>
        <input type="text" class="form-control" name="name" v-model="department.name">
        <hr />
        <input class="btn btn-primary" type="submit" value="Сохранить">
      </form>
    </div>
  </div>
</template>

<script>
  export default {
    data () {
      return {
        department: {
          name: ''
        },
        errors: null,
      }
    },
    methods: {
       departmentSave() {
         this.$axios
          .$post('http://localhost:8000/api/departments', this.department)
          .then((res) => {
            this.$router.push('/departments')
          })
          .catch(e => this.errors = e.response.data.errors)
      }
    },
  }
</script>
