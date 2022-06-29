@extends('layouts.app')

@section('content')

    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>DATA PEGAWAI</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('pgw.create') }}"> Input Pegawai</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('succes'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="280px"class="text-center">NIP</th>
            <th width="280px"class="text-center">Nama Pegawai</th>
            <th width="280px"class="text-center">Asal</th>
            <th width="280px"class="text-center">Status</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($pgw as $pegawai)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $pegawai->NIP }}</td>
            <td>{{ $pegawai->NamaPegawai }}</td>
            <td>{{ $pegawai->Asal }}</td>
            <td>{{ $pegawai->Status }}</td>
            <td class="text-center">
                <form action="{{ route('pgw.destroy',$pegawai->id) }}" method="POST">

                   <a class="btn btn-info btn-sm" href="{{ route('pgw.show',$pegawai->id) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('pgw.edit',$pegawai->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $pgw->links() !!}

@endsection
