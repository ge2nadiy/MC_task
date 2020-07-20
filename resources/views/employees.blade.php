@extends('welcome')

@section('content')
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
        @forelse($employees as $employee)
            <tr>
                <td>{{$employee->first_name}}</td>
                <td>{{$employee->last_name}}</td>
                <td>{{$employee->middle_name}}</td>
                <td>{{$employee->male}}</td>
                <td>{{$employee->salary}}</td>
                <td></td>
                <td>
                   <a href="">dsad<i class="fa fa-edit"></i></a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center"><h2>Данные отсутствуют</h2></td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7">
                    <ul class="pagination pull-right">
                        {{$employees->links()}}
                    </ul>
                </td>
            </tr>
        </tfoot>
    </table>
@endsection
