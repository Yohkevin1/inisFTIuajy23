@extends('admin.admin_master')
@section('title')
Admin Panel Dashboard
@endsection
@section('content')

<h4 style="color: black;">
    Akun User
</h4>

<div class="row">

    <div class="col-md-8 card p-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">NPM</th>
                    <th scope="col">Email</th>

                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->npm ?? '-'}}</td>
                    <td>{{$item->email ?? '-'}}</td>
                    <td>
                        <a href="{{route('admin.update.user.page', encrypt($item->id))}}" class="btn btn-warning text-white"><i class="fa-sharp fa-solid fa-pen-to-square"></i>
                            Edit
                        </a>
                        <a href="{{route('admin.delete', encrypt($item->id))}}" class="btn btn-danger text-white"><i class="fa-sharp fa-solid fa-pen-to-square"></i>
                            Hapus
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <form class="card p-3" method="POST" action="{{route('admin.account_user')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input nama">
                @error('nama')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Input Email">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Password">
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password Confirmation</label>
                <input type="password" name="pass_confirm" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Password">
                @error('pass_confirm')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Role</label>
                <select class="form-control" name="role">
                    <option value="sekret">Sekret</option>
                    <option value="acara">Acara</option>
                    <option value="tugas">Tugas</option>
                </select>
                @error('role')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


</div>


@endsection