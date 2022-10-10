@extends('layouts.app')

@section('stylesheet')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection

@section('content')

  @include('components.hero')
  <main id="main" data-aos="fade" data-aos-delay="1500">

    <section id="services" class="services">
        <div class="container">
        <h4>Upload Images To ({{ $gallery->name }}) Album</h4>
        <br>
        @if (Session::has('success'))
            <div class="alert alert-success success_msg">
                {{ Session::get('success') }}
            </div>
        @endif

        <form action="{{ route('images.store',['gallery'=>$gallery]) }}" class="dropzone" id="my-great-dropzone">
            @csrf
            <input type="text" name="name" id="name" class="form-control" required placeholder="Image Name" style="background:black;color:white;">
        </form>

        </div>
      </section>

  </main>
@endsection

@section('scripts')
<script>
    Dropzone.options.myGreatDropzone = { // camelized version of the `id`
      paramName: "file", // The name that will be used to transfer the file
      maxFilesize: 2, // MB
      acceptedFiles: "image/*",

      accept: function(file, done) {
        done();
      }
    };
</script>
@endsection
