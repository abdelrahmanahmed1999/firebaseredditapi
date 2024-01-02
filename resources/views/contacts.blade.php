@extends('welcome')


@section('content')


<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>name</th>
            <th>age</th>
        </tr>
    </thead>

    <tbody>
        @forelse($contacts as $key=>$value)
            <tr>
                <td>{{$key}}</td>
                <td>{{$value['name']}}</td>
                <td>{{$value['age']}}</td>

            </tr>
        @empty
            <tr>
                <td colspan="3">No record found</td>
            </tr>
        @endforelse

    </tbody>
</table>

@endsection
