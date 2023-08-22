@extends('admin.admin_master')
@section('title')
Admin Panel Dashboard
@endsection
@section('content')

<h4 style="color: black;">
    Edit Tugas {{$tugas->judul}}
</h4>

<div class="row">
    {{-- <div class="col-md-5 card p-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Judul Tugas</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$tugas->judul}}</td>
                    <td style="white-space: pre-line;">{{ substr($tugas->deskripsi, 0, 100) }}...</td>
                    @if ($tugas->start_date )
                        <td>{{ \Carbon\Carbon::parse($tugas->start_date)->format('D, d M Y H:i') }}</td>
                    @else
                        <td>-</td>
                    @endif

                    @if ($tugas->end_date)
                        <td>{{ \Carbon\Carbon::parse($tugas->end_date)->format('D, d M Y H:i') }}</td>
                    @else
                        <td>-</td>
                    @endif
                </tr>
            </tbody>
        </table>
    </div> --}}
    <div class="col-md-12">
        <form class="card p-3" method="POST" action="{{route('admin.tugas.update', encrypt($tugas->id))}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Judul Tugas</label>
                <input type="text" name="judul" value="{{$tugas->judul}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Judul Tugas">
                @error('judul')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" value="{{$tugas->deskripsi}}" class="form-control" name="deskripsi" placeholder="Deskripsi" rows="8">{{$tugas->deskripsi}}</textarea>
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
                <input type="text" value="{{$tugas->link}}" name="link" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan link sosmed">
                @error('link')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Opened Date</label>
                <input type="datetime-local" value="{{$tugas->start_date}}" name="start_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan tanggal mulai link">
                @error('start_date')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Due Date</label>
                <input type="datetime-local" value="{{$tugas->end_date}}" name="end_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan tanggal akhir link">
                @error('end_date')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <!-- <div class="text-center"> -->
            <button type="submit" class="btn btn-primary">Submit</button>
            <!-- </div> -->
        </form>
    </div>
    <div class="mt-3">
        <button class="btn btn-danger" onclick="history.back()">Kembali</button>
    </div>
</div>

@endsection