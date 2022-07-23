<div class="row mb-4">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
        <input name="name" type="text" id="name" placeholder="Enter product name"
            value="{{ old('name', $product->name) }}" class="form-control @error('name') is-invalid @enderror">
        @error('name')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label for="description" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
        <textarea name="description" id="description" rows="3" placeholder="Enter product description"
            class="col-sm-12 form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
        @error('description')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label for="price" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-10">
        <input name="price" type="text" id="price" placeholder="Enter product price"
            value="{{ old('price', $product->price) }}" class="form-control @error('price') is-invalid @enderror">
        @error('price')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label for="sale_price" class="col-sm-2 col-form-label">Sale Price</label>
    <div class="col-sm-10">
        <input name="sale_price" type="text" id="sale_price" placeholder="Enter product Sale Price"
            value="{{ old('sale_price', $product->sale_price) }}"
            class="form-control @error('sale_price') is-invalid @enderror">
        @error('sale_price')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
    <div class="col-sm-10">
        <input name="quantity" type="number" id="quantity" placeholder="Enter product quantity"
            value="{{ old('quantity', $product->quantity) }}"
            class="form-control @error('quantity') is-invalid @enderror">
        @error('quantity')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label for="views" class="col-sm-2 col-form-label">Views Number</label>
    <div class="col-sm-10">
        <input name="views" type="number" id="views" placeholder="Enter product views"
            value="{{ old('views', $product->views) }}" class="form-control @error('views') is-invalid @enderror">
        @error('views')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label for="sales" class="col-sm-2 col-form-label">Sales Number</label>
    <div class="col-sm-10">
        <input name="sales" type="number" id="sales" placeholder="Enter product sales"
            value="{{ old('sales', $product->sales) }}" class="form-control @error('sales') is-invalid @enderror">
        @error('sales')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label for="featured" class="col-sm-2 col-form-label">Featured</label>
    <div class="col-sm-10">
        <select name="featured" id="featured" class="form-select @error('featured') is-invalid @enderror">
            <option value="">Select Featured of this product....</option>
            <option value="0" @if ($product->featured == '0' or old('featured') == '0') selected @endif>False</option>
            <option value="1" @if ($product->featured == '1' or old('featured') == '1') selected @endif>True</option>
        </select>
        @error('featured')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label for="category_id" class="col-sm-2 col-form-label">Category </label>
    <div class="col-sm-10">
        <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
            <option value="">Select category which product belongs to....</option>
            @foreach ($categories as $parent)
                <option value="{{ $parent->id }}" @if ($parent->id == old('category_id', $product->category_id)) selected @endif>
                    {{ $parent->name }}</option>
            @endforeach
        </select>
        @error('category_id')
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
        <img id="image" src="{{ asset('images/' . $product->image) }}" style="height: 80px; width: 100px;"
            alt="no image uploaded">
    </div>
</div>

<div class="text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
    {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
</div>
