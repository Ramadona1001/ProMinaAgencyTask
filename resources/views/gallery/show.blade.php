@extends('layouts.app')

@section('content')

  @include('components.hero')
  <main id="main" data-aos="fade" data-aos-delay="1500">

    <section id="gallery" class="gallery">
        <div class="container-fluid">
            @if (Session::has('success'))
            <div class="alert alert-success success_msg">
                {{ Session::get('success') }}
            </div>
            @endif
          <div class="row gy-4 justify-content-center">
            @for ($i = 0; $i < $gallery->getMedia()->count(); $i++)
                @include('gallery.components.image',['gallery'=>$gallery])
            @endfor

          </div>

        </div>

    </section>

  </main>
@endsection
