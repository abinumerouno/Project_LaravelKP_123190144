@extends('adminlte::page')
@section('title', 'Edit Vespa')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Vespa</h1>
@stop
@section('content')
    <form action="{{route('vespa.update', $vespa)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Vespa</label>
                        <input type="name" class="form-control @error('nama_vespa') is-invalid @enderror" id="exampleInputName" placeholder="Jenis Vespa" name="nama_vespa" value="{{old('nama_vespa')}}">
                        @error('nama_vespa') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTahun">Tahun</label>
                        <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="exampleInputTahun" placeholder="Tahun keluaran" name="tahun" value="{{old('tahun')}}">
                        @error('Tahun') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDeskripsi">Kondisi</label>
                        <input type="text" class="form-control @error('kondisi') is-invalid @enderror" id="exampleInputDeskripsi" placeholder="Kondisi Vespa" name="kondisi" value="{{old('kondisi')}}">
                        @error('deskripsi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputHarga">Harga</label>
                        <input type="text" class="form-control @error('harga') is-invalid @enderror" id="exampleInputHarga" placeholder="Harga Vespa" name="harga" value="{{old('harga')}}">
                        @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('vespa.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
