<div class="col-xl-3 col-lg-4 col-md-6">
    <div class="gallery-item h-100">
      <img src="{{ $gallery->getMedia()[$i]->getFullUrl() }}" class="img-fluid" alt="">
      <div class="gallery-links d-flex align-items-center justify-content-center">
        <a href="{{ $gallery->getMedia()[$i]->getFullUrl() }}" title="{{ $gallery->getMedia()[$i]->name }}" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
        @if($gallery->user_id == auth()->user()->id)
        <a onclick="return confirm('Are you sure?')" href="{{ route('images.destroy',['gallery'=>$gallery,'index'=>$i]) }}" class="details-link"><i class="bi bi-trash"></i></a>
        @endif
      </div>
    </div>
  </div>
