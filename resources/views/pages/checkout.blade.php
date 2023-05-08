@extends('layouts.checkout')

@section('title', 'Checkout')

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
                    Paket Travel
                  </li>
                  <li class="breadcrumb-item">
                    Details
                  </li>
                  <li class="breadcrumb-item active">
                    Checkout
                  </li>
                </ol>
              </nav>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-8 pl-lg-0">
              <div class="card card-detail">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <h1>Who is Going</h1>
                <p>
                  Trip to {{ $item-> talent->title}}, {{$item->talent->schedule}}
                </p>

                <div class="attendee">
                    <table class="table table-responsive-sm text-center">
                      <thead>
                        <tr>
                          <td scope="col">Picture</td>
                          <td scope="col">Email</td>
                          <td scope="col">Jumlah Item</td>
                          <td scope="col">Description</td>
                          <td scope="col">Bukti Bayar</td>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($item->details as $detail) <!-- isinya = detail dr item itu sendiri -->
                        <tr>
                            <td>
                                <img src="https://ui-avatars.com/api/?name={{ $detail->email }}" height="60" class="rounded-circle"/>
                            </td>
                            <td class="align-middle">
                                {{ $detail->email }}
                            </td>
                            <td class="align-middle">
                                {{ $detail->jumlah_item }}
                            </td>
                            <td class="align-middle">
                                {{ $detail->description}}
                            </td>

                            <td class="align-middle">
                                <a href="{{ route('checkout-remove', $detail->id) }}">
                                    <img src="{{ url('frontend/images/ic_remove.png') }}" alt="" />
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                No Visitor
                            </td>
                        </tr>
                    @endforelse

                      </tbody>
                    </table>
                  </div>

                <div class="member mt-3">
                  <h2>Add Member</h2>
                  <form class="form-inline" method="post" action="{{ route('checkout-create', $item->id) }}" enctype="multipart/form-data">
                    @csrf <!-- tambahin csrf biar formnya bisa dipake-->

                    <!--Form Nationality -->
                    <label for="email" class="sr-only">Email Brand</label>
                    <input
                        type="text"
                        name="email"
                        class="form-control mb-2 mr-sm-2"
                        id="inputEmail"
                        placeholder="email"
                        required
                    />


                    <!--Form Jumlah Item -->
                    <label for="jumlah_item" class="sr-only"> Jml. Item</label> <!--sr = screen reader-->
                    <input type="text"
                    class="form-control mb-2 mr-sm-2"
                    style="width: 70px;"
                    id="inputJumlahItem"
                    placeholder="Jml. Item"
                    name="jumlah_item"
                    required
                    >


                     <!--Form Passport -->
                     <label for="description" class="sr-only"
                     >Description</label
                   >
                   <div class="input-group mb-2 mr-sm-2">
                     <input
                       type="text"
                       name="description"
                       class="form-control mb-20 mr-sm-2"
                       id="description"
                       placeholder="Description"
                     />
                   </div>

                   <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" placeholder="Image" >
                 </div>

                    <button type="submit" class="btn btn-add-now mb-2 px-4" method>
                      Add Now
                    </button>
                  </form>

                  <h3 class="mt-2 mb-0">Note</h3>
                  <p class="disclaimer mb-0">
                    You are only able to invite member that has registered in Nomads
                  </p>
                </div>
              </div>
            </div>

    <!--Checkout Information -->
            <div class="col lg-4">
              <div class="card card-detail card-right">
                <h2>Checkout Information</h2>
                <table class="trip-informations">
                    <tr>
                      <th width="50%">Nama Talent</th>
                      <td width="50%" class="text-right">
                        {{ $item->talent->title}}
                      </td>
                    </tr>
                    <!-- <tr>
                      <th width="50%">Additional VISA</th>
                      <td width="50%" class="text-right">
                        $ {{ $item->additional_visa }},00
                      </td>
                    </tr>
                -->
                    <tr>
                      <th width="50%">Harga per pcs</th>
                      <td width="50%" class="text-right">
                        Rp {{ $item->talent->price }} / pcs
                      </td>
                    </tr>
                    <tr>
                      <th width="50%">Sub Total</th>
                      <td width="50%" class="text-right">
                        Rp {{ $item->transactional_total}},00
                      </td>
                    </tr>
                    <tr>
                      <th width="50%">Total (+Unique)</th>
                      <td width="50%" class="text-right text-total">
                        <span class="text-blue">Rp {{ $item->transactional_total }},</span
                        ><span class="text-orange">{{ mt_rand(0,99) }}</span> <!--mt_rand itu untuk bikin kode unik-->
                      </td>
                    </tr>
                  </table>

                <hr>

                <h2>Payment Instruction</h2>
                <p class="payment-instruction">
                  Please complete your payment before continue to the wonderful trip
                </p>
                <div class="bank">
                  <div class="bank-item pb-3">
                    <img src="{{url('frontend/images/ic_bank.png')}}" alt="" class="bank-image">
                    <div class="description">
                      <h3> PT Nomads ID</h3>
                      <p>
                        0881 8819 82882
                        <br>
                        Bank Central Asia
                      </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="bank-item pb-3">
                    <img src="{{url('frontend/images/ic_bank.png')}}" alt="" class="bank-image">
                    <div class="description">
                      <h3> PT Nomads ID</h3>
                      <p>
                        0282 8293 7373
                        <br>
                        Bank HSBC
                      </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>

              </div>

              <div class="join-container">
                <a href="{{ route('checkout-success', $item->id) }}" class="btn btn-block btn-join-now mt-3 py-2">
                  I Have Made Payment
                </a>
              </div>
              <div class="text-center mt-3">
                <a href="{{ route('detail', $item->talent->slug) }}" class="text-muted"> <!-- ini ada parameternya $item->travel_package->slug sesuai yg di route & controller-->
                  Cancel Booking
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
  </main>

@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{url('frontend/libraries/gijgo/css/gijgo.min.css')}}">
@endpush

@push('addon-script')
<script src="{{url('frontend/libraries/gijgo/js/gijgo.min.js')}}"></script>
    <script>
      $(document).ready(function() {
        $('.datepicker').datepicker({
        format: 'yyyy-mm-dd', //mengikuti database mysql kita
           uiLibrary: 'bootstrap4',
          icons: {
            rightIcon: '<img src="{{url('frontend/images/ic_doe.png')}}" alt="" />'
          }
        });
      });
    </script>


@endpush
