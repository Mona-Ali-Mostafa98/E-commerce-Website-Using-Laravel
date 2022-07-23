@extends('admin.layout')
@section('page_title', "Show $product->name Product")
@section('content')
    <main id="main" class="main">
        <div class="row pagetitle mb-2">
            <div class="col-sm-6 d-flex justify-content-start">
                <h1 class="mb-2 fs-2">Products
                    <a href="{{ route('admin.products.index') }}" class="ms-3 btn btn-outline-primary mb-2 "><i
                            class="bi bi-caret-left-fill"></i> Back</a>
                </h1>
            </div>
            <div class="col-sm-6 d-flex justify-content-end my-2">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">products</li>
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
                            <h5 class="card-title fs-4 mb-3">Show Detailes of {{ $product->name }} Product</h5>
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Product ID</div>
                                    <div class="col-lg-9 col-md-8">{{ $product->id }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Product Image</div>
                                    <div class="col-lg-9 col-md-8">
                                        <img id="image" src="{{ asset('images/' . $product->image) }}" alt=""
                                            height="60" width="60">
                                    </div>

                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Product Name</div>
                                    <div class="col-lg-9 col-md-8">{{ $product->name }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Product Price</div>
                                    <div class="col-lg-9 col-md-8">{{ $product->price }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Product Sale Price</div>
                                    <div class="col-lg-9 col-md-8">{{ $product->sale_price }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Product Quantity</div>
                                    <div class="col-lg-9 col-md-8">{{ $product->quantity }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Product Description</div>
                                    <div class="col-lg-9 col-md-8">{{ $product->description }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Category Parent</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{-- to show parent product name insteadof show his id so return array in show fun --}}
                                        {{ $product->category->name }}
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Featured</div>
                                    <div class="col-lg-9 col-md-8">
                                        @if ($product->featured == '0')
                                            False
                                        @endif
                                        @if ($product->featured == '1')
                                            True
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Views Number</div>
                                    <div class="col-lg-9 col-md-8">{{ $product->views ?? 'No Views' }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Sales Number</div>
                                    <div class="col-lg-9 col-md-8">{{ $product->sales ?? 'No Sales' }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Created At</div>
                                    <div class="col-lg-9 col-md-8">{{ $product->created_at }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Updated At</div>
                                    <div class="col-lg-9 col-md-8">{{ $product->updated_at }}</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
