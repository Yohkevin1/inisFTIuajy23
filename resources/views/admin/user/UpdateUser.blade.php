@extends('admin.admin_master')
@section('title')
Admin Panel Dashboard
@endsection
@section('content')

<h4 style="color: black;">
    Update Akun {{$akun->name}}
</h4>

<div class="row">
    <div class="col-md-8 card p-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">NPM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @if ($akun)
                    @if ($akun->npm === null)
                    <th scope="row">-</th>
                    @else
                    <th scope="row">{{ $akun->npm }}</th>
                    @endif
                    @endif
                    <td>{{$akun->name}}</td>
                    <td>{{$akun->email}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <form class="card p-3" method="POST" action="{{route('admin.update.user', encrypt($akun->id))}}">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" value="{{ $akun->name }}" name="nama" class="form-control" id="nama" placeholder="Nama">
                @error('nama')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" class="form-control" type="password" name="password" placeholder="Password">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Password Confirmation</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" placeholder="Password Confirmation">
                @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- <div class="text-center"> -->
            <button type="submit" class="btn btn-primary">Reset Pass</button>
            <!-- </div> -->
        </form>
    </div>
    <div class="mt-3">
        <button class="btn btn-danger" onclick="history.back()">Kembali</button>
    </div>
</div>

@endsection