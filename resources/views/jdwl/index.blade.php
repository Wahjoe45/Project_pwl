@extends('layouts.app')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>DATA JADWAL PEGAWAI</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('jdwl.create') }}"> Input Jadwal</a>
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
            <th width="280px"class="text-center">Nama</th>
            <th width="280px"class="text-center">Status</th>
            <th width="280px"class="text-center">Jam Kerja</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($jdwl as $jadwal)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $jadwal->Nama }}</td>
            <td>{{ $jadwal->Status }}</td>
            <td>{{ $jadwal->JamKerja }}</td>
            <td class="text-center">
                <form action="{{ route('jdwl.destroy',$jadwal->id) }}" method="POST">

                   <a class="btn btn-info btn-sm" href="{{ route('jdwl.show',$jadwal->id) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('jdwl.edit',$jadwal->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $jdwl->links() !!}

@endsection
