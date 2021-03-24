@extends('mahasiswas.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Detail Mahasiswa
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Nim: </b>{{$Mahasiswa->Nim}}</li>
                    <li class="list-group-item"><b>Nama: </b>{{$Mahasiswa->Nama}}</li>
                    <li class="list-group-item"><b>Kelas: </b>{{$Mahasiswa->Kelas}}</li>
                    <li class="list-group-item"><b>Jurusan: </b>{{$Mahasiswa->Jurusan}}</li>
                    <li class="list-group-item"><b>No_Handphone: </b>{{$Mahasiswa->No_Handphone}}</li>
                    <li class="list-group-item"><b>Email: </b>{{$Mahasiswa->email}}</li>
                    <li class="list-group-item"><b>Tanggal Lahir: </b>{{isset($Mahasiswa->tanggal_lahir) ? \Carbon\Carbon::parse($Mahasiswa->tanggal_lahir)->toFormattedDateString() : ''}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt3" href="{{ route('mahasiswas.index') }}">Kembali</a>
            <div class="d-flex justify-content-between">
                <a class="btn m-3 {{isset($prev->Nim) ? 'btn-outline-primary' : 'disabled' }}" href="{{ isset($prev->Nim) ? route('mahasiswas.show', $prev->Nim) : '' }}"><i class="fas fa-chevron-left"></i> Sebelumnya</i></a>
                <a class="btn m-3 {{isset($next->Nim) ? 'btn-outline-primary' : 'disabled' }}" href="{{ isset($next->Nim) ? route('mahasiswas.show', $next->Nim) : '' }}">Selanjutnya <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
