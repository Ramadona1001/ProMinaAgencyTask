@extends('layouts.app')

@section('content')

  @include('components.hero')

  <main id="main" data-aos="fade" data-aos-delay="1500">

    <section id="services" class="services">
        <div class="container">

          <div class="row">

            @foreach ($galleries as $gallery)
                @include('gallery.components.gallery',['gallery'=>$gallery])
            @endforeach

          </div>

          <div class="row">
            {{ $galleries->links() }}
          </div>

        </div>
      </section>

  </main>
@endsection
