@extends('layouts.app')

@section('content')

@include('components.hero')

  <main id="main" data-aos="fade" data-aos-delay="1500">

    <section id="services" class="services">
        <div class="container">

          <div class="row">
            <div class="col-lg-6 offset-3">
                <form action="{{ route('gallery.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                        <button type="submit" class="btn btn-success mt-3">
                            Save
                        </button>
                    </div>
                </form>
            </div>
          </div>

        </div>
      </section>

  </main>
@endsection
