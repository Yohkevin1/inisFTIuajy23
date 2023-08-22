@extends('frontend.main_master')
@section('content')

<section class="mobile-view" style="background: linear-gradient(180deg, #1F443E 0%, #83AF97 100%); padding-bottom: 2rem" style="z-index: 1">
    <div class="container" style="padding-top: 10rem">
        <div class="d-flex justify-content-center" style="margin-bottom: 1rem">
            <h2 style="text-align: center; font-size: 4rem; font-family: 'Festival-Budaya'; color: #ffffff">ATRIBUT</h2>
        </div>
        @foreach ($atribut as $item)
        <div class="container" style="display: flex; justify-content: center; margin-bottom: 3%; margin-top: 3%">
            <div class="card" style="padding-bottom: 1.5rem; padding-top: 1.5rem">
                <div class="judul d-flex align-items-center justify-content-between">
                    <div class="judul-tugas">
                        {{$item->judul}}
                    </div>
                    @if ($item->file)
                    <a href="{{route('admin.atribut.download', $item->id)}}" id="back_file" style="background: rgba(164.69, 164.69, 164.69, 0.35); border-radius: 20px; margin-bottom:5px;">
                        <div style="color: white; font-size: 20px; font-family: Poppins; margin-left:1rem; margin-right:1rem">File</div>
                    </a>
                    @endif
                </div>
                <div class="desc_box judul" style="overflow: hidden;">
                    <p class="description">{{$item->deskripsi}}</p>
                    <button class="btn btn-link showMoreButton">Show More</button>
                    <button class="btn btn-link showLessButton" style="display: none;">Show Less</button>
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
            margin-bottom: 10px;
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

<script>
    const descriptionElements = document.querySelectorAll('.description');
    const showMoreButtons = document.querySelectorAll('.showMoreButton');
    const showLessButtons = document.querySelectorAll('.showLessButton');

    const maxCharacters = 100; // Max characters to display initially

    descriptionElements.forEach((descriptionElement, index) => {
        const fullText = descriptionElement.textContent;
        if (fullText.length > maxCharacters) {
            descriptionElement.textContent = fullText.slice(0, maxCharacters) + '...';
            showMoreButtons[index].style.display = 'block';

            showMoreButtons[index].addEventListener('click', function() {
                descriptionElement.textContent = fullText;
                showMoreButtons[index].style.display = 'none';
                showLessButtons[index].style.display = 'block';
            });

            showLessButtons[index].addEventListener('click', function() {
                descriptionElement.textContent = fullText.slice(0, maxCharacters) + '...';
                showLessButtons[index].style.display = 'none';
                showMoreButtons[index].style.display = 'block';
            });
        } else {
            showMoreButtons[index].style.display = 'none';
            showLessButtons[index].style.display = 'none';
        }
    });
</script>


@endsection