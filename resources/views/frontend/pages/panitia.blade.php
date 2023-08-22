@extends('frontend.main_master')
@section('content')

<section class="mobile-view" style="background: linear-gradient(180deg, #1F443E 0%, #83AF97 100%)" style="z-index: 1">
    <div class="container">
        <div style="padding-top: 10rem;display: flex; flex-direction: column; align-items: center">
            <h2 class="ptin" style="font-family: 'Festival-Budaya'">PANITIA INISIASI</h2>
            {{-- <h2 class="ptin">FTI UAJY 2022</h2> --}}
        </div>
        <style>
            .ptin{
                text-align: center !important;
                margin: auto 0;
                font-family: 'Poppins-Bold';
                font-size: 4rem;
                color: #ffffff;
            }
        </style>
        <div class="row" style="padding-top: 4rem">
            @foreach ($bidang as $bid)
                <a data-toggle="modal" data-target="#exampleModal" id="{{$bid->id}}" onclick="panitiaView(this.id)" href="javascript:void(0)" class="col-md-4 align-bottom bidang-box" style="padding: 1rem; display: flex; flex-direction: column; justify-content:space-between">
                    <div style="display: flex; justify-content: center; align-items: center">
                        <img style="max-height: 7rem; margin: auto" src="{{asset($bid->logo_bidang)}}" alt="">
                    </div>
                    <h2 class="nama-bidang " style="text-align: center !important; margin: auto 0">
                        {{$bid->nama_bidang}}
                    </h2>
                </a>
            @endforeach
        </div>
    </div>
</section>

<style>
    .nama-bidang{
        font-size: 1.5rem;
        padding-top: 1rem;
        font-family: 'Poppins-Bold';
        color: #ffffff
    }
    .bidang-box{
        transition: .2s ease-in-out;
        border-radius: 5px

    }
    .bidang-box:hover{
        transition: .2s ease-in-out;
        background: #1F443E;
    }
</style>

<style>
    .fils-title{
        color:#ffffff;
        font-family: 'Poppins-Bold'
    }
    #rumput-depan{
        position: absolute;
        bottom: 0;
        left: 0; 
        right: 0;
        z-index: 2;
        height: 110%;
        width: 100%;
    }
    .title-desc, 
    .fils-desc{
        text-align: justify;
        color: #FCC899;

    }
    .fils-desc{
        font-family: 'Poppins-Regular'
    }
    .title-top{
        font-size: 5rem;
        color: #FFD2A9
    }
    #rumput-belakang{
        position: absolute;
        bottom: 0;
        left: 0;
        height: auto;
        right: 0;
        height: 110%;
        width: 100%;
        z-index: 0;
    }
    .container{
        z-index: 1;
        padding-bottom: 8rem
    }
    .top-section{
        background: linear-gradient(#fc9b3b , rgb(255, 213, 169), #430f14); 
        height: 100vh;
        display: flex; 
        align-items: center;
    }
    h1{
        font-family: 'Poppins-Bold';
    }
    .top-section #fakultas{
        font-size: 9rem;
        color: rgb(31, 31, 88);
        line-height: 2rem;
    }
    
    .top-section #teknologi{
        font-size: 11rem;
        z-index: 1;
        z-index: -5;
        color: #FFC300;
    }
    .top-section #industri{
        font-size: 11rem;
        color: #FFC300;
        line-height: 4rem;
    }
    @media only screen and (max-width: 1236px){
        .top-section #fakultas{
            font-size: 5rem
        }
        .top-section #teknologi,
        .top-section #industri
        {
            font-size: 7rem
        }
    }
    @media only screen and (max-width: 770px){
        .top-section #fakultas{
            font-size: 4rem
        }
        .top-section #teknologi,
        .top-section #industri
        {
            font-size: 5rem
        }
    }
    @media only screen and (max-width: 480px){
        .top-section #fakultas{
            font-size: 3rem
        }
        .top-section #teknologi,
        .top-section #industri
        {
            font-size: 4rem
        }
    }
    @media only screen and (max-width: 387px){
        .top-section #fakultas{
            font-size: 2rem
        }
        .top-section #teknologi,
        .top-section #industri
        {
            font-size: 3rem
        }
    }
</style>

<style>
    @media only screen and (max-width: 425px){
        .mobile-view{
            padding: 5rem;
            padding-bottom: 0
        }
        #semut-tok{
            max-width: 10rem !important;
        }
         .title-top{
            font-size: 3rem
        }
        
        
    }
    @media only screen and (max-width: 320px){
        .title-top{
            font-size: 2rem
        }
    }
    @media only screen and (max-width: 480px){
        .adc-1{
            max-width: 100% !important;
            margin-bottom: 3rem
        }
    }
    @media only screen and (max-width: 420px){
        .adc-1{
            max-width: 100% !important;
            margin-bottom: 3rem
        }
    }
    .color-red{
        color:white !important
    }
</style>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 10000; background-color: transparent">
  <div class="modal-dialog modal-xl" id="modal-div">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <h2 class="subbb text-center" style="margin-top: 4rem;font-size: 5rem">KESEHATAN</h2>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper" ></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
        <style>
            #modal-div {
                margin-top: 50px
            }
            .subbb{
                font-family: 'Poppins-Bold';
                color: #ffffff
            }
            @media only screen and (max-width: 768px){
                .subbb{
                    font-size: 3rem !important;
                }
            }
            .nama-ku{
                font-size: 1.5rem;
                color: #681B22
            }
            .swiper {
            width: 100%;
            height: 100%;
            /* padding-top: 50px;
            padding-bottom: 50px; */
            }
            .swiper-slide {
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                font-size: 18px;
            }

            .swiper-slide img {
                /* display: block; */
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        </style>

        <script>
          var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },

                950: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 50,
                },
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
         });
        </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<style>
    .modal-content{
        /* width: 100%; */
        background-image: url('.././images-2/dropdown_bg.png');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        /* border: 0px solid transparent;
        border-radius: 0; */
    }
    .modal{
        /* background: linear-gradient(180deg, #1F443E 0%, #83AF97 100%); */
    }
    .modal-header{
        border-bottom: 1px solid transparent
    }
    .modal-footer{
        border-top: 1px solid transparent
    }
</style>
@endsection