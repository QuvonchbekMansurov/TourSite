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
    <div class="header">
        <div class="header_text">
            <p>@lang('statik.biz_tuygu_ulashamiz')</p>
        </div>
        <form class="header_input" action="{{ url('/search') }}" method="GET">
            <input type="text" name="name" placeholder="@lang('statik.tur_nomi')">
            <select name="country_id" id="country">
                @foreach ($country as $item)
                    <option>{{ $item['name_' . \App::getLocale()] }}
                    </option>
                @endforeach
            </select>
            <select name="category_id" id="country">
                @foreach ($category as $item)
                    <option value="{{ $item->id }}">{{ $item['name_' . \App::getLocale()] }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="red_btn">@lang('statik.izlash')</button>
        </form>

    </div>
    <div class="filtr">
        <div class="filtr_nav">
            <h1>@lang('statik.filter')</h1>
        </div>
        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-4@m uk-grid">
                @foreach ($tour as $toure)
                    <li>
                        <div class="uk-panel manzil_card">
                            <div class="filtr_card">
                                <div class="filtr_card_img">
                                    @if ($toure->sale)
                                        <p>{{ $toure->sale }} so'm/oy</p>
                                    @endif
                                    <img src="./assets/IMG/3661571-photo-big.jpg" alt="">
                                </div>
                                <div class="filtr_card_text">
                                    <h2><a
                                            href="{{ url('tour/card' . $toure->id . '') }}">{{ $toure['name_' . \App::getLocale()] }}</a>
                                    </h2>
                                    <h1 class="card_narx">{{ $toure->price }} so'm</h1>
                                    <p>{{ $toure['teaser_' . \App::getLocale()] }}</p>
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
    <div class="haqimizda">
        <div class="haqimizda_nav">
            <h1>@lang('statik.biz_haqimizda')</h1>
            <div class="underline"></div>
        </div>
        <div class="haqimizda_cards">
            <div class="haqimizda_card">
                <div class="haqimizda_card_icon"></div>
                <h1>@lang('statik.turli_yonalish')</h1>
                <p>@lang('statik.Har_qanday_yonalishda_qulay_taklif')</p>
            </div>
            <div class="haqimizda_card">
                <div class="haqimizda_card_icon"></div>
                <h1>@lang('statik.shaxsiy_yondashuv')</h1>
                <p>@lang('statik.sayohat_tanlash')</p>
            </div>
            <div class="haqimizda_card">
                <div class="haqimizda_card_icon"></div>
                <h1>@lang('statik.hamkorlar')</h1>
                <p>@lang('statik.hamkor_izoh')
                </p>
            </div>
            <div class="haqimizda_card">
                <div class="haqimizda_card_icon"></div>
                <h1>@lang('statik.jamoa')</h1>
                <p>@lang('statik.jamoa_izoh')</p>
            </div>
        </div>
    </div>
    <div class="manzillar">
        <div class="haqimizda_nav">
            <h1>@lang('statik.sayohat_manzillari')</h1>
            <div class="underline"></div>
        </div>
        <div class="manzillar_cards">
            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>

                <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-4@m uk-grid">
                    @foreach ($country as $item)
                        <li>
                            <div class="uk-panel manzil_card">
                                <img src="./assets/IMG/gruziya.jpg" alt="">
                                <div class="uk-position-center uk-panel manzil_card_h1">
                                    <h1>{{ $item['name_' . \App::getLocale()] }}</h1>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    <li>
                        <div class="uk-panel manzil_card">
                            <img src="./assets/IMG/ozarbayjon.png" alt="">
                            <div class="uk-position-center uk-panel">
                                <h1>ozbekistan</h1>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="uk-panel manzil_card">
                            <img src="./assets/IMG/ozarbayjon.png" alt="">
                            <div class="uk-position-center uk-panel">
                                <h1>3</h1>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="uk-panel manzil_card">
                            <img src="./assets/IMG/ozarbayjon.png" alt="">
                            <div class="uk-position-center uk-panel">
                                <h1>4</h1>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="uk-panel manzil_card">
                            <img src="./assets/IMG/ozarbayjon.png" alt="">
                            <div class="uk-position-center uk-panel">
                                <h1>5</h1>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="uk-panel manzil_card">
                            <img src="./assets/IMG/ozarbayjon.png" alt="">
                            <div class="uk-position-center uk-panel">
                                <h1>6</h1>
                            </div>
                        </div>
                    </li>
                </ul>

                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#"
                    uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
                    uk-slider-item="next"></a>

            </div>
        </div>
    </div>
    <div class="raqamlar">
        <div class="haqimizda_nav">
            <h1>@lang('statik.biz_raqamlarda')</h1>
            <div class="underline"></div>
        </div>
        <div class="raqamlar_cards">
            <div class="raqamlar_card">
                <i class="fa-solid fa-plane-departure"></i>
                <div class="raqam_card_h1">
                    <h1>1000+</h1>
                    <h2>@lang('statik.mijozlar')</h2>
                </div>
            </div>
            <div class="raqamlar_card">
                <i class="fa-solid fa-plane-departure"></i>
                <div class="raqam_card_h1">
                    <h1>25+</h1>
                    <h2>@lang('statik.davlarlar')</h2>
                </div>
            </div>
            <div class="raqamlar_card">
                <i class="fa-solid fa-earth-americas"></i>
                <div class="raqam_card_h1">
                    <h1>30+</h1>
                    <h2>@lang('statik.sayohat')</h2>
                </div>
            </div>
            <div class="raqamlar_card">
                <i class="fa-solid fa-bus"></i>
                <div class="raqam_card_h1">
                    <h1>7</h1>
                    <h2>@lang('statik.sayohat_turlari')</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="ariza">
        <div class="ariza_card">
            <h1>@lang('statik.ariza_qoldirmoq')</h1>
            <form action="{{route('ariza')}}" method="GET">
                <input name="fio" type="text" placeholder="@lang('statik.ism')">
                <input name="phone" type="number" placeholder="@lang('statik.tel_raqam')">
                <input name="email" type="email" placeholder="@lang('statik.pochta')">
                <textarea name="comment" class="comment" type="text" placeholder="@lang('statik.komentariya')"></textarea>
                <button type="submit" class="ariza_btn">@lang('statik.yubormoq')</button>
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
