@extends('obats.layout')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Edit Pesanan Obat</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('obats.index') }}"> Kembali</a>

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



    <form action="{{ route('obats.update',$obat->id) }}" method="POST" enctype="multipart/form-data">

        @csrf

        @method('PUT')



         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Nama:</strong>

                    <input type="text" name="nama" value="{{ $obat->nama }}" class="form-control" placeholder="Nama">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Keterangan:</strong>

                    <textarea class="form-control" style="height:150px" name="keterangan" placeholder="Keterangan">{{ $obat->keterangan }}</textarea>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Resep:</strong>

                    <input type="file" name="resep" class="form-control" placeholder="resep">

                    <img src="/resep/{{ $obat->resep }}" width="300px">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

              <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>



    </form>

@endsection
