@extends('frontend.main_master')
@section('content')

<section class="mobile-view" style="background: linear-gradient(180deg, #1F443E 0%, #83AF97 100%)" style="z-index: 1">
    <div class="container">
        <div style="padding-top: 10rem;display: flex; flex-direction: column; align-items: center">
            <h2 class="ptin">PANITIA INISIASI</h2>
            {{-- <h2 class="ptin">FTI UAJY 2022</h2> --}}
        </div>
        <style>
            .ptin{
                text-align: center !important;
                margin: auto 0;
                font-family: 'Festival-Budaya';
                font-size: 4rem;
                color: #ffffff;
            }
        </style>
        <div class="row justify-content-center" style="padding-top: 4rem;">
            <div style="width: 100%;">
                @foreach ($bidang as $bid)
                    <div style="margin-bottom: 3rem">
                        <h4 style="text-align: center; font-family: Lemon Milk; font-size: 2rem; color: #ffffff">{{$bid->nama_bidang}}</h4>
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach ($panitia as $panit)
                                    @if ($panit->bidang_id == $bid->id)
                                    <div class="swiper-slide">
                                        <img src="{{ $panit->foto }}" alt="Image">
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<style>
    .swiper {
        width: 100%;
        height: 100%;
        padding-top: 30px;
        padding-bottom: 50px;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    @media only screen and (max-width: 425px){
        .mobile-view {
            padding: 5rem;
            padding-bottom: 0;
        }
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var swiperInstances = [];

        var swiperOptions = {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        };

        var swiperContainers = document.querySelectorAll('.swiper-container');

        swiperContainers.forEach(function (container) {
            var swiper = new Swiper(container, swiperOptions);
            swiperInstances.push(swiper);
        });
    });
</script>

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

@endsection