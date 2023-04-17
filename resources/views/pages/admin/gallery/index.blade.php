@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gallery</h1>
        <a href="{{ route('gallery.create') }}" class="btn btn-sn btn-primary shadow-sn">
          <i class="fas fa-plus fa-sn text-white-50"></i> Tambah Gallery
        </a>
      </div>

      <div class="row">
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                            <th>ID</th>
                            <th>Travel</th>
                            <th>Gambar</th>
                            <th>Action</th>
                          </tr>
                      </thead>
                      <tbody> <!--pake forselse untuk kondisi, munculin data kalo datanya ada tp kl gaada isinya kosong -->
                          @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->travel_package->title }}</td>
                                <td>
                                    <img src="{{ Storage::url($item->image) }}" alt="" style="width: 200px" class="img-thumbnail"> <!--u/ munculin/mengambil url gambar -->
                                </td>

                                <td>
                                    <a href="{{ route('gallery.edit', $item->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('gallery.destroy', $item->id) }}" method="post" class="d-inline"> <!--pake inline biar tombol nya ga di garis baru -->
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
