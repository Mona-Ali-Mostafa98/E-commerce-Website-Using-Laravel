@extends('admin.layout')
@section('page_title', "Update $setting->title setting")
@section('content')
    <main id="main" class="main">
        <div class="row pagetitle mb-2">
            <div class="col-sm-6 d-flex justify-content-start">
                <h1 class="mb-2 fs-2">settings
                    <a href="{{ route('admin.settings.index') }}" class="ms-3 btn btn-outline-primary mb-2 "><i
                            class="bi bi-caret-left-fill"></i> Back</a>
                </h1>
            </div>
            <div class="col-sm-6 d-flex justify-content-end my-2">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">settings</li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fs-4 mb-3">Update setting</h5>
                            <form method="POST" action="{{ route('admin.settings.update', $setting->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label">Logo</label>
                                    <div class="col-sm-10">
                                        <input name="logo" type="file" id="logo"
                                            class="form-control mb-3 @error('logo') is-invalid @enderror">
                                        @error('logo')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                        <img id="logo" src="{{ asset('images/settings/' . $setting->logo) }}"
                                            style="height: 80px; width: 100px;" alt="no logo uploaded">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input name="title" type="text" id="title"
                                            placeholder="Enter setting title" value="{{ old('title', $setting->title) }}"
                                            class="form-control @error('title') is-invalid @enderror">
                                        @error('title')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" id="description" rows="3" placeholder="Enter setting description"
                                            class="col-sm-12 form-control @error('description') is-invalid @enderror">{{ old('description', $setting->description) }}</textarea>
                                        @error('description')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input name="email" type="text" id="email"
                                            placeholder="Enter setting email" value="{{ old('email', $setting->email) }}"
                                            class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input name="address" type="text" id="address"
                                            placeholder="Enter setting address"
                                            value="{{ old('address', $setting->address) }}"
                                            class="form-control @error('address') is-invalid @enderror">
                                        @error('address')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input name="phone" type="text" id="phone"
                                            placeholder="Enter setting phone" value="{{ old('phone', $setting->phone) }}"
                                            class="form-control @error('phone') is-invalid @enderror">
                                        @error('phone')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="tax_ratio" class="col-sm-2 col-form-label">Tax</label>
                                    <div class="col-sm-10">
                                        <input name="tax_ratio" type="text" id="tax_ratio"
                                            placeholder="Enter setting tax ratio"
                                            value="{{ old('tax_ratio', $setting->tax_ratio) }}"
                                            class="form-control @error('tax_ratio') is-invalid @enderror">
                                        @error('tax_ratio')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input name="image" type="file" id="image"
                                            class="form-control mb-3 @error('image') is-invalid @enderror">
                                        @error('image')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                        <img id="image" src="{{ asset('images/settings/' . $setting->image) }}"
                                            style="height: 80px; width: 100px;" alt="no image uploaded">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
