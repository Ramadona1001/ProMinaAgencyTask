<div class="modal album_delete" id="id{{ $gallery->id }}">
    <div class="modal-content">
      <div class="container">
        <h1>Delete Album ({{ $gallery->name }})</h1>
        <hr>

        <div class="clearfix">

            <div class="row mt-3 mb-3">
                <div class="col-lg-6">
                    <p>You will delete album with images</p>
                    <form action="{{ route('gallery.destroy',['gallery'=>$gallery]) }}" method="post">
                        {{ method_field('DELETE') }}
                        @csrf
                        <button type="submit" class="btn btn-danger mt-3">Delete</button>
                    </form>
                </div>

                <div class="col-lg-6">
                    <p>Or you can move images to another album?</p>
                    @if (count(auth()->user()->albums()) < 0)
                    <h5>No Albums</h5>
                    @else
                    <form action="{{ route('gallery.move',['gallery'=>$gallery]) }}" method="POST">
                        @csrf
                        <select name="album_name" class="form-control" required>
                            <option value="">Select Album</option>
                            @foreach (auth()->user()->albums() as $item)
                                @if ($item->id != $gallery->id)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary mt-3">Move</button>
                    </form>
                    @endif
                </div>
            </div>

            <hr>
            <div class="row">
                <button type="button" class="btn btn-secondary" onclick="document.getElementById('id{{ $gallery->id }}').style.display='none'">Cancel</button>
            </div>

        </div>
      </div>
    </div>
  </div>
