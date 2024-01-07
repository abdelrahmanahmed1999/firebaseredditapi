@extends('welcome')


@section('content')

<div class="container">
    <a href="{{route('add-contact')}}" class="btn btn-primary my-3">Add Contact</a >

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>name</th>
                <th>age</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($contacts as $key=>$value)
                <tr>
                    <td>{{$key}}</td>
                    <td>{{$value['name']}}</td>
                    <td>{{$value['age']}}</td>
                    <td>
                        <button class="btn btn-success"> Edit</button>
                        <button class="btn btn-danger"> Delete</button>

                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="3">No record found</td>
                </tr>
            @endforelse

        </tbody>
    </table>
</div>
@endsection
