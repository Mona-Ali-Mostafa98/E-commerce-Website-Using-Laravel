@extends('admin.layout')
@section('page_title', "Show $category->name Category")
@section('content')
    <main id="main" class="main">
        <div class="row pagetitle mb-2">
            <div class="col-sm-6 d-flex justify-content-start">
                <h1 class="mb-2 fs-2">Categories
                    <a href="{{ route('admin.categories.index') }}" class="ms-3 btn btn-outline-primary mb-2 "><i
                            class="bi bi-caret-left-fill"></i> Back</a>
                </h1>
            </div>
            <div class="col-sm-6 d-flex justify-content-end my-2">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">Categories</li>
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
                            <h5 class="card-title fs-4 mb-3">Show Detailes of {{ $category->name }} Category</h5>
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Category ID</div>
                                    <div class="col-lg-9 col-md-8">{{ $category->id }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Category Name</div>
                                    <div class="col-lg-9 col-md-8">{{ $category->name }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Category Description</div>
                                    <div class="col-lg-9 col-md-8">{{ $category->description }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Parent Category</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{-- to show parent category name insteadof show his id so return array in show fun --}}
                                        {{ $category->parent->name }}
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Created At</div>
                                    <div class="col-lg-9 col-md-8">{{ $category->created_at }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Updated At</div>
                                    <div class="col-lg-9 col-md-8">{{ $category->updated_at }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">Child Categories</div>
                                    <ul class="col-lg-9 col-md-8 " style="display: inline-flex">
                                        @foreach ($category->children as $child)
                                            <li class="ms-4">
                                                <a class="text-success fw-bold" data-bs-toggle="tooltip"
                                                    data-bs-title="Show Category Details"
                                                    href="{{ route('admin.categories.show', $child->id) }}">{{ $child->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    {{-- <div class="col-lg-9 col-md-8">{{ $category->children->name }}</div> --}}
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">
                                        Products In This Category
                                    </div>
                                    <div class="col-lg-9 col-md-8">
                                        <table class="table table-hover table-striped" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Product Name</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Created At</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product)
                                                    <tr>
                                                        <td>{{ $product->id }}</td>
                                                        <td>
                                                            <a class="text-success fw-bold"
                                                                href="{{ route('admin.products.show', $product->id) }}"
                                                                data-bs-toggle="tooltip"
                                                                data-bs-title="Show Product Details">
                                                                {{ $product->name }}
                                                            </a>
                                                        </td>
                                                        <td>{{ $product->price }}</td>
                                                        <td>{{ $product->quantity }}</td>
                                                        <td>{{ $product->created_at }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="mt-4 mb-3 d-flex justify-content-end pagination">
                                            {{ $products->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
