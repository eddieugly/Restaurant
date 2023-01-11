@extends('layouts.backend')

@section('title', 'Add Gallery')



@section('content')
    

<section class="section">
    <div class="section-header">
      <h1>{{ $page_title }}</h1>
    </div>
    <div class="section-body">
        <div class="card">
        <div class="card-header">
          <h4>Gallery Form</h4>
        </div>
        <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Caption</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control" name="caption">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                <div class="col-sm-12 col-md-7">
                  <div id="image-preview" class="image-preview">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" name="thumbnail" id="image-upload" />
                  </div>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type</label>
                <div class="col-sm-12 col-md-7">
                  <select name="type" id="type" class="form-control selectric">
                    <option selected value="0">Photo</option>
                    <option value="1">Video</option>
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4 d-none" id="video_link">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Video Link</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control" name="video_link">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </div>
            </div>
        </form>
        
        
    </div>
    </div>
  </section>
@endsection

  

@section('scripts')
  <script>
    $('#type').on('change', function () {

      const val = $(this).val();

      if (val == 1) {
        $('#video_link').removeClass('d-none');
      } else {
        $('#video_link').addClass('d-none');
      }
      
    });
  </script>
  <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
@endsection