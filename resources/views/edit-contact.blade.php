@extends('welcome')


@section('content')

<div class="container">


    <form action="{{route('update-contact')}}" method="POST" class="w-50 m-auto">
        @csrf
        <input type="hidden" name="key" value="{{$key}}">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{$editdata['name']}}" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Age</label>
            <input type="number" class="form-control" name="age" value="{{$editdata['age']}}" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
