@extends('frontend.main_master')
@section('content')
<section class="top-section" style="position: relative; z-index: 0">
    <div class="container" style="position: relative; z-index: 1">
        <h1 class="animate__animated m-auto" id="mahisa" style="text-align: center">MAHISYA SAHITYA</h1>
        <h1 class="animate__animated m-auto" id="praja" style="text-align: center">PRAJA MUDA</h1>
    </div>
    <div id="header"></div>
</section>
<section class="mobile-view" style="background: #83AF97; z-index: 1; padding-top:100px" class="timeline-container">
    <div class="container pattern-bt">
        <div class="row" style="margin-bottom: 2rem">
            <div class="col-md-12 text-center " >
                <h1 style="padding-top: 3rem; font-family: 'Lemon Milk'" class="title-top timeline-title animate__animated">TIMELINE</h1>
            </div>
        </div>
        <style>
            .bulet, .lonjong{
                background:rgb(0, 0, 0);
                width: 3rem;
                margin-right: 1rem;
                height: 3rem;
                border: 2px rgb(0, 174, 255) solid;
            }
            .bulet{
                border-radius: 50%
            }
            .lonjong{
                width: calc(100% - 10rem);
                height: 10px;
                border-radius: 5px;
            }
        </style>
        <div class="row" style="padding-top: 1rem">
            @foreach ($timelines as $item)
            @if (Carbon\Carbon::now()->toDateString()==$item->tanggal_pelaksanaan)
                <div class="col-md-3 " style="position: relative">
                    <div class="d-flex" style="align-items:center; margin-bottom: 1rem">
                        <div class="bulet animate__animated animate__infinite infinite animate__flash " style="background-color: black"></div>
                        <div class="lonjong" style="background: black"></div>
                    </div>
                    <div>
                        <p style="color: black; margin: 0; padding: 0" class="fils-desc tgl-pelaksanaan">{{date('D, d M Y', strtotime($item->tanggal_pelaksanaan));}}</p>
                        <p style="color: black; margin:: 0; padding: 0;line-height: 2rem; font-size: 2rem; font-family: 'Festival Budaya XXII'" class="fils-desc">{{$item->nama_event}}</p>
                    </div>
                </div>
            @else
              <div class="col-md-3 " style="position: relative">
                <div class="d-flex" style="align-items:center; margin-bottom: 1rem">
                    <div class="bulet"></div>
                    <div class="lonjong"></div>
                </div>
                <div>
                    <p style="margin: 0; padding: 0" class="fils-desc tgl-pelaksanaan">{{date('D, d M Y', strtotime($item->tanggal_pelaksanaan));}}</p>
                    <p style="margin:: 0; padding: 0;line-height: 2rem; font-size: 2rem; font-family: 'Festival Budaya XXII'" class="fils-desc">{{$item->nama_event}}</p>
                </div>
            </div>  
            @endif
            @endforeach
        </div>
    </div>
</section>
{{-- <section class="mobile-view" style="background: #83AF97" style="z-index: 1">
    <div class="container pattern-bt" style="padding-bottom: 4rem">
        <div class="row " style="padding-top: 5rem">
            <div class="col-md-4 adapative-creative" style="display: flex; justify-content: center; align-items: center">
                <div class="img-fluid">
                    <img class="adc-1 animate__animated " style="max-width: 20rem" src="../images-2/logo.webp" alt="">
                </div>
            </div>
            <div class="col-md-7  title-adptv" style="padding: 2rem">
                <h2 id="judul-adpt-res" class="title-judul adptv-1 animate__animated ">
                    <span style="color: #B36044">Judul : </span> Be Adaptive and Creative with Resilience</h2>
                <div class="d-flex adptv-2 animate__animated " style="align-items: center">
                    <div class="lurusan"></div>
                    <style>
                        .lurusan{
                            width: 5rem;
                            height: 2px;
                            border-radius: 1px;
                            background:#070e72;
                            margin-right: 1rem;
                        }
                    </style>
                    <p  style="margin: auto 0; font-family: 'Poppins-Regular'; color: #FCC899"><span style="color: #B36044">Tema : </span>Resilience</p>
                </div>
                <p  class="adptv-3 animate__animated" style="text-align: justify; padding-top: 1rem; margin: auto 0; font-family: 'Poppins-Regular'; color: #FCC899">
                &emsp;&emsp;Judul yang diambil menggambarkan kemampuan untuk bangkit dan pulih dengan berbagai cara untuk menghadapi berbagai rintangan dalam mencapai tujuan.
                <br><br>&emsp;&emsp;Dari kalimat tersebut, diharapkan Mahasiswa Baru Fakultas Teknologi Industri Atma dapat menjadi pribadi yang adaptif dan kreatif ketika banyak tantangan yang menghadang.</p>
            </div>
        </div>
    </div>
</section> --}}
<style>
    .title-judul{
        font-family: 'Poppins-Bold';
        color:rgb(255, 213, 169)
    }
</style>
<section class="mobile-view" id="filosofi-section" style="background: #83AF97" style="z-index: 1">
    <div class="container pattern-bt" style="background: #83AF97; padding-top: 5rem;" id="p-bt">
        <div class="row">
            <div class="col-md-12">
                <!-- Swiper -->
                    <div class="swiper mySwiper">
                      <div class="swiper-wrapper">
                        <a href="/media#music-video" class="swiper-slide">
                          <img src="{{asset('images/Thumbnail_Teaser.png')}}" />
                        </a>
                        <a href="/media#jingle-video" class="swiper-slide">
                          <img src="{{asset('images/thumbnail-jingle.png')}}" />
                        </a>
                       
                        <a href="/media#twibbon-link" class="swiper-slide" id="twibbon-slider">
                          <img src="{{asset('images/twibbon.png')}}"/>
                        </a>
                      
                      </div>
                      <div class="swiper-pagination"></div>
                    </div>
            </div>
            <style>
             
              .swiper {
                width: 100%;
                padding-top: 50px;
                padding-bottom: 50px;
              }
        
              .swiper-slide {
                background-position: center;
                background-size: cover;
                width: 650px;
                height: 370px;
              }
        
              .swiper-slide img {
                display: block;
                width: 100%;
              }

               #twibbon-slider{
                   width: 300px;
                   height: 300px;
               }
               @media only screen and (max-width: 425px){
                   .swiper-slide{
                       width: 300px;
                       height: 300px;
                   }
                   .swiper-slide img {
                        display: block;
                        width: 100%;
                        height: 100%;
                      }
               }
    </style>
     <script>
      var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows: true,
        },
        pagination: {
          el: ".swiper-pagination",
        },
      });
    </script>
        </div>
        <div class="row">
            <div class="col-md-12" style="display: flex; justify-content: center">
                <h2  class="title-top" style="font-family: 'Lemon Milk'; padding: 1rem; font-size: 6rem; text-align: center !important">MATERI INISIASI</h2>
            </div>
        </div>
    </div>
</section>
<section class="mobile-view" id="filosofi-section" style="background: #83AF97" style="z-index: 1">
    <div class="container" style="background: #83AF97; padding-top: 5rem;" id="p-bt">
        <div class="row">
            <div class="col-md-12" style="display: flex; justify-content: center">
                <h2  class="title-top" style="font-family: 'Lemon Milk'; padding: 1rem; font-size: 6rem; text-align: center !important">APA YANG HARUS KAMU LAKUKAN?</h2>
            </div>
        </div>
    </div>
</section>
<section class="mobile-view" id="filosofi-section" style="background: #83AF97" style="z-index: 1">
    <div class="container" style="background: #83AF97; padding-top: 5rem; z-index: ">
        <div class="row">
            <a href="/panitia" class="mengenal row d-flex" style="justify-content: space-between">
                <div class="col-md-12" style="display: flex; justify-content: center">
                    {{-- <div class="col-lg-5" > --}}
                        <img style="max-width: 100%" src="{{asset('images/panitia-semua.jpg')}}" alt="">
                    {{-- </div> --}}
                </div>
                <div class="d-flex col-md-12 tcct justify-content-center align-items-center" style="align-items: center">
                        <h2 style="font-family: 'Lemon Milk'; padding: 1rem; font-size: 6rem" class="title-top">MENGENAL <span class="pntia" style="font-size: 6rem">PANITIA<span></h2>
                    <style>
                        .mengenal{
                            transition: .2s ease-in-out;
                        }
                        .mengenal:hover{
                            transform: scale(1.1);
                            transition: .2s ease-in-out;
                        }
                    </style>
                </div>
            </a>
        </div>
    </div>
</section>
<section class="mobile-view" id="filosofi-section" style="background: #83AF97" style="z-index: 1">
    <div class="container" style="background: #83AF97; padding-top: 5rem; z-index: ">
        <div class="row">
            <div class="col-md-12">
                <a href="/atribut" class="mengenal row d-flex" style="justify-content: space-between">
                    <div class="col-lg-5" style="display: flex; justify-content: center">
                        <img style="max-width: 100%" src="{{asset('images/atribut.png')}}" alt="">
                    </div>
                    <div class="d-flex col-lg-7 tcct" style="align-items: center">
                            <h2 style="font-family: 'Lemon Milk'; padding: 1rem; font-size: 6rem" class="title-top">Atribut <br><span class="pntia" style="font-size: 6rem">Pakaian<span></h2>
                        <style>
                            .mengenal{
                                
                                transition: .2s ease-in-out;
                            }
                            .mengenal:hover{
                                transform: scale(1.1);
                                transition: .2s ease-in-out;
                            }
                        </style>
                    </div>
                   
                </a>
            </div>
        </div>
    </div>
</section>
<section class="mobile-view" id="filosofi-section" style="background: #83AF97" style="z-index: 1">
    <div class="container" style="background: #83AF97; padding-top: 5rem; z-index: ">
        <div class="row">
            <div class="col-md-12">
                <div class="row d-flex" style="justify-content: space-between">
                    <div class="d-flex col-lg-7 tcct" style="align-items: center">
                            <h2 style="font-family: 'Lemon Milk'; padding: 1rem; font-size: 7rem" class="title-top">MEMAHAMI <br><span class="pntia" style="font-size: 7rem">BUKU SUCI<span></h2>
                    </div>
                   <div class="col-lg-5" style="display: flex; justify-content: center">
                        <img style="max-width: 100%" src="{{asset('images/peraturan.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    @media only screen and (max-width: 1110px){
        .title-top{
            font-size: 6rem !important;
        }
        .pntia{
            font-size: 6rem !important
        }
    }
    @media only screen and (max-width: 990px){
        .title-top{
            text-align: center !important;
            margin: auto 0
        }
        .pntia{
            text-align: center !important;
            margin: auto 
        }
        .tcct{
            display: flex;
            justify-content: center;
            text-align: center
        }
    }
       @media only screen and (max-width: 650px){
        .title-top{
            font-size: 3rem !important;
        }
        .pntia{
            font-size: 3rem !important
        }
    }
</style>

<style>
    .fils-title{
        color:#FFD2A9;
        font-family: 'Poppins-Bold'
    }
    #header{
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 0;
        height: 100%;
        width: 100%;
        background-image: url('{{asset('images/header.png')}}');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
    .title-desc, 
    .fils-desc{
        text-align: justify;
        color: #000000;

    }
    .fils-desc{
        font-family: 'Poppins-Regular'
    }
    .title-top{
        font-size: 5rem;
        color: white
    }
    .container{
        z-index: 1;
        padding-bottom: 8rem
    }
    .top-section{
        background: #83AF97; 
        height: 100vh;
        display: flex; 
        align-items: center;
    }
    h1{
        font-family: 'festival-budaya';
    }
    /* .top-section #fakultas{
        font-size: 9rem;
        color: rgb(31, 31, 88);
        line-height: 2rem;
    } */
    
    .top-section #mahisa{
        padding-top: 10%; 
        font-size: 5rem;
        z-index: 1;
        z-index: -5;
        color: white;
        line-height: 8rem;
    }
    .top-section #praja{
        font-size: 4.5rem;
        color: white;
        line-height: 8rem;
    }

    @media only screen and (max-width: 1236px){
        /* .top-section #fakultas{
            font-size: 5rem
        } */
        .top-section #mahisa{
            font-size: 7rem;
            line-height: 11rem;
        }
        .top-section #praja
        {
            font-size: 7rem;
            line-height:9rem;
        }
    }
    @media only screen and (max-width: 770px){
        /* .top-section #fakultas{
            font-size: 4rem
        } */
        .top-section #mahisa{
            font-size: 4.5rem;
        }
        .top-section #praja{
            line-height: 6rem;
            font-size: 4rem;
        }
    }
    @media only screen and (max-width: 480px){
        #header{
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 0;
        height: 100%;
        width: 100%;
        background-image: url('{{asset('images/header.png')}}');
        /* background-size: contain; */
        background-repeat: no-repeat;
        /* background-position: center center */
        }
        /* .top-section #fakultas{
            font-size: 3rem
        } */
        .top-section #mahisa{
            padding-top: 30%; 
            font-size: 4rem;
            line-height: 6.5rem;
        }
        .top-section #praja
        {
            font-size: 3.5rem;
            line-height: 5rem;
        }
    }

    @media only screen and (max-width: 387px){
        /* .top-section #fakultas{
            font-size: 2rem
        } */
        .top-section #mahisa{
            /* padding-top: 20%; */
            font-size: 3rem;
            line-height: 5rem;
        }
        .top-section #praja
        {
            font-size: 3rem;
            line-height: 4.2rem;
        }
    }
</style>

{{-- <script>
    // let back = document.getElementById("fakultas")
    let front = document.getElementById("mahisa")
    let brand_text = document.getElementById("praja");

    window.addEventListener("scroll", () => {
        // let navigate = document.getElementById('navigate');
        // if(window.scrollY > 80){
        //     navigate.style.background = 'rgba(1,1,1,0.9)';
        // }
        // else{
        //     navigate.style.background = '';
        // }
        let scrollValue = window.scrollY;
        if(scrollValue < screen.availHeight) {
            if(scrollValue<400){
                back.style.paddingTop = scrollValue + "px";
                back.style.opacity = 1 - scrollValue/1000;
                brand_text.style.opacity = 1 - scrollValue/1000;
                front.style.opacity = 1 - scrollValue /1000;
            }
            //plx_float.forEach((el) => {
            //});
        } 
        // console.log("from index.js", scrollValue);
    });
</script> --}}


<script>
    const observer1 = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            const desctitle = entry.target.querySelector('#mahisa')
            const registerform = entry.target.querySelector('#praja')
            if (entry.isIntersecting) {
                animateCharacters(desctitle);
                animateCharacters(registerform);
                return;
            } else {
                clearAnimateClasses(desctitle);
                clearAnimateClasses(registerform);
            }
        })
    });

    function animateCharacters(element) {
        const text = element.textContent;
        element.textContent = '';

        [...text].forEach((char, index) => {
            const charSpan = document.createElement('span');
            charSpan.textContent = char;
            charSpan.style.opacity = '0'; // Set opacity to 0 initially

            charSpan.classList.add('animate__animated', 'animate__backInRight'); // Use the appropriate animation class here

            charSpan.style.animationDelay = `${index * 150}ms`;
            element.appendChild(charSpan);

            setTimeout(() => {
                charSpan.style.opacity = 1; // Set opacity to 1 after the delay
            }, index * 150);
        });
    }

    function clearAnimateClasses(element) {
        element.innerHTML = element.textContent;
    }

    // Add the elements you want to observe
    const elementsToObserve = document.querySelectorAll('.top-section');
    elementsToObserve.forEach(element => {
        observer1.observe(element);
    });

</script>

<style>
    @media only screen and (max-width: 425px){
        .mobile-view{
            padding: 2rem;
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
    #p-bt{
        padding-bottom: 2rem !important;
    }
    
</style>
<style>
/*.mobile-view{*/
/*    background-image: url('http://inisiasifti.uajy.ac.id/images/layer-batu.png') !important;*/
/*    background-position: center !important;*/
/*    background-size: contain !important;*/
/*    background-repeat: no-repeat !important;*/
/*}*/
</style>
  
@endsection