@extends('layouts.backend')

@section('title', 'Slider Image List')

@section('content')
    

<section class="section">
    <div class="section-header">
      <h1>{{ $page_title }}</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body">
                    <table class="table  table-striped">
                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $item)
        
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->title }}" width="60">
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('slider.edit', $item->id) }}">Edit</a>
                                    <button type="button" id="{{ $item->id }}" class="btn btn-danger delete" data-toggle="modal" data-target="#exampleModal">Delete</button>
                                </td>
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </section>

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form id="deleteModal" method="post">
        @csrf
        @method('DELETE')
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are you sure you want to delete this menu?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
          </div>
      </form>
    </div>
  </div>
  
  
  
  
@endsection

@section('scripts')
    <script>
        
        $('.delete').on('click', function () {
            
            const id = this.id;

            $('#deleteModal').attr('action', "{{ route('slider.destroy', '') }}" + '/' + id);

        });

    </script>
@endsection