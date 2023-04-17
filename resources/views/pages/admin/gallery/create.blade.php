@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Gallery</h1>

      </div>

      <!-- u/ menampilkan jika ada error di form kita-->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data" > <!-- u/ menyimpan sebuah data akan disimpan di fungsi store // enctype="multipart/form-data agar bisa upload gambar-->
                    @csrf
                    <div class="form-group">
                        <label for="title">Paket Travel</label>
                        <select name="travel_packages_id" required class="form-control">
                            <option value="">Pilih Paket Travel</option>
                            @foreach($travel_packages as $travel_package) <!--foreach = kita mau ngeluarin data si travel_packages ini -->
                                <option value="{{ $travel_package->id }}">
                                    {{ $travel_package->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" placeholder="Image" >
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                    </button>
                </form>
            </div>
        </div>




    </div>
    <!-- /.container-fluid -->
@endsection
