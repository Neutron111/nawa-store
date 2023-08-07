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
        {{-- <div class="form-floating mb-3">
            <label for="name">Product Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Product name" value="{{ old('name', $product->name) }}">
            @error('name')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div> --}}

        <x-form.input label="Product Name" id="name" name="name" value="{{$product->name}}"/>
        <x-form.input label="URL SLUG" id="slug" name="slug" value="{{$product->slug}}"/>
        <x-form.textarea label="Description" id="description" name="description" placeholder="Description" value="{{$product->description}}"/>
        <x-form.textarea label="Short_description" id="short_description" name="short_description" placeholder="Short description" value="{{$product->short_description}}"/>


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

        <x-form.select name="category_id" id="category_id" label="Category" :value="$product->category_id" :options="$categories" />
            {{--هين بنفعش تستخدم قواس لانك بدكاش تتطبع بدك تمرر قيمة وعشان تمررها كمتغير نستخدم نقطتين :--}}
            {{-- pluck  بترجعلي اري لعنصر من الاوبجيكت --}}

        <x-form.input label="Price" id="price" name="price" value="{{$product->price}}"/>
        <x-form.input label="Compare Price" id="compare_price" name="compare_price" value="{{$product->compare_price}}"/>

        <div class="form-floating mb-3">
            <label for="image"> Product Image</label><br>
                <img src="{{$product->image_url}}" width="100" alt="">
            <input type="file" class="form-control" id="image" name="image" placeholder="Product Image">
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary">Save</button>
