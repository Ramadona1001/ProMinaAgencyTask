<div class="col-lg-3 mb-4 text-center">
    <div class="service-item position-relative">
    <i class="bi bi-camera"></i>
    <h4><a href="{{ route('gallery.show',['gallery'=>$gallery]) }}">{{ $gallery->name }}</a></h4>
    @if ($gallery->user_id == auth()->user()->id)
        <div class="mt-1">
            <a href="{{ route('gallery.edit',['gallery'=>$gallery]) }}" class="btn btn-warning btn-sm">Edit</a>
            <button onclick="document.getElementById('id{{ $gallery->id }}').style.display='block'" class="btn btn-danger btn-sm myBtn">
                Delete
            </button>
        </div>
    @endif
    </div>
</div>


  <div class="modal album_delete" id="id{{ $gallery->id }}">
    <form class="modal-content" action="/action_page.php">
      <div class="container">
        <h1>Delete Album</h1>
        <p>Are you sure to delete {{ $gallery->name }} album?</p>

        <div class="clearfix">
          <button type="button" class="btn btn-secondary" onclick="document.getElementById('id{{ $gallery->id }}').style.display='none'">Cancel</button>
          <form action="{{ route('gallery.destroy',['gallery'=>$gallery]) }}" method="post">
            {{ method_field('DELETE') }}
            @csrf
            <button type="button" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
    </form>
  </div>

