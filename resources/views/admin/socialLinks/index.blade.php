@extends('admin.layout')
@section('page_title', 'Social Links List')
@section('content')
    <main id="main" class="main">
        <div class="row pagetitle mb-2">
            <div class="col-sm-6 d-flex justify-content-start">
                <h1 class="mb-2 fs-2">Social Links </h1>
            </div>
            <div class="col-sm-6 d-flex justify-content-end my-2">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">Social Links</li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </nav>

            </div>
        </div>
        <!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fs-4 mb-3">All Social Links</h5>

                            @include('admin.alerts')

                            <table class="table table-hover table-striped table-bordered border-dark" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Website Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Updated At</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($links as $link)
                                        <tr>
                                            <td>{{ $link->id }}</td>
                                            <td>{{ $link->website_name }}</td>
                                            <td>{{ $link->status }}</td>
                                            <td>{{ $link->created_at->toDateString() }}</td>
                                            <td>{{ $link->updated_at->toDateString() }}</td>
                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <a href="{{ route('admin.social-links.show', $link->id) }}"
                                                        class=" btn btn-sm btn-success">View</a>
                                                    <a href="{{ route('admin.social-links.edit', $link->id) }}"
                                                        class=" ms-2 btn btn-sm btn-primary">Edit</a>
                                                    <form class=" ms-2 form-inline" method="post"
                                                        action="{{ route('admin.social-links.destroy', $link->id) }}">
                                                        @csrf
                                                        @method ('delete')
                                                        <button type="submit" class="btn btn-sm btn-danger "
                                                            onclick="return confirm('Are you sure you to delete this record from Database?')">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
