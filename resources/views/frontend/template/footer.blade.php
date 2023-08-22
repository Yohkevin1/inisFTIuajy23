


{{-- new footer --}}




@php
    $sosmed = App\Models\SosialMedia::orderBy('id', 'ASC')->get();
@endphp

<div style="position: relative;" class="batu-cover">
    <img src="{{asset('images/footer.png')}}" class="batubatu" alt="">
</div>
<footer class="footer" style="position: relative">
    <style>
        .batu-cover::after{
            content: '';
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, #83AF97 0%, #83AF97 60%, #61CAED 100%);
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
        }
    </style>
    <div class="container" style="padding-bottom: 2rem; padding-top: 0;">
        <section style="padding-top: 3rem">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="foot-title animate__animated " style="text-align: center">INISIASI FTI UAJY 2023</h2>
                    <h3 class="foot-title-2 animate__animated " style="padding-top: 1rem;text-align: center; color: #black">FAKULTAS TEKNOLOGI INDUSTRI</h3>
                    <h3 class="foot-title-3 animate__animated " style="text-align: center; color: #black; font-family: 'Poppins-Regular'">UNIVERSITAS ATMA JAYA YOGYAKARTA</h3>
                </div>
                   <div class="col-md-4 info-boxx" style="padding-top: 0">
                    <div class="d-flex" style="flex-direction: column; align-items: center">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="sosmed-title animate__animated" style="font-size: 1.5rem">SOSIAL MEDIA</h3>
                            </div>
                            <div class="col-md-12" style="padding-top: 1rem">
                                <div class="d-flex">
                                    <a id="" href="https://www.uajy.ac.id/" target="_blank" rel="dofollow" class="outer ig" style="margin-right: .5rem">
                                        <div class="inner" style="colo">
                                            <img style="max-width: 1.5rem" src="../upload/sosmed/UAJY.png" alt="">
                                        </div>
                                    </a>
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach ($sosmed as $item)
                                        <a id="sosmed_{{$i}}" href="{{$item->link}}" target="_blank" class="outer ig justify-content-center" style="margin-right: .5rem">
                                            <div class="inner" style="colo">
                                                <img style="max-width: 1.5rem;" src="{{asset($item->logo)}}" alt="">
                                            </div>
                                        </a>
                                        @php
                                            $i++
                                        @endphp
                                    @endforeach
                                </div>
                                <style>
                                    .outer{
                                        background: #25B2EC;
                                        padding: .2rem;
                                        border-radius: 50%;
                                    }
                                    .inner{
                                        background-image: url('.././images/bg-sosmed.png');
                                        background-repeat: no-repeat;
                                        background-position: center;
                                        background-size: cover;
                                        padding: .5rem;
                                        border-radius: 50%
                                    }
                                    .inner img{
                                        object-fit: fill;
                                    }
                                    
                                    /* .ig:hover,
                                    .yt:hover,
                                    .line:hover,
                                    .wa:hover{
                                        transform: translateY(-10%)
                                    } */
                                </style>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" id="conMap">
                     <div id="map"></div>
                     <div>
                        <p class="animate__animated alamatkuuu" style="padding-top: 1rem;font-size: .8rem ;color: black ">Jl. Babarsari No.43, Janti, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281</p>
                     </div>
                     <style>
                        #map { height: 180px; }
                     </style>
                     <script>
                        var map = L.map('map').setView([-7.779439000005046, 110.4161245878493], 17);
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                            attribution: '© OpenStreetMap'
                        }).addTo(map);
                        var marker = L.marker([-7.779439000005046, 110.4161245878493]).addTo(map);
                     </script>
                </div>
                </div>
            </div>
        </section>
    </div>
    <div style="display: flex; justify-content: center; margin: auto 0;padding: 1rem; height: 2px; text-align: center">
        <div style="width: 70%; margin: auto 0;  height: 1px; background: #2b323a;"></div>
    </div>
    <div style="text-align: center; padding: 1rem; font-family: 'Poppins-Regular'; color:#2b323a ">
        ©2023 by Muldok & IT Inisiasi FTI UAJY 2023. All rights reserved.
    </div>
</footer>
<style>
    .batubatu{
        width: 100%;
    }
    .table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e600;
    }
    .table th, .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e600;
    }
    .table th{
        width: 5rem;
    }
</style>
<style>
    footer{
        background: #66CCEE 
    }
    .foot-title,
    h3{
        font-family: 'Poppins-Bold';
        color: black;
        font-size: 2rem;
    }
    h3{
        font-size:1rem;
        text-align: start !important
    }
    h2{
        text-align: start !important
    }
    .informasi,p{
        color: #FFD2A9;
        font-family: 'Poppins-Regular';
    }
    .info-boxx{
        padding-top: 1rem;
    }
   .col-md-1{
    margin: auto 0;
    margin: 0;
    padding: 0;
   }
    i{
        font-size: 2rem;
        display: flex;
        justify-content: center;
        align-items: center;
       margin: 0;
       padding: 0;
    }
    a{
        color: #FFD2A9;
        font-family: 'Poppins-Regular';
        transition: .2s ease-in-out;
    }
    a:hover{
        color: #fab06b;
        transition: .2s ease-in-out;
    }
    @media only screen and (max-width: 450px){
        .foot-title{
            font-size: 3rem
        }
        h3{
            font-size: 1rem
        }
        #conMap{
            margin-top: 25px;
        }
    }
</style>


<script>
    $("body").addClass("blue")
    const observer111 = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            
         
           
            
            if(entry.isIntersecting){
                $(".blue,.red").toggleClass("blue").toggleClass("red")
                return
                
                
                
            }
            
            $(".blue,.red").toggleClass("blue").toggleClass("red")
        })
    })
    
    observer111.observe(document.querySelector('.footer'))

  </script>
   <script>
                    const footerobserver = new IntersectionObserver(entries => {
                            entries.forEach(entry => {
                                
                                const title = entry.target.querySelector('.foot-title')
                                const title1 = entry.target.querySelector('.foot-title-2')
                                const title2 = entry.target.querySelector('.foot-title-3')
                                const title3 = entry.target.querySelector('.sosmed-title')
                                const title4 = entry.target.querySelector('.alamatkuuu')

                            

                                if(entry.isIntersecting){
                                    title.classList.add('animate__fadeInUp')
                                    title1.classList.add('animate__fadeInUp')
                                    title2.classList.add('animate__fadeInUp')
                                    title3.classList.add('animate__fadeInUp')
                                    title4.classList.add('animate__fadeInUp')
                                
                                    return

                                    
                                    
                                }
                                title.classList.remove('animate__fadeInUp')
                                title1.classList.remove('animate__fadeInUp')
                                title2.classList.remove('animate__fadeInUp')
                                title3.classList.remove('animate__fadeInUp')
                                title4.classList.remove('animate__fadeInUp')
                        
                            })
                        })
                        
                        footerobserver.observe(document.querySelector('.footer'))

                        
                        document.documentElement.style.setProperty('--animate-duration', '1.5s');
                </script>