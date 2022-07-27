@extends('admin.layout')
@section('page_title', "Show $setting->title setting")
@section('content')
    <main id="main" class="main">
        <div class="row pagetitle mb-2">
            <div class="col-sm-6 d-flex justify-content-start">
                <h1 class="mb-2 fs-2">Settings
                    <a href="{{ route('admin.settings.index') }}" class="ms-3 btn btn-outline-primary mb-2 "><i
                            class="bi bi-caret-left-fill"></i> Back</a>
                </h1>
            </div>
            <div class="col-sm-6 d-flex justify-content-end my-2">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">Settings</li>
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
                            <h5 class="card-title fs-4 mb-3">Show Detailes of Settings </h5>
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Setting ID</div>
                                    <div class="col-lg-9 col-md-8">{{ $setting->id }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Setting Logo</div>
                                    <div class="col-lg-9 col-md-8">
                                        <img id="image" src="{{ asset('images/settings/' . $setting->logo) }}"
                                            alt="" height="100" width="150">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Setting Title</div>
                                    <div class="col-lg-9 col-md-8">{{ $setting->title }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Setting Description</div>
                                    <div class="col-lg-9 col-md-8">{{ $setting->description }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Setting Image</div>
                                    <div class="col-lg-9 col-md-8">
                                        <img id="image" src="{{ asset('images/settings/' . $setting->image) }}"
                                            alt="" height="100" width="150">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Setting Email</div>
                                    <div class="col-lg-9 col-md-8">{{ $setting->email }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Setting Address</div>
                                    <div class="col-lg-9 col-md-8">{{ $setting->address }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Setting Phone</div>
                                    <div class="col-lg-9 col-md-8">{{ $setting->phone }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Setting Tax Ratio</div>
                                    <div class="col-lg-9 col-md-8">{{ $setting->tax_ratio }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Created At</div>
                                    <div class="col-lg-9 col-md-8">{{ $setting->created_at }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Updated At</div>
                                    <div class="col-lg-9 col-md-8">{{ $setting->updated_at }}</div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
