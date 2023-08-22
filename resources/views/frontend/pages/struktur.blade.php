@extends('frontend.main_master')
@section('content')
<section class="top-section" style="position: relative; z-index: 0">
    <div class="container" style="position: relative; z-index: 1">
        <h1 class="animate__animated m-auto" id="fakultas" style="text-align: center">FAKULTAS</h1>
        <h1 class="animate__animated  m-auto" id="teknologi" style="text-align: center">TEKNOLOGI</h1>
        <h1 class="animate__animated m-auto" id="industri" style="text-align: center">INDUSTRI</h1>
    </div>
    <img id="rumput-depan" src="{{asset('images/rumput-depan.png')}}" alt="">
    <img id="rumput-belakang" src="{{asset('images/rumput-belakang.png')}}" alt="">
    
</section>

<section class="mobile-view" style="background: #321519" style="z-index: 1">
    <div class="container" style="padding-bottom: 4rem">
        <div class="row " style="padding-top: 5rem">
            <div class="col-md-4 adapative-creative" style="display: flex; justify-content: center; align-items: center">
                <div class="img-fluid">
                    <img class="adc-1 animate__animated " style="max-width: 20rem" src="{{asset('images/semut-tok.png')}}" alt="">
                </div>
            </div>
            <div class="col-md-7  title-adptv" >
                <h2 class="title-judul adptv-1 animate__animated ">
                    <span style="color: #B36044">Judul : </span> Be Adaptive and Creative with Resilience</h2>
                <div class="d-flex adptv-2 animate__animated " style="align-items: center">
                    <div class="lurusan"></div>
                    <style>
                        .lurusan{
                            width: 5rem;
                            height: 2px;
                            border-radius: 1px;
                            background:#FCC899;
                            margin-right: 1rem;
                        }
                    </style>
                    <p  style="margin: auto 0; font-family: 'Poppins-Regular'; color: #FCC899"><span style="color: #B36044">Tema : </span>Resilience</p>
                </div>
                <p  class="adptv-3 animate__animated" style="text-align: justify; padding-top: 1rem; margin: auto 0; font-family: 'Poppins-Regular'; color: #FCC899">
                &emsp;&emsp;Judul yang diambil menggambarkan kemampuan untuk bangkit dan pulih dengan berbagai cara untuk menghadapi berbagai rintangan dalam mencapai tujuan.
                <br><br>
&emsp;&emsp;Dari kalimat tersebut, diharapkan Mahasiswa Baru Fakultas Teknologi Industri Atma dapat menjadi pribadi yang adaptif dan kreatif ketika banyak tantangan yang menghadang.
</p>
            </div>
        </div>
    </div>
</section>

<style>
    .title-judul{
        font-family: 'Poppins-Bold';
        color:rgb(255, 213, 169)
    }
</style>
<section class="mobile-view" style="background: #321519" style="z-index: 1">
    <div class="container" style="background: #321519; padding-top: 5rem; z-index: ">
        <div class="row row-1">
            <div class="col-md-6 inner-row-1 animate__animated">
                <h1 class="title-top">KENAPA SEMUT?</h1>
                <p class="title-desc">Semut adalah hewan yang terkenal dengan keuletannya dalam bekerja serta ketahanannya dalam berbagai tempat karena semut dapat hidup di berbagai keadaan.</p>
            </div>
            <div class="col-md-6 inner-row-1-1 animate__animated" >
                <div class="img-fluid" style="display: flex; justify-content: center; align-items: center" >
                    <img style="max-width: 22rem;" id="semut-tok" src="{{asset('images/semut-tok.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="row row-2" style="padding-top: 2rem">
            <div class="col-md-12">
                <p class="title-desc inner-row-2 animate__animated">
                    Semut diharapkan dapat menjadi contoh mahasiswa FTI agar mampu beradaptasi, kreatif, serta kuat dalam menghadapi tantangan untuk mencapai tujuan.
                </p>
            </div>
        </div>
        
        <div class="d-flex flex-row justify-content-center row-3" >
            <div class=" inner-row-3-1 animate__animated" style="display: flex; justify-content: center; align-items: center">
                <div class="img-fluid" style="display: flex; justify-content: center; align-items: center">
                    <img style="max-width: 10rem;" src="{{asset('images/badan-semut.png')}}" alt="">
                </div>
            </div>
            <div class="inner-row-3-2 animate__animated" style="margin-top: auto; margin-bottom : auto; padding-left: 0">
                <h4 class="fils-title">
                    3 Bagian Badan Semut: 
                </h4>
                <p class="fils-desc">
                    Menunjukkan FTI yang terdiri dari 3 prodi, yaitu Teknik Industri, Informatika, dan Sistem Informasi.
                </p>
            </div>
        </div>
        <div class="row-4 d-flex flex-row-reverse justify-content-center" >
            <div class="inner-row-4-1 animate__animated "style="display: flex; justify-content: center; align-items: center">
                <div class="img-fluid" style="display: flex; justify-content: center; align-items: center">
                    <img style="max-width: 10rem;" src="{{asset('images/kaki-semut.png')}}" alt="">
                </div>
            </div>
            <div class="inner-row-4-2 animate__animated " style="margin-top: auto; margin-bottom : auto; padding-left: 0">
                <h4 class="fils-title" style="text-align: end">
                    3 Bagian Badan Semut: 
                </h4>
                <p class="fils-desc">
                    Menunjukkan FTI yang terdiri dari 3 prodi, yaitu Teknik Industri, Informatika, dan Sistem Informasi.
                </p>
            </div>
        </div>
        <div class="row-5 d-flex flex-row justify-content-center" >
            <div class="inner-row-5-1 animate__animated" style="display: flex; justify-content: center; align-items: center">
                <div class="img-fluid" style="display: flex; justify-content: center; align-items: center">
                    <img style="max-width: 10rem;" src="{{asset('images/gir-semut.png')}}" alt="">
                </div>
            </div>
            <div class="inner-row-5-2 animate__animated" style="margin-top: auto; margin-bottom : auto; padding-left: 0">
                <h4 class="fils-title">
                    3 Bagian Badan Semut: 
                </h4>
                <p class="fils-desc">
                    Menunjukkan FTI yang terdiri dari 3 prodi, yaitu Teknik Industri, Informatika, dan Sistem Informasi.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="mobile-view" style="background: #321519" style="z-index: 1" class="timeline-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="title-top timeline-title animate__animated ">TIMELINE</h1>
            </div>
        </div>
         <style>
            .bulet, .lonjong{
                background:rgb(255, 213, 169);
                width: 3rem;
                margin-right: 1rem;
                height: 3rem;
            }
            .bulet{
                border-radius: 50%
            }
            .lonjong{
                width: calc(100% - 10rem);
                height: 10px;
                border-radius: 4px;

            }
        </style>
        <div class="row" style="padding-top: 1rem">
            @foreach ($timelines as $item)
            @if (Carbon\Carbon::now()->toDateString()==$item->tanggal_pelaksanaan)
                <div class="col-md-3 " style="position: relative">
                    <div class="d-flex" style="align-items:center; margin-bottom: 1rem">
                        <div class="bulet animate__animated animate__infinite infinite animate__flash " style="background-color: orange"></div>
                        <div class="lonjong" style="background: orange"></div>
                    </div>
                    <div>
                        <p style="color: orange; margin: 0; padding: 0" class="fils-desc tgl-pelaksanaan">{{date('D, d M Y', strtotime($item->tanggal_pelaksanaan));}}</p>
                        <p style="color: orange;margin:: 0; padding: 0;line-height: 2rem; font-size: 2rem; font-family: 'Poppins-Bold'" class="fils-desc">{{$item->nama_event}}</p>
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
                    <p style="margin:: 0; padding: 0;line-height: 2rem; font-size: 2rem; font-family: 'Poppins-Bold'" class="fils-desc">{{$item->nama_event}}</p>
                </div>
            </div>  
            @endif
            
            @endforeach
        </div>
       
    </div>
</section>

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
        background: linear-gradient(#fc9b3b , rgb(255, 213, 169), #321519); 
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

<script>
    let back = document.getElementById("fakultas")
    let front = document.getElementById("teknologi")
    let brand_text = document.getElementById("industri");

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
</script>


<script>
    const observer1 = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            
            const title = entry.target.querySelector('#fakultas')
            const desctitle = entry.target.querySelector('#teknologi')
            const registerform = entry.target.querySelector('#industri')
        

            if(entry.isIntersecting){
                title.classList.add('animate__backInDown')
                desctitle.classList.add('animate__backInRight')
                registerform.classList.add('animate__backInLeft')
            
                return

                
                
            }
            title.classList.remove('animate__backInDown')
            desctitle.classList.remove('animate__backInRight')
            registerform.classList.remove('animate__backInLeft')
    
        })
    })
    
    observer1.observe(document.querySelector('.top-section'))



     const observer2 = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            
            const title = entry.target.querySelector('.inner-row-1')
            const title1 = entry.target.querySelector('.inner-row-1-1')
        

            if(entry.isIntersecting){
                title.classList.add('animate__fadeInUp')
                title1.classList.add('animate__fadeInUp')
            
                return

                
                
            }
            title.classList.remove('animate__fadeInUp')
            title1.classList.remove('animate__fadeInUp')
    
        })
    })
    
    observer2.observe(document.querySelector('.row-1'))
    

     const observer3 = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            
            const title = entry.target.querySelector('.inner-row-2')
        

            if(entry.isIntersecting){
                title.classList.add('animate__fadeInUp')
            
                return

                
                
            }
            title.classList.remove('animate__fadeInUp')
    
        })
    })
    
    observer3.observe(document.querySelector('.row-2'))

      const observer4 = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            
            const title = entry.target.querySelector('.inner-row-3-1')
            const title1 = entry.target.querySelector('.inner-row-3-2')
        

            if(entry.isIntersecting){
                title.classList.add('animate__fadeInUp')
                title1.classList.add('animate__fadeInUp')
            
                return

                
                
            }
            title.classList.remove('animate__fadeInUp')
            title1.classList.remove('animate__fadeInUp')
    
        })
    })
    
    observer4.observe(document.querySelector('.row-3'))


    const observer5 = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            
            const title = entry.target.querySelector('.inner-row-4-1')
            const title1 = entry.target.querySelector('.inner-row-4-2')
        

            if(entry.isIntersecting){
                title.classList.add('animate__fadeInUp')
                title1.classList.add('animate__fadeInUp')
            
                return

                
                
            }
            title.classList.remove('animate__fadeInUp')
            title1.classList.remove('animate__fadeInUp')
    
        })
    })
    
    observer5.observe(document.querySelector('.row-4'))

    const observer6 = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            
            const title = entry.target.querySelector('.inner-row-5-1')
            const title1 = entry.target.querySelector('.inner-row-5-2')
        

            if(entry.isIntersecting){
                title.classList.add('animate__fadeInUp')
                title1.classList.add('animate__fadeInUp')
            
                return

                
                
            }
            title.classList.remove('animate__fadeInUp')
            title1.classList.remove('animate__fadeInUp')
    
        })
    })
    
    const observer8 = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            
            const title = entry.target.querySelector('.adc-1')
        

            if(entry.isIntersecting){
                title.classList.add('animate__fadeInUp')
            
                return

                
                
            }
            title.classList.remove('animate__fadeInUp')
    
        })
    })
    
    observer8.observe(document.querySelector('.adapative-creative'))

    
    const observer9 = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            
            const title = entry.target.querySelector('.adptv-1')
            const title1 = entry.target.querySelector('.adptv-2')
            const title2 = entry.target.querySelector('.adptv-3')
        

            if(entry.isIntersecting){
                title.classList.add('animate__fadeInUp')
                title1.classList.add('animate__fadeInUp')
                title2.classList.add('animate__fadeInUp')
            
                return

                
                
            }
            title.classList.remove('animate__fadeInUp')
            title1.classList.remove('animate__fadeInUp')
            title2.classList.remove('animate__fadeInUp')
    
        })
    })
    
    observer9.observe(document.querySelector('.title-adptv'))

    
    document.documentElement.style.setProperty('--animate-duration', '1.5s');
</script>
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
</style>
@endsection