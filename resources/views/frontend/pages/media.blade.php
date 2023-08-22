@extends('frontend.main_master')
@section('content')

<section class="mobile-view" style="background: linear-gradient(180deg, #1F443E 0%, #83AF97 100%)" style="z-index: 1">
    <div class="container" style="padding-top: 10rem">
        <div class="d-flex justify-content-center" style="margin-bottom: 1rem">
            <h2 style="text-align: center; font-size: 4rem; font-family: 'Festival-Budaya'; color: #ffffff">MEDIA</h2>
        </div>
        <div class="row" style="display: flex; justify-content: center">
            <div class="col-md-6" id="music-video">
                <div class="d-flex justify-content-center" style="margin-bottom: 1rem">
                    <h3 class="tit"  style="text-align: center; color: #ffffff">TEASER</h3>
                </div>
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/nGWt2mw7_Cs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="col-md-6" id="jingle-video">
                <div class="d-flex justify-content-center" style="margin-bottom: 1rem">
                    <h3 class="tit" style="text-align: center; color: #ffffff">JINGLE</h3>
                </div>
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/xtnbe91vhYg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="col-md-6" id="twibbon-link" style="margin-top: 2rem;">
                <div class="d-flex justify-content-center" style="margin-bottom: 1rem">
                    <h3 class="tit"  style="text-align: center; color: #ffffff">TWIBBON</h3>
                </div>
                <a href="http://twib.id/inisiasi-fti-uajy-2023-ovi3x9gikooa" target="_blank" class="twb">
                    <img style="max-width: 100%; background: white;" src="{{asset('images/twibbon.png')}}" alt="">
                </a>
                <style>
                    .twb{
                        opacity: .5;
                        transition: .2s ease-in-out;
                    }
                    .twb:hover{
                        opacity: 1;
                        transition: .2s ease-in-out
                    }
                    .tit{
                        font-size: 2rem 
                    }
                </style>
            </div>
            <div class="container" style="padding-top: 1rem; padding-bottom: 2rem">
                <div class="row justify-content-center" style="padding-top: 1rem">
                    <div class="tombol justify-content-center" style="background: #83AF97;">
                        <Button type="button" class="btn btn-success tombol" data-toggle="modal" data-target="#modalCaption">Caption Twibbon</Button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
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
        h2{
            margin-top: 30px;
            margin-bottom: 30px
        }
        .jingle-video{
            padding-top: 2rem;
        }
    }
</style>

<div class="modal fade" id="modalCaption" style="z-index: 2000">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content" style="background: #1F443E; color: #ffffff; border-radius:10px">
            <!-- Modal Header -->
            <div class="modal-header justify-content-center">
               <h4 class="modal-title">Caption Twibbon</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body text-center">
                <p id="modalDescription" style="color: white; text-align: left; white-space: pre-line;">
                    [INISIASI FTI UAJY 2023]
                    .
                    Hai warga FTI!!
                    Perkenalkan namaku (nama lengkap) dari program studi (…). 
                    .
                    Aku siap mengikuti rangkaian acara inisiasi FTI UAJY 2023 dengan tema
                    👩🏻𝐌𝐚𝐡𝐢𝐬𝐚 𝐒𝐚𝐡𝐢𝐭𝐲𝐚 𝐏𝐫𝐚𝐣𝐚 𝐌𝐮𝐝𝐚🧑🏻‍
                    yang akan berlangsung pada tanggal 31 Agustus - 02 September 2023.
                    .
                    Bangga menjadi anak muda bersolidaritas tinggi yang mampu bekerja keras bersama membangun bangsa dalam keluarga FTI UAJY🦅
                    .
                    ᴘʀᴇᴘᴀʀᴇ ʏᴏᴜʀꜱᴇʟꜰ🫵🏻
                    .
                    #INISIASIFTIUAJY2023
                    #FTIUAJY
                    #kelompok(nama kelompok)inisiasiFTI2023
                    #PRAJAMUDA23
                </p>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection