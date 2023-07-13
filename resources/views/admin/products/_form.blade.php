@if ($errors->any())
    <div class="alert alert-danger">
        You have some errors:
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
    <div class="col-md-8">
        <div class="form-floating mb-3">
            <label for="name">Product Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Product name" value="{{ old('name', $product->name) }}">
            @error('name')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <label for="slug"> URL Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="URL Slug" value="{{ old('slug', $product->slug) }}">
            @error('slug')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <label for="description"> Description</label>
            <textarea class="form-control" id="description" name="description" placeholder="Description">{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="form-floating mb-3">
            <label for="short_description"> Short Description</label>
            <textarea class="form-control" id="short_description" name="short_description" placeholder="Short description">{{ old('short_description', $product->short_description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="gallery"> Product Image</label>
            <div>
                <input type="file" class="form-control" id="gallery" name="gallery[]"multiple placeholder="Product Gallery">
            </div>
            @if ($gallery ?? false){{--هاي معناها اذا مجاش الفريبل عتبره فولس---او  بتعرف الجلري في الكرييت وتعطيه قيمة فولس--}}
                <div class="row">
                    @foreach ( $gallery as $image) {{--هان الايميج بترجعل قيمة موديل وانا بدي اوصل لرابط الصورة فبنحلها اما بالاكسزورز او بال asset--}}
                    <div class="col-md-3">
                        <img src="{{$image->url}}" class="img-fluid  " alt="">
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class=" mb-3">
            <label for="category_id"> Status</label>
            <div>
                @foreach ($status_options as $key => $value)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status_{{ $key }}"
                            value="{{ $key }}" @if ($key == old('status', $product->status)) checked @endif>
                        <label class="form-check-label" for="status_{{ $key }}">
                            {{ $value }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class=" mb-3">
            <label for="category_id"> Category</label>
            <div>
                <select name="category_id" id="category_id" class="form-select form-control">
                    <option value=""></option>
                    @foreach ($categories as $category)
                        <option @if ($category->id == old('category_id', $product->category_id)) selected @endif value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-floating mb-3">
            <label for="price"> Product Price</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Price"
                value="{{ old('price', $product->price) }}">
        </div>
        <div class="form-floating mb-3">
            <label for="compare_price"> Compare Price</label>
            <input type="number" class="form-control" id="compare_price" name="compare_price"
                placeholder="Compare Price" value="{{ old('compare_price', $product->compare_price) }}">
        </div>
        <div class="form-floating mb-3">
            <label for="image"> Product Image</label><br>
                <img src="{{$product->image_url}}" width="100" alt="">
            <input type="file" class="form-control" id="image" name="image" placeholder="Product Image">
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary">Save</button>
