@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Talent Eich Studio</h1>
        <a href="{{ route('data-talent.create') }}" class="btn btn-sn btn-primary shadow-sn">
          <i class="fas fa-plus fa-sn text-white-50"></i> Tambah Data Talent
        </a>
      </div>

      <div class="row">
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                      <thead>
                          <tr>

                            <th>Nama Talent</th>
                            <th>Tinggi</th>
                            <th>Berat Badan</th>
                            <th>Status Hijab</th>
                            <th>Jadwal</th>
                            <th>Harga Jasa /item</th>
                            <th>Action</th>
                          </tr>
                      </thead>
                      <tbody> <!--pake forselse untuk kondisi, munculin data kalo datanya ada tp kl gaada isinya kosong -->
                          @forelse ($items as $item)
                            <tr>

                                <td>{{ $item->title }}</td>
                                <td>{{ $item->height }} cm</td>
                                <td>{{ $item->weight }} kg</td>
                                <td>{{ $item->status_hijab }}</td>
                                <td>{{ $item->schedule }}</td>
                                <td>{{ $item->price }}</td>


                                <td>
                                    <a href="{{route('data-talent.edit', $item->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('data-talent.destroy', $item->id) }}" method="post" class="d-inline"> <!--pake inline biar tombol nya ga di garis baru -->
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                          @empty
                            <tr>
                                <td collspan="7" class="text-center">
                                    Data Kosong
                                </td>
                            </tr>


                          @endforelse
                      </tbody>
                  </table>
              </div>
          </div>
      </div>




    </div>
    <!-- /.container-fluid -->
@endsection
