<template>
  <h1>Departments</h1>
  <a href="" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Создать отдел</a>
  <table class="table table-striped">
    <thead>
    <th>Название отдела</th>
    <th>Кол-во сотрудников отдела</th>
    <th>Макс ЗП среди сотрудников отдела</th>
    <th>Действия</th>
    </thead>
    <tbody>
    <!-- -->
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td>
        <a href="">Edit<i class="fa fa-edit"></i></a>
      </td>
    </tr>
    <!--@empty -->

    <!--@endforelse -->
    </tbody>
    <tfoot>
    <tr>
      <td colspan="4">
        <ul class="pagination pull-right">
          <!-- {{$departments->links()}} -->
        </ul>
      </td>
    </tr>
    </tfoot>
  </table>
</template>
