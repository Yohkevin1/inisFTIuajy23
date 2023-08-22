@extends('admin.admin_master')
@section('title')
Admin Panel Dashboard
@endsection
@section('content')

<h4 style="color: black;">
    Edit Atribut {{$atribut->judul}}
</h4>

<div class="row">
    <div class="col-md-12">
        <form class="card p-3" method="POST" action="{{route('admin.atribut.update', encrypt($atribut->id))}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Judul Atribut</label>
                <input type="text" name="judul" value="{{$atribut->judul}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Judul Tugas">
                @error('judul')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" class="form-control" name="deskripsi" placeholder="Deskripsi" rows="8">{{$atribut->deskripsi}}</textarea>
                @error('deskripsi')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">File</label>
                <input type="file" name="file" class="form-control" id="exampleInputPassword1">
                @error('file')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <!-- <div class="text-center"> -->
            <button type="submit" class="btn btn-primary">Submit</button>
            <!-- </div> -->
        </form>
    </div>
    <div class="mt-3">
        <button class="btn btn-danger" onclick="history.back()">Kembali</button>
    </div>
</div>

@endsection