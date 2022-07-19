@extends('admin.layout')
@section('content')
    <main id="main" class="main">
        <div class="row pagetitle mb-2">
            <div class="col-sm-6 d-flex justify-content-start">
                <h1 class="mb-2 fs-2">Products
                    <a href="{{ route('admin.products.create') }}" class="ms-3 btn btn-outline-primary mb-2 ">
                        <i class="bi bi-plus-lg"></i> Create product</a>
                </h1>
            </div>
            <div class="col-sm-6 d-flex justify-content-end my-2">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">Products</li>
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
                            <h5 class="card-title fs-4 mb-3">All Products</h5>

                            @include('admin.alerts')

                            <table class="table table-hover table-striped table-bordered border-dark" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        {{-- <th scope="col">ID</th> --}}
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            {{-- <td>{{ $product->id }}</td> --}}
                                            <td><img src="{{ $product->image }}" alt="" height="60"
                                                    width="60"></td>
                                            <td class="text-primary fw-bold">{{ $product->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->created_at->toDateString() }}</td>
                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <a href="{{ route('admin.products.show', $product->id) }}"
                                                        class=" btn btn-sm btn-success">View</a>
                                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                                        class=" ms-2 btn btn-sm btn-primary">Edit</a>
                                                    <form class=" ms-2 form-inline" method="post"
                                                        action="{{ route('admin.products.destroy', $product->id) }}">
                                                        @csrf
                                                        @method ('delete')
                                                        <button type="submit" class="btn btn-sm btn-danger "
                                                            onclick="return confirm('Are you sure you to delete this record from Database?')">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center text-muted fs-4" colspan="7">There are no products
                                                ....
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="mt-4 mb-3 d-flex justify-content-end">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
