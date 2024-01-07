@extends('welcome')


@section('content')

<div class="container">

    <a href="{{route('contacts')}}" class="btn btn-secondary my-3 ">Contacts</a >

    <form action="{{route('store-contact')}}" method="POST" class="w-50 m-auto">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Age</label>
            <input type="number" class="form-control" name="age" id="exampleInputPassword1">
        </div>

<button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
