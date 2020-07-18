@extends('welcome')

@section('content')
    <h1>Departments</h1>
    <a href="{{route('departments.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Создать отдел</a>
    <table class="table table-striped">
        <thead>
        <th>Название отдела</th>
        <th>Кол-во сотрудников отдела</th>
        <th>Макс ЗП среди сотрудников отдела</th>
        <th>Действия</th>
        </thead>
        <tbody>
        @forelse($departments as $department)
            <tr>
                <td>{{$department->name}}</td>
                <td></td>
                <td></td>
                <td>
                    <a href="{{route('departments.edit', $department)}}">Edit<i class="fa fa-edit"></i></a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center"><h2>Данные отсутствуют</h2></td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4">
                <ul class="pagination pull-right">
                    {{$departments->links()}}
                </ul>
            </td>
        </tr>
        </tfoot>
    </table>
@endsection
