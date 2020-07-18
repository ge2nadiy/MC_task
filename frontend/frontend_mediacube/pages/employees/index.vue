<template>
  <div>
    <h1>Employees</h1>
    <nuxt-link class="btn btn-primary" to="/employees/create">
      Создать сотрудника
    </nuxt-link>
    <table class="table table-striped">
      <thead>
      <th>Имя</th>
      <th>Фамилия</th>
      <th>Отчество</th>
      <th>Пол</th>
      <th>Заработная плата</th>
      <th>Названия отделов</th>
      <th>Действия</th>
      </thead>
      <tbody>

      <tr v-for="employee in employees" :key="employee.id">
        <td>{{employee.first_name}}</td>
        <td>{{employee.last_name}}</td>
        <td>{{employee.middle_name}}</td>
        <td>{{employee.sex}}</td>
        <td>{{employee.salary}}</td>
        <td>
          {{departments(employee)}}
        </td>
        <td>
          <a href="#" @click.prevent="editEmpl(employee)">Изменить</a>
          |
          <a href="#" @click.prevent="delEmpl(employee)">Удалить</a>
        </td>
      </tr>
      <tr v-if="employees.length==0">
        <td colspan="7" class="text-center"><h2>Данные отсутствуют</h2></td>
      </tr>
      </tbody>
      <tfoot>
      <tr>
        <td colspan="7">
          <ul class="pagination pull-right">
            <!-- {{$employees->links()}} -->
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
      const employees = await $axios.$get('http://localhost:8000/api/employees')
      return {employees: employees.data}
    },
    data() {
      return {
        employees: [],
        errors: [],
      }
    },
    methods: {
      editEmpl(employee) {
        this.$router.push('/employees/' + employee.id)
      },
      delEmpl(employee) {
        this.$axios.$delete('http://localhost:8000/api/employees/' + employee.id, employee)
          .then((res) => {this.employees = this.employees.filter(item => item.id !== employee.id)})
      },
      departments(employee) {
        let department = employee.departments.map(function (depart) {
          return depart.name
        })
        return department.join(', ')
      },
    }
  }
</script>

<style>

</style>
