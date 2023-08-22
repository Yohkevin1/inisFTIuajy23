@extends('admin.admin_master')
@section('title')
Admin Panel Dashboard
@endsection
@section('content')

<h4 style="color: black;">
    Edit Timeline {{$timeline->nama_event}}
</h4>


<div class="row">
    <div class="col-md-6 card p-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nama Event</th>
                    <th scope="col">Tanggal Pelaksanaan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$timeline->nama_event}}</td>
                    <td>{{date('D, d M Y', strtotime($timeline->tanggal_pelaksanaan));}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <form class="card p-3" method="POST" action="{{route('admin.timeline.update', encrypt($timeline->id))}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Date</label>
                <input type="date" value="{{$timeline->tanggal_pelaksanaan}}" name="tanggal_pelaksanaan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                @error('tanggal_pelaksanaan')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nama event</label>
                <input type="text" value="{{$timeline->nama_event}}" name="nama_event" class="form-control" id="exampleInputPassword1" placeholder="Nama event">
                @error('nama_event')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</div>


@endsection