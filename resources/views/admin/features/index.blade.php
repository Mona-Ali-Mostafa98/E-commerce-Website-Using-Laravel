@extends('admin.layout')
@section('page_title', 'Features List')
@section('content')
    <main id="main" class="main">
        <div class="row pagetitle mb-2">
            <div class="col-sm-6 d-flex justify-content-start">
                <h1 class="mb-2 fs-2">Features
                    <a href="{{ route('admin.features.create') }}" class="ms-3 btn btn-outline-primary mb-2 ">
                        <i class="bi bi-plus-lg"></i> Create feature</a>
                </h1>
            </div>
            <div class="col-sm-6 d-flex justify-content-end my-2">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">features</li>
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
                            <h5 class="card-title fs-4 mb-3">All features</h5>

                            @include('admin.alerts')

                            <!-- Table with hoverable rows -->
                            <table class="table table-hover table-striped table-bordered border-dark" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($features as $feature)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $feature->id }}</td>
                                            <td><img src="{{ asset('images/features/' . $feature->image) }}" alt=""
                                                    height="60" width="60"></td>
                                            <td class="text-primary fw-bold">{{ $feature->title }}</td>
                                            <td>{{ $feature->status }}</td>
                                            <td>{{ $feature->created_at }}</td>
                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <a href="{{ route('admin.features.show', $feature->id) }}"
                                                        class=" btn btn-sm btn-success">View</a>
                                                    <a href="{{ route('admin.features.edit', $feature->id) }}"
                                                        class=" ms-2 btn btn-sm btn-primary">Edit</a>
                                                    <form class=" ms-2 form-inline" method="post"
                                                        action="{{ route('admin.features.destroy', $feature->id) }}">
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
                            <!-- End Table with hoverable rows -->

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
