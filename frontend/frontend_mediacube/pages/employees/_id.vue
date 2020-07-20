<template>
  <div>
    <div v-if="errors" class="alert alert-danger">
      <div v-for="error in errors" :key="error.id">
        <p class="text-sm">
          {{error[0]}}
        </p>
      </div>
    </div>
    <div class="container">
      <form class="form-horizontal" @submit.prevent="employeeEdit()">
        <br>
        <label>Имя</label>
        <input type="text" class="form-control" name="name" v-model="employee.first_name">
        <label>Фамилия</label>
        <input type="text" class="form-control" name="name" v-model="employee.last_name">
        <label>Отчество</label>
        <input type="text" class="form-control" name="name" v-model="employee.middle_name">
        <label>Пол</label>
        <br>
        <input type="radio" value="true" v-model="employee.sex">
        <label>Мужской</label>
        <input type="radio" value="false" v-model="employee.sex">
        <label>Женский</label>
        <br>
        <label>Зарплата</label>
        <input type="number" class="form-control" name="name" v-model="employee.salary">
        <label>Отделы</label>
        <div v-for="department in departments" :key="department.id">
          <input type="checkbox" :value="department.id" v-model="employee.selectedDepart">
          <label>{{department.name}}</label><br>
        </div>
        <hr />
        <input class="btn btn-primary" type="submit" value="Сохранить">
      </form>
    </div>
  </div>
</template>

<script>
  export default {
    async asyncData({$axios, params}) {
      const employee = await $axios.$get('http://localhost:8000/api/employees/' + params.id)
      const departments = await $axios.$get('http://localhost:8000/api/departments')
      return {
        employee: employee.data,
        departments: departments.data
      }
    },
    data () {
      return {
        employee: {
          selectedDepart: [],
          departments: []
        },
        departments: null,
        errors: null,
      }
    },
    created() {
      this.employee.selectedDepart = this.employee.departments.map(function (depart) {
          return depart.id
        })
    },
    methods: {
      employeeEdit() {
        this.$axios.$put('http://localhost:8000/api/employees/' + this.employee.id, this.employee)
          .then(res => this.$router.push('/employees'))
          .catch(e => this.errors = e.response.data.errors)
      }
    },
  }
</script>
