@extends('layout.master.main')

@push('style')
<style>
    .card-title {
        margin-top: 40px;
    }

    .tbl-container {
        width: 100%;
        margin-top: 10px;
    }

    .bg-tbl {
        background-color: #5C9DED;
        color: white;
    }

    .bdr {
        border-radius: 6px;
        overflow: hidden;
    }
</style>
@endpush

@section('content')
<div class="page-content">
    @include('include.master.breadcrumb')

    <div class="row">
        <div class="col-md-12">
            <div class="card" style="background: #ffffff">
                <div class="card-body">
                    @foreach($guru as $item)
                    <div class="my-3 mx-3">
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="{{url('assets/images/avatar.png')}}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <h3 class="col text-muted text-sm-start">{{$item->nama_guru}}</h3>
                                </div>
                                <div class="row">
                                    <p class="col text-muted text-sm-start">NIP. {{$item->nip}}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-start mb-0 mb-sm-3">NIK</p>
                                    <p class="col-sm-1 text-muted text-sm-center">:</p>
                                    <p class="col-sm-6">{{$item->nik}}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-start mb-0 mb-sm-3">Tanggal Lahir</p>
                                    <p class="col-sm-1 text-muted text-sm-center">:</p>
                                    <p class="col-sm-6">{{$item->tanggal_lahir}}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-start mb-0 mb-sm-3">Usia</p>
                                    <p class="col-sm-1 text-muted text-sm-center">:</p>
                                    <p class="col-sm-6">{{$item->usia}}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-start mb-0 mb-sm-3">Email</p>
                                    <p class="col-sm-1 text-muted text-sm-center">:</p>
                                    <p class="col-sm-6">{{Auth::user()->email}}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-start mb-0 mb-sm-3">Telepon</p>
                                    <p class="col-sm-1 text-muted text-sm-center">:</p>
                                    <p class="col-sm-6">{{$item->telepon}}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-start mb-0 mb-sm-3">Alamat</p>
                                    <p class="col-sm-1 text-muted text-sm-center">:</p>
                                    <p class="col-sm-6">{{$item->alamat}}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-start mb-0 mb-sm-3">Subminkal</p>
                                    <p class="col-sm-1 text-muted text-sm-center">:</p>
                                    <p class="col-sm-6">{{$item->subminkal}}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-start mb-0 mb-sm-3">TMTA</p>
                                    <p class="col-sm-1 text-muted text-sm-center">:</p>
                                    <p class="col-sm-6">{{$item->tmta}}</p>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <!-- <i class='bx bxs-circle' style='color:#0000ff'>Aktif</i> -->
                                <button type="button" class="btn" style="color:#0000ff; border-radius: 8px;"><i class='bx bxs-circle' style='color:#0000ff'></i>Aktif</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="tbl-container bdr">
                                    <table class="table">
                                        <thead class="bg-tbl">

                                            <tr>
                                                <th scope="col">TUGAS UTAMA</th>
                                                <th scope="col">TUGAS TAMBAHAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$item->tugas_utama}}</th>
                                                <td>{{$item->tugas_tambahan}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="{{route('editprofilGuru')}}" type="button" class="btn" style="background-color: #5A79CB; color:white; border-radius: 10px;">Edit Profil</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
@endsection