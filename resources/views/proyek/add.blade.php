@extends('layouts.global')

@section('title')
   Tambah Proyek
@endsection

@section('content')
    <div class="container">
        <h3 class="text-center">Tambah Proyek</h3>
    </div>
    <hr>
    <br>
    @include('components.notifikasi')
    {{-- isi konten --}}
        <div class="container">
            <form action="{{route('proyek.store')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-2 col-form-label">Kode Proyek</label>
                    <div class="col-5">
                      <input type="text" class="form-control" name="id_proyek" placeholder="kode proyek">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Proyek</label>
                    <div class="col-5">
                      <input type="text" class="form-control" name="deskripsi_proyek" placeholder="nama proyek">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label"></label>
                    <div class="col-5">
                        <button type="submit" class="btn btn-sm btn-primary mb-2">Simpan</button>
                        <a href="{{route('proyek.index')}}" class="btn btn-sm btn-danger mb-2">kembali</a>
                    </div>
                </div>
                <br>
            </form>
        </div>
    </div>
@endsection

