@extends('layouts.app')

@section('content')

    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Menu Group and Menu Item</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Menu Item Management</h2>
            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Data Jadwal Pegawai</h4>
                            <div class="card-header-action">
                                <a class="btn btn-icon icon-left btn-primary" href="{{ route('jdwl.create') }}">Create New
                                    Jadwal Pegawai</a>
                                <a class="btn btn-info btn-primary active import">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    Import Jadwal Pegawai</a>
                                <a class="btn btn-info btn-primary active" href="{{ route('user.export') }}">
                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                    Export Jadwal Pegawai</a>
                                <a class="btn btn-info btn-primary active search">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    Search Jadwal Pegawai</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="show-search mb-3" style="display: none">
                                <form id="search" method="GET" action="{{ route('jdwl.index') }}">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="role">User</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="User Name">
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                        <a class="btn btn-secondary" href="{{ route('jdwl.index') }}">Reset</a>
                                    </div>
                                </form>
                            </div>

                            <div class="show-search mb-3" style="display: none">
                                <form id="search" method="GET" action="{{ route('jdwl.index') }}">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="role">User</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="User Name">
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                        <a class="btn btn-secondary" href="{{ route('jdwl.index') }}">Reset</a>
                                    </div>
                                </form>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Jam Kerja</th>
                                            <th class="text-center">Action</th>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @if ($message = Session::get('succes'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif --}}
    </section>
@endsection

@push('customScript')
    <script>
        $(document).ready(function() {
            $('.import').click(function(event) {
                event.stopPropagation();
                $(".show-import").slideToggle("fast");
                $(".show-search").hide();
            });
            $('.search').click(function(event) {
                event.stopPropagation();
                $(".show-search").slideToggle("fast");
                $(".show-import").hide();
            });
            //ganti label berdasarkan nama file
            $('#file-upload').change(function() {
                var i = $(this).prev('label').clone();
                var file = $('#file-upload')[0].files[0].name;
                $(this).prev('label').text(file);
            });
        });
    </script>
@endpush

@push('customStyle')
@endpush
