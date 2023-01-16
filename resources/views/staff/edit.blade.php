@extends('layouts.backend')

@section('title', $page_title)



@section('content')
    

<section class="section">
    <div class="section-header">
      <h1>{{ $page_title }}</h1>
    </div>
    <div class="section-body">
        <div class="card">
        <div class="card-header">
          <h4>Staff Form</h4>
        </div>
        <form action="{{ route('staff.update', $staff->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            @method('PUT')

            <div class="card-body">
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control" name="name" value="{{ $staff->name }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Designation</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control" name="designation" value="{{ $staff->designation }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                <div class="col-sm-12 col-md-7">
                  <div style="background-image: url({{ asset($staff->thumbnail) }}); background-size: cover; background-position: center;" id="image-preview" class="image-preview">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" name="thumbnail" id="image-upload" />
                  </div>
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