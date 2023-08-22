@extends('admin.admin_master')
@section('title')
Admin Panel Dashboard
@endsection
@section('content')

<h4 style="color: black;">
    Sosial Media
</h4>

<div class="row">

    <div class="col-md-8 card p-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Logo</th>
                    <th scope="col">Sosmed</th>
                    <th scope="col">Link</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sosmed as $item)
                <tr>
                    <th scope="row">
                        <img class="img-fluid" style="width: 5rem" src="{{asset($item->logo)}}" alt="">
                    </th>
                    <td style="margin: auto" class="align-middle">{{$item->nama_sosmed}}</td>
                    <td style="margin: auto" class="align-middle">{{$item->link}}</td>
                    <td class="align-middle">
                        <!-- <a href="{{route('admin.delete.sosial_media', $item->id)}}">Hapus</a> -->
                        <a href="{{route('admin.delete.sosial_media', encrypt($item->id))}}" class="btn btn-danger text-white"><i class="fa-sharp fa-solid fa-pen-to-square"></i>
                            Hapus
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <form class="card p-3" method="POST" action="{{route('admin.sosmed.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Sosmed</label>
                <input type="text" name="nama_sosmed" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama sosmed">
                @error('nama_sosmed')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Logo Sosmed</label>
                <input type="file" name="logo" class="form-control" id="exampleInputPassword1">
                @error('logo')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Link Sosmed</label>
                <input type="text" name="link" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan link sosmed">
                @error('link')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


@endsection