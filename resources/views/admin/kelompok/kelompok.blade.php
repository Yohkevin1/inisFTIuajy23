@extends('admin.admin_master')
@section('title')
Admin Panel Dashboard
@endsection
@section('content')

<h4 style="color: black;">
    Kelompok
</h4>

<div class="container-fluid ">
    <div class="card bg-light mt-3">
        <div class="card-body">
            <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Data Mahasiswa</button>
            </form>
            <a style="margin: 1rem 0" class="btn btn-primary float-end" href="{{ route('users.export') }}">Export Data Mahasiswa</a>
            <!-- <a style="margin: 1rem 0" class="btn btn-danger float-end" href="{{ route('mahasiswa.delete.all') }}">Delete Data Mahasiswa</a> -->
            <a style="margin: 1rem 0" class="btn btn-danger float-end" href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteSemuaMahasiswa">Delete Data Mahasiswa</a>
            <table id="table_id" class="display table_bordered mt-3">
                <thead>
                    <tr>
                        <th>NAMA</th>
                        <th>NPM</th>
                        <th>KELOMPOK</th>
                        <th>STATUS LULUS</th>
                        <th>HANDLE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->npm}}</td>
                        <td>{{$item->kelompok}}</td>
                        <td>{{$item->status_lulus}}</td>
                        <td>
                            <button class="btn btn-info" data-bs-target="#Ubah{{$item->id}}" data-bs-toggle="modal">
                                Edit
                            </button>
                            <a class="btn btn-danger text-white" href="#Delete{{$item->id}}" data-bs-toggle="modal">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach ($users as $item)
<div class="modal fade" id="Ubah{{$item->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel{{$item->id}}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel{{$item->id}}">{{$item->nama}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="card p-3" method="POST" action="{{route('mahasiswa.update', encrypt($item->id))}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" value="{{$item->nama}}" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama">
                        @error('nama')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">NPM</label>
                        <input type="text" name="npm" class="form-control" id="exampleInputPassword1" value="{{$item->npm}}" placeholder="Masukkan NPM">
                        @error('npm')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kelompok</label>
                        <input type="text" value="{{$item->kelompok}}" name="kelompok" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan kelompok">
                        @error('kelompok')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Status Lulus</label>
                        <select class="form-control" name="status">
                            <option value="-" {{ $item->status_lulus === '-' ? 'selected' : '' }}>-</option>
                            <option value="Tidak Lulus" {{ $item->status_lulus === 'Tidak Lulus' ? 'selected' : '' }}>Tidak Lulus</option>
                            <option value="Lulus" {{ $item->status_lulus === 'Lulus' ? 'selected' : '' }}>Lulus</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Modal Konfirmasi Delete Semua Mahasiswa-->
<div class="modal fade" id="confirmDeleteSemuaMahasiswa" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus Semua Data Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus semua data mahasiswa? Data yang terhapus tidak dapat dikembalikan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="{{ route('mahasiswa.delete.all') }}" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Delete Mahasiswa-->
@foreach ($users as $item)
<div class="modal fade" id="Delete{{$item->id}}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Data {{ explode(' ', $item->nama)[0] }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data {{ explode(' ', $item->nama)[0] }}? Data yang terhapus tidak dapat dikembalikan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="{{route('mahasiswa.delete', encrypt($item->id))}}" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
</script>

@endsection