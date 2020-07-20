@extends('welcome')

@section('content')
    <div class="container">
        <form class="form-horizontal" action="{{route('departments.store')}}" method="post">
            @csrf
            <label for="">Название отдела</label>
            <input type="text" class="form-control" name="name" required>
            <hr />
            <input class="btn btn-primary" type="submit" value="Сохранить">
        </form>
    </div>
@endsection
