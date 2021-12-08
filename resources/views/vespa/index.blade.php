@extends('adminlte::page')
@section('title', 'List Vespa')
@section('content_header')
    <h1 class="m-0 text-dark">List Vespa</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('vespa.create')}}" class="btn btn-light bg-lightblue mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead class="table-dark bg-teal">
                        <tr>
                            <th>No</th>
                            <th>Vespa</th>
                            <th>Tahun</th>
                            <th>Kondisi</th>
                            <th>Harga</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vespa as $key => $vsp)
                            <tr class="table-light">
                                <td>{{$key+1}}</td>
                                <td>{{$vsp->nama_vespa}}</td>
                                <td>{{$vsp->tahun}}</td>
                                <td>{{$vsp->kondisi}}</td>
                                <td>{{$vsp->harga}}</td>
                                <td>
                                <a href="{{route('vespa.edit', $vsp)}}" class="btn btn-light bg-lightblue btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('vespa.destroy', $vsp)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-light bg-lime btn-xs">
                                    Delete
                                </a>
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
