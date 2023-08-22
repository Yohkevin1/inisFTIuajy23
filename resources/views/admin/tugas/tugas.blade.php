@extends('admin.admin_master')
@section('title')
Admin Panel Dashboard
@endsection
@section('content')

<h4 style="color: black;">
    Tugas
</h4>

<div class="row">
    <div class="col-md-8 card p-3">
        <table id="table_id" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Judul Tugas</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tugas as $item)
                <tr>
                    <td>{{$item->judul}}</td>
                    <td style="white-space: pre-line;">{{substr($item->deskripsi, 0, 100)}}...</td>
                    @if ($item->start_date )
                        <td>{{ \Carbon\Carbon::parse($item->start_date)->format('D, d M Y H:i') }}</td>
                    @else
                        <td>-</td>
                    @endif

                    @if ($item->end_date)
                        <td>{{ \Carbon\Carbon::parse($item->end_date)->format('D, d M Y H:i') }}</td>
                    @else
                        <td>-</td>
                    @endif

                    <td>
                        <a href="{{route('admin.edit.tugas', encrypt($item->id))}}" class="btn btn-secondary text-white"><i class="fa-sharp fa-solid fa-pen-to-square"></i>
                            Edit
                        </a>
                        @if ($item->file)
                        <a href="{{route('admin.tugas.download', encrypt($item->id))}}" class="btn btn-warning text-white"><i class="fa-sharp fa-solid fa-pen-to-square"></i>
                            Download File
                        </a>
                        @endif
                        @if ($item->link)
                        <a href="{{ $item->link }}" class="btn btn-info text-white"><i class="fa-sharp fa-solid fa-pen-to-square"></i>
                            Pengumpulan
                        </a>
                        @endif
                        <a href="{{route('admin.tugas.delete', $item->id)}}" class="btn btn-danger text-white"><i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                            Hapus
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <form class="card p-3" method="POST" action="{{route('admin.tugas')}}" enctype="multipart/form-data">
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
                <label for="exampleInputPassword1">File Tugas</label>
                <input type="file" name="file" class="form-control" id="exampleInputPassword1">
                @error('file')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Link Pengumpulan</label>
                <input type="text" name="link" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan link sosmed">
                @error('link')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Opened Date</label>
                <input type="datetime-local" name="start_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan tanggal mulai link">
                @error('start_date')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Due Date</label>
                <input type="datetime-local" name="end_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan tanggal akhir link">
                @error('end_date')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <!-- <div class="text-center"> -->
            <button type="submit" class="btn btn-primary">Submit</button>
            <!-- </div> -->
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
</script>

@endsection