@extends('layouts.app')

@section('content')

    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>PEMESANAN OBAT</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('obats.create') }}">Tambah Pesanan Obat</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">

        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="280px"class="text-center">Nama</th>
            <th width="280px"class="text-center">Keterangan</th>
            <th width="280px"class="text-center">Resep</th>
            <th width="280px"class="text-center">Action</th>
        </tr>

        @foreach ($obats as $obat)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/resep/{{ $obat->resep }}" width="100px"></td>
            <td>{{ $obat->nama }}</td>
            <td>{{ $obat->keterangan }}</td>
            <td>
                <form action="{{ route('obats.destroy',$obat->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('obats.show',$obat->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('obats.edit',$obat->id) }}">Edit</a>

                    @csrf

                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $obats->links() !!}

@endsection
