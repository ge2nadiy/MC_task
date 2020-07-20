<template>
  <div>
    <table class="table table-striped">
      <thead >
      <tr align="center">
        <th> </th>
        <th v-for="department in departments" :key="department.id">
          Отдел {{department.name}}
        </th>
      </tr>
      </thead>

      <tbody>
      <tr v-for="employee in employees" :key="employee.id">
        <td>{{employee.first_name}} {{employee.last_name}}</td>
        <td v-for="department in departments" :key="department.id" align="center">
          {{setka(employee, department)}}
        </td>
      </tr>
      <tr v-if="employees.length === 0">
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
  async asyncData ({$axios}) {
    const employees = await $axios.$get('http://localhost:8000/api/employees')
    const departments = await $axios.$get('http://localhost:8000/api/departments')
    return {
      employees: employees.data,
      departments: departments.data
    }
  },
  methods: {
    setka: function (employee, department) {
      if (employee.departments.find(x => x.id === department.id))
        return '✓'
      else
        return null
    }
  },
}
</script>

<style>

</style>

