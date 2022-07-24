@extends('admin.layout')
@section('page_title', "Update $link->website_name Website")
@section('content')
    <main id="main" class="main">
        <div class="row pagetitle mb-2">
            <div class="col-sm-6 d-flex justify-content-start">
                <h1 class="mb-2 fs-2">Social Links
                    <a href="{{ route('admin.social-links.index') }}" class="ms-3 btn btn-outline-primary mb-2 "><i
                            class="bi bi-caret-left-fill"></i> Back</a>
                </h1>
            </div>
            <div class="col-sm-6 d-flex justify-content-end my-2">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">Social Links</li>
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
                            <h5 class="card-title fs-4 mb-3">Update Website</h5>
                            <form method="POST" action="{{ route('admin.social-links.update', $link->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row mb-4">
                                    <label for="website_name" class="col-sm-2 col-form-label">Website Name</label>
                                    <div class="col-sm-10">
                                        <input name="website_name" type="text" id="website_name"
                                            placeholder="Enter Website Name"
                                            value="{{ old('website_name', $link->website_name) }}"
                                            class="form-control @error('website_name') is-invalid @enderror">
                                        @error('website_name')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="website_icon" class="col-sm-2 col-form-label">Website Icon</label>
                                    <div class="col-sm-10">
                                        <input name="website_icon" type="text" id="website_icon"
                                            placeholder="Enter Website Name"
                                            value="{{ old('website_icon', $link->website_icon) }}"
                                            class="form-control @error('website_icon') is-invalid @enderror">
                                        @error('website_icon')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="website_url" class="col-sm-2 col-form-label">Website Url</label>
                                    <div class="col-sm-10">
                                        <input name="website_url" type="text" id="website_url"
                                            placeholder="Enter Website Name"
                                            value="{{ old('website_url', $link->website_url) }}"
                                            class="form-control @error('website_url') is-invalid @enderror">
                                        @error('website_url')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select name="status" id="status"
                                            class="form-select @error('status') is-invalid @enderror">
                                            <option value="show" @if ($link->status == 'show' or old('status') == 'show') selected @endif>Show
                                            </option>
                                            <option value="hide" @if ($link->status == 'hide' or old('status') == 'hide') selected @endif>Hide
                                            </option>
                                        </select>
                                        @error('status')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
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
