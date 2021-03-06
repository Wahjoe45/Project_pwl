@extends('layouts.app')

@section('content')

    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Data Pegawai</h2>
            </div>

            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('pgw.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pgw.update',$pgw->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NIP :</strong>
                    <input type="text" name="NIP" class="form-control" placeholder="NIP PEGAWAI" value="{{ $pgw->NIP }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Pegawai :</strong>
                    <input type="text" name="NamaPegawai" value="{{ $pgw->NamaPegawai }}" class="form-control" placeholder="NAMA PEGAWAI">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Asal :</strong>
                    <textarea class="form-control" style="height:150px" name="Asal" placeholder="Content">{{ $pgw->Asal }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status :</strong>
                    <textarea class="form-control" style="height:150px" name="Status" placeholder="Content">{{ $pgw->Status }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>

@endsection
