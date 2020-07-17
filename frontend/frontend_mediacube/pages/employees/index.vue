<template>
  <h1>Employees</h1>

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
    <!--@forelse() -->
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>
        <a href="">dsad<i class="fa fa-edit"></i></a>
      </td>
    </tr>
    <!--@empty -->

    <!--@endforelse -->
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
</template>
