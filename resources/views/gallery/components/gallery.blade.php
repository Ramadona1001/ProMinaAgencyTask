<div class="col-lg-4 mb-4 text-center">
    <div class="service-item position-relative">
    <i class="bi bi-camera"></i>
    <h4><a href="{{ route('gallery.show',['gallery'=>$gallery]) }}">{{ $gallery->name.' ('.$gallery->getMedia()->count().' images)' }}</a></h4>
    @if ($gallery->user_id == auth()->user()->id)
        <div class="mt-1">
            <a href="{{ route('images.create',['gallery'=>$gallery]) }}" class="btn btn-primary btn-sm">Upload</a>
            <a href="{{ route('gallery.edit',['gallery'=>$gallery]) }}" class="btn btn-warning btn-sm">Edit</a>
            @if ($gallery->getMedia()->count() > 0)
            <button onclick="document.getElementById('id{{ $gallery->id }}').style.display='block'" class="btn btn-danger btn-sm myBtn">
                Delete
            </button>
            @else
            <a href="{{ route('gallery.destroy',['gallery'=>$gallery]) }}" onclick="event.preventDefault();document.getElementById('delete-album-form').submit();" class="btn btn-danger btn-sm">Delete</a>
            <form id="delete-album-form" action="{{ route('gallery.destroy',['gallery'=>$gallery]) }}" method="POST" class="d-none">
            @csrf
            {{ method_field('DELETE') }}
            </form>
            @endif
        </div>
    @endif
    </div>
</div>
@include('gallery.components.delete-gallery-modal')

