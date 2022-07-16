<div class="row mb-4">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
        <input name="name" type="text" id="name" placeholder="Enter category name"
            value="{{ old('name', $category->name) }}" class="form-control @error('name') is-invalid @enderror">
        @error('name')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label for="description" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
        <textarea name="description" id="description" rows="3" placeholder="Enter category description"
            class="col-sm-12 form-control @error('description') is-invalid @enderror">{{ old('desctiption', $category->description) }}</textarea>
        @error('description')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <label for="parent_id" class="col-sm-2 col-form-label">Parent Category</label>
    <div class="col-sm-10">
        <select name="parent_id" id="parent_id" class="form-select @error('parent_id') is-invalid @enderror">
            <option value="">No Parent</option>
            @foreach ($categories as $parent)
                <option value="{{ $parent->id }}" @if ($parent->id == old('parent_id', $category->parent_id)) selected @endif>
                    {{ $parent->name }}</option>
            @endforeach
        </select>
        @error('parent_id')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
    {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
</div>
