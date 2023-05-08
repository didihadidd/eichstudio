@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Talent</h1>

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
                <form action="{{ route('data-talent.store') }}" method="post"> <!-- u/ menyimpan sebuah data akan disimpan di fungsi store-->
                    @csrf
                    <div class="form-group">
                        <label for="title">Nama Talent</label>
                        <input type="text" class="form-control" name="title" placeholder="Nama Talent" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="height">Tinggi Badan Talent</label>
                        <input type="text" class="form-control" name="height" placeholder="Tinggi Badan Talent" value="{{ old('height') }}">
                    </div>
                    <div class="form-group">
                        <label for="weight">Berat Badan Talent</label>
                        <input type="text" class="form-control" name="weight" placeholder="Berat Badan Talent" value="{{ old('weight') }}">
                    </div>
                    <div class="form-group">
                        <label for="status_hijab">Status Hijab</label>
                        <input type="text" class="form-control" name="status_hijab" placeholder="Status Hijab" value="{{ old('status_hijab') }}">
                    </div>
                    <div class="form-group">
                        <label for="schedule">Jadwal Terdekat</label>
                        <input type="date" class="form-control" name="schedule" placeholder="Jadwal Terdekat" value="{{ old('schedule') }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Harga Jasa /item</label>
                        <input type="number" class="form-control" name="price" placeholder="Harga per item" value="{{ old('price') }}">
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
