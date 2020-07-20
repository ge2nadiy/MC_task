@extends('welcome')

@section('content')
    <div class="container">
        <form class="form-horizontal" action="{{route('departments.update', $department)}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <label for="">Название отдела</label>
            <input type="text" class="form-control" name="name" value="{{$department->name}}" required>
            <hr />
            <input class="btn btn-primary" type="submit" value="Сохранить">
        </form>
    </div>
@endsection
