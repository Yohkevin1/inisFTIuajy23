@extends('admin.admin_master')
@section('title')
    Admin | Inisiasi FTI UAJY 2023
@endsection
@section('content')

<h4 style="color: black;">
    Edit {{$panitia->nama}}
</h4>
<div class="row">
    <div class="col-md-7 card p-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Bidang</th>
                    <th scope="col">Jabatan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <img style="max-width: 5rem" src="{{asset($panitia->foto)}}" alt="">
                    </td>
                    <td class="align-middle">{{$panitia->nama}}</td>
                    <td class="align-middle">{{$panitia->bidang->nama_bidang}}</td>
                    <td class="align-middle">{{$panitia->sub_bidang->nama_sub_bidang}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-5">
        <form class="card p-3" method="POST" action="{{route('panitia.update', encrypt($panitia->id))}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <select class="form-control" name="bidang_id" id="">
                    <option selected value="{{ $bidang->id }}">{{ $bidang->nama_bidang }}</option>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="sub_bidang_id">
                    <option selected disabled value="">Pilih Sub Menu Bidang</option>
                    @foreach ($sub_bidang as $sb)
                        <option value="{{ $sb->id }}" {{ old('sub_bidang_id') == $sb->sub_bidang ? 'selected' : '' }}>{{ $sb->nama_sub_bidang }}</option>
                    @endforeach
                </select>
                @error('sub_bidang_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Lengkap</label>
                <input type="text" name="nama" value="{{$panitia->nama}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama">
                @error('nama')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Foto</label>
                <input type="file" name="foto" class="form-control" id="exampleInputPassword1" placeholder="Nama event">
                @error('foto')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="mt-3">
        <button class="btn btn-danger" onclick="history.back()">Kembali</button>
    </div>
</div>
@endsection
    
    