<template>
  <div>
    <h1>Departments</h1>
    <div v-if="errors" class="alert alert-danger">
      {{errors}}
    </div>
    <nuxt-link class="btn btn-primary" to="/departments/create">
      Создать отдел
    </nuxt-link>
    <table class="table table-striped">
      <thead>
      <th>Название отдела</th>
      <th>Кол-во сотрудников отдела</th>
      <th>Макс ЗП среди сотрудников отдела</th>
      <th>Действия</th>
      </thead>
      <tbody>

      <tr v-for="department in departments" :key="department.id" >
        <td>{{department.name}}</td>
        <td>{{department.employees_count}}</td>
        <td>{{department.salary}}</td>
        <td>
          <a href="#" @click.prevent="editDepart(department)">Изменить</a>
          |
          <a href="#" @click.prevent="delDepart(department)">Удалить</a>
        </td>
      </tr>

      <tr v-if="departments.length==0">
        <td colspan="4" class="text-center"><h2>Данные отсутствуют</h2></td>
      </tr>

      </tbody>
      <tfoot>
      <tr>
        <td colspan="4">
          <ul class="pagination pull-right">

          </ul>
        </td>
      </tr>
      </tfoot>
    </table>
  </div>
</template>

<script>
  export default {
    async asyncData({$axios}) {
      const departments = await $axios.$get('http://localhost:8000/api/departments')
      return {departments: departments.data}
    },
    data: () => ({
      departments: [],
      errors: null,
    }),
    methods: {
      editDepart(department) {
        this.$router.push('/departments/' + department.id)
      },
      delDepart(department) {
          this.$axios.$delete('http://localhost:8000/api/departments/' + department.id, department)
            .then((res) => {this.departments = this.departments.filter(item => item.id !== department.id)})
            .catch(e => {this.errors = e.response.data.message})
      },
    }
  }
</script>

<style>

</style>
