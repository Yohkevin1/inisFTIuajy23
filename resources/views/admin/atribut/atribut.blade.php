@extends('admin.admin_master')
@section('title')
Admin Panel Dashboard
@endsection
@section('content')

<h4 style="color: black;">
    Atribut
</h4>

<div class="row">
    <div class="col-md-8 card p-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Judul</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($atribut as $item)
                <tr>
                    <td>{{$item->judul}}</td>
                    <td style="white-space: pre-line;">{{ substr($item->deskripsi, 0, 50) }}...</td>
                    <td>
                        <a href="{{route('admin.edit.atribut', encrypt($item->id))}}" class="btn btn-secondary text-white"><i class="fa-sharp fa-solid fa-pen-to-square"></i>
                            Edit
                        </a>
                        @if ($item->file)
                        <a href="{{route('admin.atribut.download', $item->id)}}" class="btn btn-warning text-white"><i class="fa-solid fa-cloud-arrow-down" style="color: #ffffff;"></i>
                            Download File
                        </a>
                        @endif
                        <a href="{{route('admin.atribut.delete', $item->id)}}" class="btn btn-danger text-white"><i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                            Hapus
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <form class="card p-3" method="POST" action="{{route('admin.atribut')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Judul Tugas</label>
                <input type="text" name="judul" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Judul Tugas">
                @error('judul')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" class="form-control" name="deskripsi" placeholder="Deskripsi" rows="4"></textarea>
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
</div>

@endsection