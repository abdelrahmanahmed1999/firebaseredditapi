@extends('welcome')


@section('content')

<div class="container">
    <h3>Total Contact : {{$totalcontact}} </h3>
    @can('add-contacts')
        <a href="{{route('add-contact')}}" class="btn btn-primary my-3">Add Contact</a >
    @endcan
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
                        @can('edit-contacts')
                            <a href="{{route('edit-contact',$key)}}" class="btn btn-success"> Edit</a>
                        @endcan
                        @can('delete-contacts')
                            <a onclick="deleteContact('{{ $key }}')" class="btn btn-danger"> Delete</a>
                        @endcan

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



@push('scripts')

    <script>
        // Ajax request to delete contact
        function deleteContact(key) {
            if (confirm('Are you sure you want to delete this contact?')) {
                $.ajax({
                    url: "{{ url('delete-contacts') }}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "key": key
                    },
                    success: function (data) {
                        location.reload();

                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        }
    </script>
@endpush
