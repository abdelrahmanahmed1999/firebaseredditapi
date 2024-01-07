@extends('welcome')
@section('content')

<div class="container">


<ul class="nav nav-tabs" id="myTab" role="tablist">

    <!--start hot tab-->
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Hot</button>
    </li>
    <!--end hot tab-->

    <!--start new tab-->
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">New</button>
    </li>
    <!--end new tab-->

    <!--start raising tab-->
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Raising</button>
  </li>
    <!--end raising tab-->

</ul>


<div class="tab-content" id="myTabContent">

    <!--start content of hot tab-->
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kind</th>
                    <th>Title</th>
                    <th>selftext</th>
                    <th>Actions</th>

                </tr>
            </thead>

            <tbody>

                @forelse($hotposts as $post)
                    <tr>
                        <td>{{$post['kind']}}</td>
                        <td>{{$post['data']['title']}}</td>
                        <td>{{$post['data']['selftext']}}</td>
                        <td>
                            <button class="btn btn-success"> Edit</button>

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
    <!--end content of hot tab-->

    <!--start content of new tab-->
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kind</th>
                    <th>Title</th>
                    <th>selftext</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($newposts as $post)
                    <tr>
                        <td>{{$post['kind']}}</td>
                        <td>{{$post['data']['title']}}</td>
                        <td>{{$post['data']['selftext']}}</td>
                        <td>
                            <button class="btn btn-success"> Edit</button>
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
    <!--end content of new tab-->

    <!--start content of raising tab-->
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kind</th>
                    <th>Title</th>
                    <th>selftext</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($raiseposts as $post)
                    <tr>
                        <td>{{$post['kind']}}</td>
                        <td>{{$post['data']['title']}}</td>
                        <td>{{$post['data']['selftext']}}</td>
                        <td>
                            <button class="btn btn-success"> Edit</button>
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
    <!--end content of raising tab-->

</div>



</div>


@endsection
