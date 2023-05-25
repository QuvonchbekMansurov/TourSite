<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
    <!-- ===font-awesome============================== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- ===font-awesome============================== -->

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.15/dist/css/uikit.min.css" />

    <!-- ===fonts.google.com/specimen/Roboto========= -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- ===fonts.google.com/specimen/Roboto========= -->

    <!-- ===bootstrap@5.3.0========= -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- ===bootstrap@5.3.0========= -->
    <link rel="stylesheet" href="./assets/CSS/style.css">
</head>

<body>
    <nav>
        <div class="side1">
            <div>
                <h4><i class="fa-regular fa-clock"></i>
                    April 6, 2023</h4>
            </div>
            <div>
                <h4><i class="fa-solid fa-globe"></i>
                    {{-- <select name="lang" id="d"> --}}
                    <a href="/lang/en"> eng</a>
                    <a href="/lang/uz"> uz</a>
                    <a href="/lang/ru"> ru</a>
                    {{-- </select> --}}
                </h4>
            </div>
        </div>
        <div class="side2">
            <p class="cen">
            <div>
                <i class="fa-solid fa-phone" style="color: white;"></i>
            </div>
            <div>
                <a href="tel:998955554499">+99895 555 4499</a>
                <a href="tel:998981554499">+99898 155 4499</a>
            </div>
            </p>
            <div>
                <i class="fa-solid fa-location-dot"></i>
                <a href="#">@lang('statik.manzil')</a>
            </div>
        </div>
    </nav>
    <a href="{{ url('/') }}"
        class="btn btn-danger">Orqaga</a>

    <div class="filtr">
        <div class="filtr_nav">
            <h1>@lang('statik.filter')</h1>
        </div>
        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-4@m uk-grid">
                @foreach ($tours as $tour)
                    <li>
                        <div class="uk-panel manzil_card">
                            <div class="filtr_card">
                                <div class="filtr_card_img">
                                    @if ($tour->sale)
                                        <p>{{ $tour->sale }} so'm/oy</p>
                                    @endif
                                    <img src="./assets/IMG/3661571-photo-big.jpg" alt="">
                                </div>
                                <div class="filtr_card_text">
                                    <h2><a
                                            href="{{ url('tour/card' . $tour->id . '') }}">{{ $tour['name_' . \App::getLocale()] }}</a>
                                    </h2>
                                    <h1 class="card_narx">{{ $tour->price }} so'm</h1>
                                    <p>{{ $tour['teaser_' . \App::getLocale()] }}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

            <a class="uk-position-center-left uk-position-small uk-hidden-hover carusel_btn" href="#"
                uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover carusel_btn" href="#"
                uk-slidenav-next uk-slider-item="next"></a>

        </div>
    </div>
    <div class="ariza">
        <div class="ariza_card">
            <h1>@lang('statik.ariza_qoldirmoq')</h1>
            <form action="#">
                <input type="text" placeholder="@lang('statik.ism')">
                <input type="number" placeholder="@lang('statik.tel_raqam')">
                <input type="email" placeholder="@lang('statik.pochta')">
                <textarea class="comment" type="text" placeholder="@lang('statik.komentariya')"></textarea>
                <button class="ariza_btn">@lang('statik.yubormoq')</button>
            </form>
        </div>
    </div>
    <footer>
        <div>
            <h1>@lang('statik.kontakt')</h1>
            <p>The Travel Time</p>
            <p><i class="fa-solid fa-location-dot"></i> <a href="./card.html">@lang('statik.manzil')</a>
            </p>
            <p><i class="fa-solid fa-phone"></i><a href="tel:">99895 5554499</a>,<a href="tel:">99898
                    1554499</a></p>
            <p><i class="fa-regular fa-envelope"></i> <a href="#">info@thetraveltime.uz</a></p>
            <a href="#"><img src="./assets/IMG/black_background.svg" alt=""></a>
        </div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d5992.672872976923!2d69.275486!3d41.323297!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDHCsDE5JzIzLjkiTiA2OcKwMTYnMzEuOCJF!5e0!3m2!1sru!2s!4v1679577318513!5m2!1sru!2s"
            width="500px" height="250px" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div id="footer">
            <h1>@lang('statik.sotsial_aloqa')</h1>
            <h2><a href="#">Telegram: </a> <i class="fa-brands fa-telegram"></i></h2>
            <h2><a href="#">Instagram: </a> <i class="fa-brands fa-instagram"></i></h2>
            <h2><a href="#">Facebook: </a> <i class="fa-brands fa-facebook"></i></h2>
            <h2><a href="#">Whatsapp: </a> <i class="fa-brands fa-whatsapp"></i></h2>
        </div>
    </footer>



    <!-- ========script====bootstrap@5.3.0========================== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <!-- ========script====bootstrap@5.3.0========================== -->
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.15/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.15/dist/js/uikit-icons.min.js"></script>
</body>

</html>
