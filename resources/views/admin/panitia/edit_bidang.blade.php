@extends('admin.admin_master')
@section('title')
Admin Panel Dashboard
@endsection
@section('content')

<h4 style="color: black;">
    Bidang Panitia
</h4>
<div class="row">
    <div class="col-md-8 card p-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Logo Bidang</th>
                    <th scope="col">Nama Bidang</th>
                    <th scope="col">Prioritas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bidang as $item)
                <tr>
                    <th scope="row">
                        <img class="img-fluid" style="width: 10rem" src="{{asset($item->logo_bidang)}}" alt="">
                    </th>
                    <td style="margin: auto" class="align-middle">{{$item->nama_bidang}}</td>
                    <td style="margin: auto" class="align-middle">{{$item->prioritas}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <form class="card p-3" method="POST" action="{{route('admin.bidang.update', encrypt($item->id))}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$item->logo_bidang}}" name="old_brand_image">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama bidang</label>
                <input type="text" value="{{$item->nama_bidang}}" name="nama_bidang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan bidang">
                @error('nama_bidang')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Logo Bidang</label>
                <input type="file" name="logo_bidang" class="form-control" id="exampleInputPassword1" placeholder="Nama event">
                @error('logo_bidang')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Prioritas</label>
                <input type="text" name="prioritas" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan prioritas">
                @error('prioritas')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <div class="mt-3">
        <button class="btn btn-danger" onclick="history.back()">Kembali</button>
    </div>
</div>


@endsection