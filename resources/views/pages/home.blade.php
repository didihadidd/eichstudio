@extends('layouts.app')

@section('content')
    <!-- Header-->
    <header class="text-center">
        <h1>
          Welcome to
          <br />
          Eich Studio
        </h1>
        <p class="mt-3">
        Model is the silent ambassador
          <br />
          of your brand
        </p>
        <a href="#popular" class="btn btn-get-started px-4 mt-4">
          Get Started
        </a>
      </header>

      <main> <!--konten utama website (statistik) -->


        <section class="section-popular" id="popular">
          <div class="container">
            <div class="row">
              <div class="col text-center section-popular-heading">
                <h2>Jadwal Terdekat</h2>
              </div>
            </div>
          </div>
        </section>

        <section class="popular-content" id="popularContent">
          <div class="container">
            <div class="section-popular-travel row justify-content-center">
             @foreach ($items as $item) <!-- foreach ini akan ngelooping bagian items di index homecontroller // ini jg buat looping gambarnya pas di home user-->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div
                    class="card-travel text-center d-flex flex-column"
                    style="background-image: url('{{ $item->galleries->count() ? Storage::url
                    ($item->galleries->first()->image) : '' }}');"
                    > <!-- kalo ada fotonya akan dimunculkan, kl gaada akan kosong-->
                    <div class="travel-country">{{ $item->schedule }} cm</div>
                    <div class="travel-location">{{ $item->title }}</div>
                    <div class="travel-button mt-auto">
                        <a href="{{ route('detail', $item->slug) }}" class="btn btn-travel-details px-4">
                        View Details
                        </a>
                    </div>
                    </div>
                </div>
             @endforeach
            </div>
          </div>
        </section>



      </main>
@endsection
