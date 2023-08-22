@extends('admin.admin_master')
@section('title')
Admin | Inisiasi FTI UAJY 2023
@endsection
@section('content')

<h4 style="color: black;">Kepanitiaan</h4>

@foreach ($bidang as $item)
    <h5 style="padding-top: 2rem">
        {{$item->nama_bidang}}
    </h5>
    <div class="row">
        <div class="col-md-8 card p-3">
                <table class="table table-striped table_id">
                    <thead>
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Bidang</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($panitia as $pnt)
                        @if ($pnt->bidang_id == $item->id)
                        <tr>
                            <td>
                                <img style="max-width: 5rem" src="{{asset($pnt->foto)}}" alt="">
                            </td>
                            <td class="align-middle">{{$pnt->nama}}</td>
                            <td class="align-middle">{{$pnt->bidang->nama_bidang}}</td>
                            <td class="align-middle">{{$pnt->sub_bidang->nama_sub_bidang}}</td>
                            <td class="align-middle">
                                <a href="{{route('panitia.edit', encrypt($pnt->id))}}" class="btn btn-warning text-white"><i class="fa-sharp fa-solid fa-pen-to-square"></i>Edit</a>
                                <a href="{{route('panitia.hapus', $pnt->id)}}" class="btn btn-danger text-white"><i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <form class="card p-3" method="POST" action="{{route('admin.list_panitia.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <select class="form-control" name="bidang_id" id="">
                        <option selected value="{{$item->id}}">{{$item->nama_bidang}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="sub_bidang_id" id="">
                        <option selected disabled value="">Pilih Sub Menu Bidang</option>
                        @foreach ($sub_bidang as $sb)
                            @if ($sb->bidang_id == $item->id)
                                <option value="{{ $sb->id }}" {{ old('sub_bidang_id') == $sb->id ? 'selected' : '' }}>{{ $sb->nama_sub_bidang }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('sub_bidang_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama">
                    @error('nama')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Foto</label>
                    <input type="file" name="foto" class="form-control" id="exampleInputPassword1" placeholder="Nama event">
                    @error('foto')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div> 
@endforeach

<script>
    $(document).ready(function() {
        $('.table_id').DataTable();
    });
</script>

@endsection