@extends('layouts.app')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Tampilan Jadwal Pegawai</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('jdwl.index') }}"> Kembali</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama :</strong>
                {{ $jdwl->Nama }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status :</strong>
                {{ $jdwl->Status }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jam Kerja :</strong>
                {{ $jdwl->JamKerja }}
            </div>
        </div>
    </div>
@endsection
