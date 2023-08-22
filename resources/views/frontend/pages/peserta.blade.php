@extends('frontend.main_master')
@section('content')

<section class="mobile-view" style="background: linear-gradient(180deg, #1F443E 0%, #83AF97 100%)" style="z-index: 1">
    <div class="container" style="padding-top: 10rem; padding-bottom: 2rem">
        <div class="d-flex justify-content-center" style="">
            <h2 class="PK" >KELOMPOK</h2>
        </div>
        <div class="row justify-content-center" style="padding-top: 1rem">
            <div class="tombol justify-content-center" style="background: #83AF97;">
                <Button type="button" class="btn btn-success tombol" data-toggle="modal" data-target="#modalKelompok">CEK PEMBAGIAN KELOMPOK</Button>
            </div>
        </div>
    </div>
</section>

@if ($lulus)
<section class="mobile-view justify-content Center" style="background: #83AF97" style="z-index: 1">
    <div class="container" style="padding-top: 2rem; padding-bottom: 2rem">
        <div class="d-flex justify-content-center" style="">
            <h2 class="PK">KELULUSAN</h2>
        </div>
        <div class="row justify-content-center" style="padding-top: 1rem">
            <div class="justify-content-center" style="background: #83AF97;">
                <Button type="button" class="btn btn-success tombol" data-toggle="modal" data-target="#myModal">KELULUSAN INISIASI</Button>
            </div>
        </div>
    </div>
</section>
@endif

<style>
    .tombol{
        border-radius: 10px
    }

    .color-red{
        color: #ffffff !important
    }
    .batu-cover::after {
    content: '';
    width: 100%;
    height: 100%;
    background: #83AF97 !important;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    }

    .PK{
        text-align: center;
        font-size: 4rem;
        font-family: 'Festival-Budaya'; color: #ffffff;
    }

    @media only screen and (max-width: 425px){
        .PK{
            margin-top: 30px;
            font-size: 3rem;
        }
    }
</style>

{{-- Modal Kelompok--}}
<div class="modal fade" id="modalKelompok" style="z-index: 2000">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content" style="background: #1F443E; color: #ffffff; border-radius:10px">
            <!-- Modal Header -->
            <div class="modal-header justify-content-center">
                <h4 class="modal-title">Data Kelompok</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body text-center">
                <div class="mb-3">
                    <input type="text" id="searchInputKelompok" class="form-control" placeholder="Cari Nama Mahasiswa">
                </div>
                <div class="table-responsive">
                    <table id="table_id_kelompok" class="display table-bordered mt-3" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>NAMA</th>
                                <th>NPM</th>
                                <th>KELOMPOK</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa as $item)
                            <tr>
                                <td >{{$item->nama}}</td>
                                <td>{{$item->npm}}</td>
                                <td>{{$item->kelompok}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInputKelompok = document.getElementById("searchInputKelompok");
            const tableKelompok = document.getElementById("table_id_kelompok").getElementsByTagName("tbody")[0].rows;
            
            searchInputKelompok.addEventListener("input", function() {
                const searchValueKelompok = searchInputKelompok.value.toLowerCase();
                for (let i = 0; i < tableKelompok.length; i++) {
                    const rowData = tableKelompok[i].innerText.toLowerCase();
                    if (rowData.includes(searchValueKelompok)) {
                        tableKelompok[i].style.display = "";
                    } else {
                        tableKelompok[i].style.display = "none";
                    }
                }
            });
        });
    </script>
</div>

{{-- Modal Lulus --}}
<div class="modal fade" id="myModal" style="z-index: 2000">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content" style="background: #1F443E; color: #ffffff">
            <!-- Modal Header -->
            <div class="modal-header justify-content-center">
                <h4 class="modal-title">Kelulusan Inisiasi</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body text-center">
                <div class="mb-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Cari Nama Mahasiswa">
                </div>
                <div class="table-responsive">
                    <table id="table_id" class="display table-bordered mt-3" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>NAMA</th>
                                <th>NPM</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa as $item)
                            @if ($item->status_lulus == 'Lulus'|| $item->status_lulus =='Tidak Lulus')
                                <tr>
                                    <td class="text-left">{{$item->nama}}</td>
                                    <td>{{$item->npm}}</td>
                                    <td>{{$item->status_lulus}}</td>
                                </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("searchInput");
            const table = document.getElementById("table_id").getElementsByTagName("tbody")[0].rows;
            
            searchInput.addEventListener("input", function() {
                const searchValue = searchInput.value.toLowerCase();
                for (let i = 0; i < table.length; i++) {
                    const rowData = table[i].innerText.toLowerCase();
                    if (rowData.includes(searchValue)) {
                        table[i].style.display = "";
                    } else {
                        table[i].style.display = "none";
                    }
                }
            });
        });
    </script>
</div>

@endsection