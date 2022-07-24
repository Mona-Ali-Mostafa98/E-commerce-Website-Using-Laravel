    <div class="row mb-4">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input name="title" type="text" id="title" placeholder="Enter feature title"
                value="{{ old('title', $feature->title) }}" class="form-control @error('title') is-invalid @enderror">
            @error('title')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row mb-4">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <textarea name="description" id="description" rows="3" placeholder="Enter feature description"
                class="col-sm-12 form-control @error('description') is-invalid @enderror">{{ old('desctiption', $feature->description) }}</textarea>
            @error('description')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row mb-4">
        <label for="parent_id" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
            <select name="status" class="form-select @error('status') is-invalid @enderror"">
                <option value="show" @if ($feature->status == 'show' or old('status') == 'show') selected @endif>Show
                </option>
                <option value="hide" @if ($feature->status == 'hide' or old('status') == 'hide') selected @endif>Hide
                </option>
            </select>
            @error('status')
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
            {{-- <img id="image" src="{{ asset('images/features/' . $feature->image) }}"
                style="height: 80px; width: 100px;" alt="no image uploaded"> --}}
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
