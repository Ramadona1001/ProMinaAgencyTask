@extends('layouts.app')

@section('content')

  @include('components.hero')
  <main id="main" data-aos="fade" data-aos-delay="1500">

    <section id="services" class="services">
        <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success success_msg">
                {{ Session::get('success') }}
            </div>
        @endif
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
