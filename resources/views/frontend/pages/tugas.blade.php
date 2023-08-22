@extends('frontend.main_master')
@section('content')

<section class="mobile-view" style="background: linear-gradient(180deg, #1F443E 0%, #83AF97 100%); padding-bottom: 2rem" style="z-index: 1">
    <div class="container" style="padding-top: 10rem">
        <div class="d-flex justify-content-center" style="margin-bottom: 1rem">
            <h2 style="text-align: center; font-size: 4rem; font-family: 'Festival-Budaya'; color: #ffffff">TUGAS</h2>
        </div>
        @foreach ($tugas as $item)
        <div class="container" style="display: flex; justify-content: center; margin-bottom: 3%; margin-top: 3%">
            <div class="card" style="padding-bottom: 1.5rem; padding-top: 1.5rem">
                <div class="judul d-flex align-items-center justify-content-between">
                    <div class="judul-tugas">
                        {{$item->judul}}
                    </div>
                    @if ($item->file)
                    <a href="{{route('admin.tugas.download', encrypt($item->id))}}" id="back_file" style="background: rgba(164.69, 164.69, 164.69, 0.35); border-radius: 20px; margin-bottom:5px;">
                        <div style="color: white; font-size: 20px; font-family: Poppins; margin-left:1rem; margin-right:1rem">File</div>
                    </a>
                    @endif
                </div>
                @if ($item->start_date )
                <h6 class="date judul"><strong>Opened: </strong>{{ \Carbon\Carbon::parse($item->start_date)->format('D, d M Y H:i') }}</h6>
                @endif
                @if ($item->end_date)
                <h6 class="date judul"><strong>Due: </strong>{{ \Carbon\Carbon::parse($item->end_date)->format('D, d M Y H:i') }}</h6>
                @endif
                <div class="desc_box judul" style="overflow: hidden;">
                    <p class="description" data-full-description="{{$item->deskripsi}}">{{substr($item->deskripsi, 0, 200)}}
                    </p>
                    <button class="btn btn-link" data-toggle="modal" data-target="#modalTugas">Show More</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<style>
    .judul-tugas{
        color: white;
        font-size: 40px;
        font-family: Poppins;
    }

    .description{
        padding: 1%;
        color: #ffffff;
        white-space: pre-line;
        text-align: justify;
    }

    .judul{
        margin-left: 2rem;
        margin-right: 2rem;
    }

    .date{
        margin-top: 5px; margin-left:2rem; color:white
    }

    .card{
        width: 100%;
        max-width: 100%;
        height: 100%;
        background: #1F443E;
        border-radius: 10px;
        border: 0.50px #1F443E solid
    }

    .desc_box{
        border-radius: 10px;
        border: 0.50px white solid;
        background: #4F7769;
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

    @media only screen and (max-width: 425px){
        .judul-tugas{
            font-size: 30px;
            margin-bottom: 5px;
        }
        .description{
            font-size: 15px;
            padding: 3%;
        }

        .judul{
            margin-left: 1rem;
            margin-right: 1rem;
        }
        h2{
            margin-top: 30px;
            margin-bottom: 30px
        }
    }
</style>

<div class="modal fade" id="modalTugas" style="z-index: 2000">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content" style="background: #1F443E; color: #ffffff; border-radius:10px">
            <!-- Modal Header -->
            <div class="modal-header justify-content-center">
               <h4 class="modal-title"></h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body text-center">
                <p id="modalDescription" style="color: white; text-align: left; white-space: pre-line;"></p>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#modalTugas').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var fullDescription = button.closest('.desc_box').find('.description').data('full-description');
                var title = button.closest('.card').find('.judul-tugas').text();
                $('#modalTugas .modal-title').text(title);
                $('#modalDescription').text(fullDescription);
            });
        });
    </script>
</div>


@endsection