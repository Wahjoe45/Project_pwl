@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>DATA RIWAYAT KONSULTASI</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('knsl.create') }}"> Input Riwayat Konsultasi</a>
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
            <th>Nama</th>
            <th width="280px"class="text-center">Asal</th>
            <th width="280px"class="text-center">TanggalKonsultasi</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($knsl as $konsultasi)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $konsultasi->Nama }}</td>
            <td>{{ $konsultasi->Asal }}</td>
            <td>{{ $konsultasi->TanggalKonsultasi }}</td>
            <td class="text-center">
                <form action="{{ route('knsl.destroy',$konsultasi->id) }}" method="POST">

                   <a class="btn btn-info btn-sm" href="{{ route('knsl.show',$konsultasi->id) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('knsl.edit',$konsultasi->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $knsl->links() !!}

@endsection