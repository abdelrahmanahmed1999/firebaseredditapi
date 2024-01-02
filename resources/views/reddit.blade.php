@extends('welcome')
@section('content')

<div class="container">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Kind</th>
            <th>Title</th>
            <th>selftext</th>
        </tr>
    </thead>

    <tbody>

        @forelse($posts as $post)
            <tr>
                <td>{{$post['kind']}}</td>
                <td>{{$post['data']['title']}}</td>
                <td>{{$post['data']['selftext']}}</td>

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
