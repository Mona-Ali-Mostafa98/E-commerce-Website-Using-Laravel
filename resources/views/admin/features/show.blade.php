@extends('admin.layout')
@section('page_title', "Show $feature->title feature")
@section('content')
    <main id="main" class="main">
        <div class="row pagetitle mb-2">
            <div class="col-sm-6 d-flex justify-content-start">
                <h1 class="mb-2 fs-2">Features
                    <a href="{{ route('admin.features.index') }}" class="ms-3 btn btn-outline-primary mb-2 "><i
                            class="bi bi-caret-left-fill"></i> Back</a>
                </h1>
            </div>
            <div class="col-sm-6 d-flex justify-content-end my-2">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">Features</li>
                        <li class="breadcrumb-item active">Show</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fs-4 mb-3">Show Detailes of "{{ $feature->title }}" feature</h5>
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Feature ID</div>
                                    <div class="col-lg-9 col-md-8">{{ $feature->id }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Feature Image</div>
                                    <div class="col-lg-9 col-md-8">
                                        <img id="image" src="{{ asset('images/features/' . $feature->image) }}"
                                            alt="" height="60" width="60">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Feature Description</div>
                                    <div class="col-lg-9 col-md-8">{{ $feature->description }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Status</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ $feature->status }}
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Created At</div>
                                    <div class="col-lg-9 col-md-8">{{ $feature->created_at }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Updated At</div>
                                    <div class="col-lg-9 col-md-8">{{ $feature->updated_at }}</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
