@extends('frontend.main_master')
@section('content')


<section class="mobile-view" style="background: linear-gradient(180deg, #1F443E 0%, #83AF97 100%)" style="z-index: 1">
    <div class="container" style="padding-bottom: 5rem">
        <div class="row" style="padding-top: 10rem">
            <div class="col-md-6">
                <h1 class="knp-semut">KENAPA</h1>
                <h1 class="knp-semut">JATAYU?</h1>
                <p class="c-light" style="padding-top: 2rem; text-align: justify">
                    Jatayu dalam kisah Ramayana memiliki karakter yang pemberani, mengajarkan kebaikan, pembela kebenaran, dan tidak mudah menyerah.
                </p>
            </div>
            <div class="col-md-6" style="display: flex; justify-content: center; align-items: center">
                <img src="{{asset('images/logo.webp')}}" alt="" style="max-width: 70%" class="fluid">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="c-light" style="padding-top: 2rem; text-align: justify">
                    Melalui Jatayu, mahasiswa FTI UAJY diharapkan dapat tumbuh menjadi pribadi yang pemberani dengan dipenuhi kebaikan untuk membela kebenaran dan pantang menyerah untuk masa depan.
                </p>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-center row-3" style="padding-top: 40px" >
            <div class=" inner-row-3-1 animate__animated" style="display: flex; justify-content: center; align-items: center;">
                <div class="img-fluid" style="display: flex; justify-content: center; align-items: center">
                    <img style="max-width: 10rem;" src="{{asset('images/logo-ekor.png')}}" alt="">
                </div>
            </div>
            <div class="inner-row-3-2 animate__animated" style="margin-top: auto; margin-bottom : auto; padding-left: 0">
                <h4 class="fils-title">
                    3 Helai Ekor: 
                </h4>
                <p class="fils-desc">
                    Menunjukkan FTI yang terdiri dari 3 prodi, yaitu Teknik Industri, Informatika, dan Sistem Informasi.
                </p>
            </div>
        </div>
        <div class="row-4 d-flex flex-row-reverse justify-content-center" style="padding-top: 20px" >
            <div class="inner-row-4-1 animate__animated "style="display: flex; justify-content: center; align-items: center">
                <div class="img-fluid" style="display: flex; justify-content: center; align-items: center">
                    <img style="max-width: 10rem;" src="{{asset('images/logo-badan.png')}}" alt="">
                </div>
            </div>
            <div class="inner-row-4-2 animate__animated " style="margin-right:10px; margin-top: auto; margin-bottom : auto; padding-left: 0">
                <h4 class="fils-title" style="text-align: end">
                    Tubuh Jatayu yang Bervariasi
                </h4>
                <p class="fils-desc">
                    Melambangkan perbedaan yang dapat selaras apabila dipersatukan.
                </p>
            </div>
        </div>
        <div class="row-5 d-flex flex-row justify-content-center" style="padding-top: 20px">
            <div class="inner-row-5-1 animate__animated" style="display: flex; justify-content: center; align-items: center">
                <div class="img-fluid" style="display: flex; justify-content: center; align-items: center">
                    <img style="max-width: 10rem;" src="{{asset('images/logo-gear.png')}}" alt="">
                </div>
            </div>
            <div class="inner-row-5-2 animate__animated" style="margin-top: auto; margin-bottom : auto; padding-left: 0">
                <h4 class="fils-title">
                    Gerigi dengan 4 Mata: 
                </h4>
                <p class="fils-desc">
                    Melambangkan Empat Pilar Keatmajayaan yang menjadi pedoman.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="mobile-view" style="background: #83AF97; padding-top: 40px" style="z-index: 1">
    <div class="container" >
        <div class="row" >
            <div class="col-md-12">
                <h1 class="knp-semut" style="text-align: center; margin-bottom: 2rem">FILOSOFI WARNA</h1>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-center row-3" style="padding-top: 40px" >
            <div class=" inner-row-3-1 animate__animated" style="display: flex; justify-content: center; align-items: center;">
                <div class="img-fluid" style="display: flex; justify-content: center; align-items: center">
                    <img style="max-width: 10rem;" src="{{asset('images/filosofi-cokelat.png')}}" alt="">
                </div>
            </div>
            <div class="inner-row-3-2 animate__animated" style="margin-top: auto; margin-bottom : auto; padding-left: 0">
                <h4 class="fils-title" style="color: #3A170C">
                    COKELAT 
                </h4>
                <p class="fils-desc">
                    Melambangkan keandalan, kepercayaan, dan integritas.
                </p>
            </div>
        </div>
        <div class="row-4 d-flex flex-row-reverse justify-content-center" style="padding-top: 30px" >
            <div class="inner-row-4-1 animate__animated "style="display: flex; justify-content: center; align-items: center">
                <div class="img-fluid" style="display: flex; justify-content: center; align-items: center">
                    <img style="max-width: 10rem;" src="{{asset('images/filosofi-merah.png')}}" alt="">
                </div>
            </div>
            <div class="inner-row-4-2 animate__animated " style="margin-right:10px; margin-top: auto; margin-bottom : auto; padding-left: 0">
                <h4 class="fils-title" style="text-align: end; color:#B53A14">
                    MERAH
                </h4>
                <p class="fils-desc">
                    Melambangkan keberanian dan sikap pantang menyerah
                </p>
            </div>
        </div>
        <div class="row-5 d-flex flex-row justify-content-center" style="padding-top: 30px">
            <div class="inner-row-5-1 animate__animated" style="display: flex; justify-content: center; align-items: center">
                <div class="img-fluid" style="display: flex; justify-content: center; align-items: center">
                    <img style="max-width: 10rem;" src="{{asset('images/filosofi-jingga.png')}}" alt="">
                </div>
            </div>
            <div class="inner-row-5-2 animate__animated" style="margin-top: auto; margin-bottom : auto; padding-left: 0">
                <h4 class="fils-title" style="color: #F2983C">
                    JINGGA 
                </h4>
                <p class="fils-desc">
                    Melambangkan kreativitas dan semangat yang tinggi
                </p>
            </div>
        </div>
    </div>
</section>

<style>
    .box-warna{
        margin: .5rem;
        background: white;
        width: max-content;
        padding: 3rem 4rem;
        border-radius: 10px;
        /* transform: rotate(90deg);
        transform-origin: bottom center; */
    }
 .knp-semut{
    font-family: 'Poppins-Bold';
    font-size: 6rem;
    line-height: 5rem;
    color: white
}
.judul-warna{
     font-family: 'Poppins-Bold';
     font-size: 4rem;
     color: #51151A

 }
 @media only screen and (max-width: 570px){
    .judul-warna{
        font-size: 2rem
    }
    .knp-semut{
        font-size: 3rem;
        text-align: center
    }
     .box-warna{
        padding: 2rem 3rem;
        /* transform: rotate(90deg);
        transform-origin: bottom center; */
    }
 }
 @media only screen and (max-width: 426px){
     .box-warna{

        padding: 1rem 2rem;
        /* transform: rotate(90deg);
        transform-origin: bottom center; */
    }
    .judul-warna{
        font-size: 1rem
    }
 }
 @media only screen and (max-width: 750px){
    #map{
        margin-top: 2rem
    }
 }
 .c-light{
    color: white
 }
</style>



<style>
    .fils-title{
        color:#FFD2A9;
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
        color: white;

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
        background: linear-gradient(#fc9b3b , rgb(255, 213, 169), #51151A); 
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
@endsection