@extends('admin.admin_master')
@section('title')
Admin Panel Dashboard
@endsection
@section('content')

<h4 style="color: black;">
    Timeline
</h4>

<div class="row">
    <div class="col-md-8 card p-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nama Event</th>
                    <th scope="col">Tanggal Pelaksanaan</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($timelines as $item)
                <tr>
                    <td>{{$item->nama_event}}</td>
                    <td>{{date('D, d M Y', strtotime($item->tanggal_pelaksanaan));}}</td>
                    <td>
                        <!-- <a href="{{route('admin.edit.timeline', $item->id)}}">Edit</a>
                        <a href="{{route('admin.delete.timeline', $item->id)}}">Hapus</a> -->
                        <a href="{{route('admin.edit.timeline', encrypt($item->id))}}" class="btn btn-warning text-white"><i class="fa-sharp fa-solid fa-pen-to-square"></i>
                            Edit
                        </a>
                        <a href="{{route('admin.delete.timeline', encrypt($item->id))}}" class="btn btn-danger text-white"><i class="fa-sharp fa-solid fa-pen-to-square"></i>
                            Hapus
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <form class="card p-3" method="POST" action="{{route('admin.timeline.store')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Date</label>
                <input type="date" name="tanggal_pelaksanaan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                @error('tanggal_pelaksanaan')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nama event</label>
                <input type="text" name="nama_event" class="form-control" id="exampleInputPassword1" placeholder="Nama event">
                @error('nama_event')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


@endsection