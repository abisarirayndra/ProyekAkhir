@extends('layouts.global')

@section('title')
   Edit Proyek
@endsection

@section('content')
    <div class="container">
        <h3 class="text-center">Edit Proyek</h3>
    </div>
    <hr>
    <br>
    @include('components.notifikasi')
    {{-- isi konten --}}
        <div class="container">
            <form action="{{route('proyek.update',[$proyek->id_proyek])}}" method="POST">
                {{ method_field('PUT') }}
                @csrf
                <div class="form-group row">
                    <label class="col-2 col-form-label">Kode Proyek</label>
                    <div class="col-5">
                        <input type="text" class="form-control" name="id_proyek" placeholder="Kode proyek" value="{{$proyek->id_proyek}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Deskripsi</label>
                    <div class="col-5">
                        <input type="text" class="form-control" name="deskripsi_proyek" placeholder="Nama proyek" value="{{$proyek->deskripsi_proyek}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Status</label>
                    <select name="status_proyek" class="custom-select col-4" style="margin-left:15px;">
                        <option value="1" {{ ( 1 == $proyek->status_proyek) ? 'selected' : '' }}>Dikerjakan</option>
                        <option value="0" {{ ( 0 == $proyek->status_proyek) ? 'selected' : '' }}>Selesai</option>
                    </select>
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

