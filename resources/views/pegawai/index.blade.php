@extends('layouts.global')
{{-- @extends('components.notifikasi') --}}

@section('title')
    pegawai
@endsection

@section('content')
    <div class="container">
        <div style="margin-bottom:7%">
            <h3 class="text-center">Pegawai</h3>
            <a href="{{url("pegawai/create")}}" class="btn btn-primary  float-right">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        </div>

        @include('components.notifikasi')

        {{-- isi konten --}}
        <div class="container">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">SSN</th>
                    <th scope="col">Pegawai</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Pilihan</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($pegawais as $iteration => $pegawai)
                    <tr>
                        <td>{{$iteration+1}}</td>
                        <td>{{$pegawai->nama_pegawai}} </td>
                        <td>{{$pegawai->ssn}} </td>
                        <td>
                            @if($pegawai->foto)
                            <img src="{{asset('storage/'.$pegawai->foto)}}" class="img-table">
                            @endif
                        </td>
                        <td>
                            <form action="{{url("pegawai/{$pegawai->id_pegawai}")}}" method="post">
                                <a href="{{url("pegawai/{$pegawai->id_pegawai}/edit")}}" class="btn btn-outline-secondary btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-outline-danger btn-sm" title="Hapus Permanen" onclick="return confirm('Hapus permanen data ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $pegawais->links() }}
        </div>
    </div>
@endsection

