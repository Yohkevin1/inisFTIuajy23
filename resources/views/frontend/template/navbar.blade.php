 @php
    $route= Route::current()->getName();
@endphp
<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>
<header class="site-navbar site-navbar-target" role="banner" >
  <div class="container" style="padding-bottom: 0">
    <div class="row align-items-center position-relative">
      <div class="col-lg-4 col-md-8 col-8">
        <a href="{{route('frontend.index')}}" class="site-logo img-fluid" style="display: flex; align-items: center;">
          <div style="margin-right: 0.5rem;">
            <img style="max-width: 3rem;" src="../images/logo.png" alt="">
          </div>
          <div>
            <h3 class="color-red" style="font-family: 'Montserrat'; line-height: 1.5rem; font-size: 1.5rem; margin-bottom: 0;">INISIASI FTI UAJY 2023</h2>
            {{-- <h3 class="color-red" style="font-family: 'Montserrat-Reguler'; margin-bottom: 0;">FTI UAJY 2023</h3> --}}
          </div>
        </a>
      </div>
      <style>
        .color-red{
          color: white;
          font-family: 'Montserrat';
        }
        .color-red:hover{
          font-family: 'Montserrat';
          color:white;
        }
      </style>
      <script>
        $(document).ready(function(){       
            var scroll_pos = 0;
            $(document).scroll(function() { 
                scroll_pos = $(this).scrollTop();
                if(scroll_pos >250) {
                    $('.color-red').css('color', '#white');
                    $('.color-red').css('transition', '.2s');
                    
                    $('.site-navbar').css('background', 'rgba(31, 68, 62, 0.40)');
                    $('.site-navbar').css('padding', '.5rem');
                    $('.site-navbar').css('transition', '.2s');
                    
                  } else {
                    $('.color-red').css('color', 'white');
                    $('.color-red').css('transition', '.2s');
                    
                    $('.site-navbar').css('background', '');
                    $('.site-navbar').css('padding', '');
                    $('.site-navbar').css('transition', '.2s');
                  }
            });
        });
      </script>
      <div class="col-lg-8 col-md-4 col-4 text-right">
        <span class="d-inline-block d-lg-none"><a href="#" class="text-primary site-menu-toggle js-menu-toggle py-5"><span class="icon-menu h3 text-white"></span></a></span>
        <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
          <ul class="site-menu main-menu js-clone-nav ml-auto ">
            <li class="{{$route=='frontend.index' ? 'active' : ''}} color-red"><a href="/" class="nav-link color-red">BERANDA</a></li>
            <li class="{{$route=='frontend.peserta' ? 'active' : ''}} color-red"><a href="/peserta" class="nav-link color-red">PESERTA</a></li>
            <li class="{{$route=='frontend.tugas' ? 'active' : ''}} color-red"><a href="/tugas" class="nav-link color-red">TUGAS</a></li>
            <li class="{{$route=='frontend.filosofi' ? 'active' : ''}} color-red"><a href="{{route('frontend.filosofi')}}" class="nav-link color-red">FILOSOFI</a></li>
            <li class="{{$route=='frontend.media' ? 'active' : ''}} color-red"><a href="{{route('frontend.media')}}" class="nav-link color-red">MEDIA</a></li>
            <li class="{{$route=='frontend.panitia' ? 'active' : ''}} color-red"><a href="{{route('frontend.panitia')}}" class="nav-link color-red">PANITIA</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>
<style>
    .site-navbar-target{
       position: fixed
    }
    .site-mobile-menu{
      background: #83AF97
    }
</style>