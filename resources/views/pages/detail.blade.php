@extends('layouts.app')

@section('title', 'Detail Talent')

@section('content')
<main>
    <section class="section-detail-header"></section>
      <section class="section-detail-content">
        <div class="container">
          <div class="row">
            <div class="col p-0"> <!-- biar sejajar sm yg bawah yg kirinya-->
              <nav>
                <ol class="breadcrumb"> <!-- breadcrumb itu tulisan yg Paket Travel/Details-->
                  <li class="breadcrumb-item ">
                    Talent
                  </li>
                  <li class="breadcrumb-item active">
                    Details
                  </li>
                </ol>
              </nav>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-8 pl-lg-0">
              <div class="card card-detail">
                <h1>{{ $item->title }}</h1>
                <p>
                    {{ $item->height}} cm | {{$item->weight}} kg | {{$item-> status_hijab}}
                </p>
                <p>
                    Jadwal Terdekat : {{ $item->schedule}}
                </p>
                @if($item->galleries->count() > 0)
                <div class="gallery">
                    <div class="xzoom-container">
                        <img
                            src="{{ Storage::url($item->galleries->first()->image) }}"
                            class="xzoom"
                            id="xzoom-default"
                            xoriginal="{{ Storage::url($item->galleries->first()->image) }}"
                        />
                    </div>
                    <div class="xzoom-thumbs">
                        @foreach($item->galleries as $gallery)
                            <a href="{{ Storage::url($gallery->image) }}">
                                <img
                                    src="{{ Storage::url($gallery->image) }}"
                                    class="xzoom-gallery"
                                    width="128"
                                    xpreview="{{ Storage::url($gallery->image) }}"
                                />
                            </a>
                        @endforeach
                    </div>
                </div>
          @endif



                  <h1>Harga/ 1 pcs product</h1>
                  <h1>{!! $item->price !!}<h1>
                </div>
            </div>

            <div class="col lg-4">
              <div class="card card-detail card-right">
                <h2>Detail Talent Information</h2>
                <table class="trip-informations">
                  <tr>
                    <th width="50%">Jadwal Terdekat</th> <!-- Table heading-->
                    <td width="50%" class="text-right">
                        {{ \Carbon\Carbon::create($item->schedule)->format('F n, Y') }}
                    </td> <!--Table data-->
                  </tr>
                  <tr>
                    <th width="50%">Tinggi Badan</th>
                    <td width="50%" class="text-right">
                      {{ $item->height }} cm
                    </td>
                  </tr>
                  <tr>
                    <th width="50%">Berat badan</th> <!-- Table heading-->
                    <td width="50%" class="text-right">
                        {{ $item->weight }} kg
                    </td> <!--Table data-->
                  </tr>
                  <tr>
                    <th width="50%">Detail Hijab</th> <!-- Table heading-->
                    <td width="50%" class="text-right">
                        {{ $item->status_hijab }}
                    </td> <!--Table data-->
                  </tr>
                  <tr>
                    <th width="50%">Harga Jasa /item</th> <!-- Table heading-->
                    <td width="50%" class="text-right">
                        ${{ $item->price }} / pcs
                    </td> <!--Table data-->
                  </tr>
                </table>
              </div>

              <div class="join-container">
                @auth
                <form action="{{ route('checkout', $item->id) }}">

                    <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                        Order Now
                    </button>
                </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="btn btn-block btn-join-now mt-3 py-2">
                        Login or Register to Join
                    </a>
                @endguest
            </div>

            </div>
          </div>
        </div>
      </section>
  </main>

@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{url('frontend/libraries/xzoom/xzoom.css')}}">
@endpush

@push('addon-script')
<script src="{{url('frontend/libraries/xzoom/xzoom.min.js')}}"></script>
    <script>
      $(document).ready(function() {
        $('.xzoom, .xzoom-gallery').xzoom({
          zoomWidth: 500,
          title: false,
          tint: '#333',
          Xoffset: 15
        });
      });
    </script>

@endpush
