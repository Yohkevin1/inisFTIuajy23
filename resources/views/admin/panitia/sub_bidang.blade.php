@extends('admin.admin_master')
@section('title')
Admin | Inisiasi FTI UAJY 2023
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
                    <th scope="col">Nama Bidang</th>
                    <th scope="col">Daftar Sub Bidang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bidang as $item)
                @php
                $sub_bidang = App\Models\SubBidang::where('bidang_id', $item->id)->orderBy('prioritas', 'ASC')->get();
                @endphp
                <tr>

                    <td style="margin: auto" class="align-middle">{{$item->nama_bidang}}</td>
                    <td style="margin: auto" class="align-middle">
                        <ul>
                            @foreach ($sub_bidang as $sb)
                            <li style="list-style-type:circle">
                                {{$sb->nama_sub_bidang}} |
                                <span><a href="{{route('admin.delete.sub_bidang', $sb->id)}}">Hapus</a></span>
                            </li>
                            @endforeach
                        </ul>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <form class="card p-3" method="POST" action="{{route('admin.sub_bidang.store')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Bidang</label>
                <select name="bidang_id" class="form-control" id="">
                    <option value="" selected disabled></option>
                    @foreach ($bidang as $item)
                    <option value="{{$item->id}}">{{$item->nama_bidang}}</option>
                    @endforeach
                </select>
                @error('bidang_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Sub Bidang</label>
                <input type="text" name="nama_sub_bidang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Sub Bidang">
                @error('nama_sub_bidang')
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


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


</div>


@endsection