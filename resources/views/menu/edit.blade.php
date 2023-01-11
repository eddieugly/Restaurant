@extends('layouts.backend')

@section('title', 'Edit Menu')



@section('content')
    

<section class="section">
    <div class="section-header">
      <h1>{{ $page_title }}</h1>
    </div>
    <div class="section-body">
        <div class="card">
        <div class="card-header">
          <h4>Category Form</h4>
        </div>
        <form action="{{ route('menu.update', $menu->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            @method('PUT')

            <div class="card-body">
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control" name="title" value="{{ $menu->title }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                <div class="col-sm-12 col-md-7">
                  <select name="category_id" class="form-control selectric">
                    @foreach ($categories as $item)
                      @if ($item->id == $menu->category_id)
                      <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                      @else
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endif
                      
                    @endforeach
                    
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Price</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control" name="price" value="{{ $menu->price }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                <div class="col-sm-12 col-md-7">
                  <textarea name="description" class="summernote-simple">{{ $menu->description }}</textarea>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                <div class="col-sm-12 col-md-7">
                  <div style="background-image: url({{ asset($menu->thumbnail) }}); background-size: cover; background-position: center;" id="image-preview" class="image-preview">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" name="thumbnail" id="image-upload" />
                  </div>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                <div class="col-sm-12 col-md-7">
                  <select name="status" class="form-control selectric">
                    <option {{ $menu->status == 1 ? 'checked' : '' }} value="1">Publish</option>
                    <option {{ $menu->status == 0 ? 'checked' : '' }} value="0">Draft</option>
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </div>
        </form>
        
        
    </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
@endsection