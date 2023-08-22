<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
  
  <link rel="icon" href="../images/logo.png">

  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  {{-- datatables --}}
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  {{-- fontawesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{asset('vendor/icofont/icofont.min.css')}}">
  {{-- toastr --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">

  <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

  <!-- Style -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">

  {{-- aniamte.css --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  {{-- leaflet maps --}}
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
  integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
  crossorigin=""/>
  <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
  integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
  crossorigin=""></script>

  <meta name="description" content="Situs web resmi Inisiasi FTI UAJY 2023, Universitas Atma Jaya Yogyakarta. Pusat segala informasi INISIASI FTI UAJY. Mahisya Sahitya Praja Muda. Unggul, Inklusi, Humanis dan Berintegritas.">
  <meta name="keywords" content="inisiasi, uajy, fti uajy">
  <meta name="author" content="INISIASI FTI UAJY 2023">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="index, follow"/>
  <meta name="googlebot" content="index, follow"/>
  <meta name="googlebot-news" content="index, follow"/>
  <meta property="og:locale" content="id_ID"/>
  <meta property="og:title" content="Inisiasi FTI UAJY 2023"/>
  <meta property="og:site_name" content="Inisiasi FTI UAJY 2023"/>
  <meta property="og:description" content="Situs web resmi Inisiasi FTI UAJY 2023, Universitas Atma Jaya Yogyakarta. Pusat segala informasi INISIASI FTI UAJY. Mahisya Sahitya Praja Muda. Unggul, Inklusi, Humanis dan Berintegritas."/>
  <meta property="og:type" content="website"/>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-167603452-6"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-167603452-6');
  </script>
  
  <title>Inisiasi FTI UAJY 2023</title>
</head>
<body>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.sticky.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

    @include('frontend.template.navbar')
    @yield('content')
    @include('frontend.template.footer')
</body>
<script>
   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        }
    })
  function panitiaView(id){
    //  setInterval(() => {
    //       $('.loader').show()
    //     }, 5000);
    $.ajax({
      type: 'GET',
      url: '/panitia/view/modal/'+id,
      dataType: 'json',
      success: function(data){
        var template = "";
        template=""
        // $('.subbb').text(data.cartTotal);
         $.each(data, function(key, value){
            console.log(value)
            $('.subbb').text(value.bidang.nama_bidang)
          template+= 
          `<div class="swiper-slide" style="display: flex; flex-direction: column">
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row" style="height: 20rem" class="img-container">
                      <img style="height: 100%" src="${value.foto}" alt="">
                  </th>
              </tr>
                

              </tbody>
            </table>
                 
              </div>`
          })

          $('.swiper-wrapper').html(template)
      }
    }) 
  }
</script>
<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
</script>
<style>
  @media only screen and (max-width: 500px){
      .img-container{
          height: 25rem !important;
      }
  }
    body{
      padding: 0 !important;
    }
</style>

</html>

