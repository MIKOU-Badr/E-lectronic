<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>{{ $article->Titre }} | E-lectronic</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon"
        href="<?php echo url('/'); ?>/images/shortcut.png" />
    <link
        href="<?php echo url('/'); ?>/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css"
        rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo url('/'); ?>/styles/product_styles.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo url('/'); ?>/styles/button_styles.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo url('/'); ?>/styles/product_responsive.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo url('/'); ?>/styles/main_styles.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo url('/'); ?>/styles/main_responsive.css">
    <style>
        .pro-quantity {
            margin-left: 20px;
        }

        .pro-quantity .pro-qty {
            width: 90px;
            height: 35px;
            border: 1px solid black;
            border-radius: 50px;
            display: inline-block;
            text-align: center;
            outline: none;
        }

        .pro-qty .qtybtn {
            width: 15px;
            display: inline-block;
            outline: none;
            line-height: 31px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 700;
            color: #454545;
        }

        .pro-quantity .pro-qty input {
            width: 50px;
            border: none;
            height: 33px;
            line-height: 33px;
            text-align: center;

            background-color: transparent;
        }

        .qtybtne {
            font-size: large;
            margin: 0.02px;
        }

    </style>

</head>

<body>
    <div class="super_container">
          <!-- Header -->

          <header class="header">

            <!-- Top Bar -->

            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img
                                        src="<?php echo url('/'); ?>/images/phone.png"
                                        alt=""></div>+212 6 00 00 00 00
                            </div>
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img
                                        src="<?php echo url('/'); ?>/images/mail.png"
                                        alt=""></div><a
                                    href="mailto:electronickba@gmail.com">electronickba@gmail.com</a>
                            </div>
                            <div class="top_bar_content ml-auto">
                                <div class="top_bar_user">
                                    <div class="user_icon"><img
                                            src="<?php echo url('/'); ?>/images/user.png"
                                            alt=""></div>
                                    @if (Route::has('login'))
                                        @auth
                                            <div>
                                                <a href="{{ route('dashboard') }}">{{ Auth::user()->name }}</a>
                                            </div>
                                        @else
                                            <div><a href="{{ route('register') }}">Mon Compte</a></div>
                                        @endauth
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Main -->

            <div class="header_main">
                <div class="container">
                    <div class="row">

                        <!-- Logo -->
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo"><a href="{{ route('index') }}"><img
                                            src="<?php echo url('/'); ?>/images/logo.png"
                                            alt=""></a></div>
                            </div>
                        </div>

                        <!-- Search -->
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <div id="wrap">
                                    <form action="{{ route('Search') }}">
                                        <input id="search" name="q" value="{{ request()->q ?? '' }}" required="required"
                                            type="search" placeholder="Search for products..."><input id="search_submit"
                                            value="Rechercher" type="submit">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="custom_dropdown" style="display: none;">
                            <div class="custom_dropdown_list">
                                <span class="custom_dropdown_placeholder clc">toutes les catégories</span>
                                <i class="fas fa-chevron-down"></i>
                                <ul class="custom_list">
                                </ul>
                            </div>
                        </div>
                        <!-- Wishlist -->
                        <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                                <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                    <div class="wishlist_icon"><img
                                            src="<?php echo url('/'); ?>/images/heart.png"
                                            alt=""></div>
                                    <div class="wishlist_content">
                                        <div class="wishlist_text"><a href="{{ route('wishlist.index') }}">Wishlist</a>
                                        </div>
                                        <div class="wishlist_count">
                                            @if (Route::has('login'))
                                                @auth
                                                    {{ Auth::user()->wishlist->count() }}
                                                @else
                                                    0
                                                @endauth
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Cart -->
                                <div class="cart">
                                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                        <div class="cart_icon">
                                            <img src="<?php echo url('/'); ?>/images/cart.png"
                                                alt="">
                                            <div class="cart_count"><span>{{ $nbrArticle }}</span></div>
                                        </div>
                                        <div class="cart_content">
                                            <div class="cart_text"><a href="{{ route('afficherPanier') }}">Carte</a>
                                            </div>
                                            <div class="cart_price">{{ number_format($panierTotal, 2) }} dhs</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Navigation -->

            <nav class="main_nav">
                <div class="container">
                    <div class="row">
                        <div class="col">

                            <div class="main_nav_content d-flex flex-row">

                                <!-- Categories Menu -->

                                <div class="cat_menu_container">
                                    <div
                                        class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                        <div class="cat_burger"><span></span><span></span><span></span></div>
                                        <div class="cat_menu_text">CATÉGORIES</div>
                                    </div>

                                    <ul class="cat_menu">
                                        <li><a href="{{ route('New') }}">Nouveautés <i
                                                    class="fas fa-chevron-right ml-auto"></i></a></li>
                                        <li><a href="{{ route('Kits') }}">Kits électroniques<i
                                                    class="fas fa-chevron-right"></i></a></li>
                                        <li><a href="{{ route('Cartes') }}">Cartes électroniques<i
                                                    class="fas fa-chevron-right"></i></a></li>
                                        <li><a href="{{ route('Accessoires') }}">Accessoires<i
                                                    class="fas fa-chevron-right"></i></a></li>
                                    </ul>
                                </div>

                                <!-- Main Nav Menu -->

                                <div class="main_nav_menu ml-auto">
                                    <ul class="standard_dropdown main_nav_dropdown">
                                        <li><a href="{{ route('index') }}">Accueil<i
                                                    class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="{{ route('index') }}#popular">Catégories populaires <i
                                                    class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="{{ route('Boutique') }}">Boutique<i
                                                    class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="{{ route('projets') }}">Projets DIY<i
                                                    class="fas fa-chevron-down"></i></a></li>
                                    </ul>
                                </div>

                                <!-- Menu Trigger -->

                                <div class="menu_trigger_container ml-auto">
                                    <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                        <div class="menu_burger">
                                            <div class="menu_trigger_text">menu</div>
                                            <div class="cat_burger menu_burger_inner">
                                                <span></span><span></span><span></span></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Menu -->

            <div class="page_menu">
                <div class="container">
                    <div class="row">
                        <div class="col">

                            <div class="page_menu_content">

                                <div class="page_menu_search">
                                    <form action="{{ route('Search') }}">
                                        <input type="search" name="q" value="{{ request()->q ?? '' }}"
                                            required="required" class="page_menu_search_input"
                                            placeholder="Search for products...">
                                    </form>
                                </div>
                                <li class="page_menu_item">
                                    <a href="{{ route('index') }}">Accueil<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item">
                                    <a href="#popular">Catégories populaires<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item">
                                    <a href="{{ route('Boutique') }}">Boutique<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item">
                                    <a href="{{ route('projets') }}">Projets DIY<i class="fa fa-angle-down"></i></a>
                                </li>


                                <div class="menu_contact">
                                    <div class="menu_contact_item">
                                        <div class="menu_contact_icon"><img
                                                src="<?php echo url('/'); ?>/images/phone_white.png"
                                                alt=""></div>+212 6 00 00 00 00
                                    </div>
                                    <div class="menu_contact_item">
                                        <div class="menu_contact_icon"><img
                                                src="<?php echo url('/'); ?>/images/mail_white.png"
                                                alt=""></div><a href="mailto:electronickba@gmail.com">electronickba@gmail.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>

        <div class="container-fluid">
            <nav class="compte">
                <ul>
                    <li class="compte_li">
                        <a href="{{ route('index') }}">Accueil</a>
                    </li>
                    <li class="compte_li">
                        @if ($article->Categorie === 'Kit')
                            <a href="{{ route('Kits') }}">{{ $article->Categorie }}s électroniques</a>
                        @elseif($article->Categorie === 'Carte')
                            <a href="{{ route('Cartes') }}">{{ $article->Categorie }}s électroniques</a>
                        @elseif($article->Categorie === 'Accessoire')
                            <a href="{{ route('Accessoires') }}">{{ $article->Categorie }}s</a>
                        @endif
                    </li>
                    <li class="compte_li">
                        <a href="">{{ $article->Titre }}</a>
                    </li>
                </ul>
            </nav>
        </div>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if (session('flash_message'))
            <div class="alert alert-success">
                {{ session('flash_message') }}
            </div>
        @endif

        <div class="container produit_style">
            <h2 class="produit_title_style text-center"><strong>{{ $article->Titre }}</strong><div class="badge badge-pill badge-primary mt-15" style="font-size: 12px; margin-left:10px;">{{ $stock }}</div></h2>
            <div class="row">
                <div class="container col-lg-6 col-xl-5 produit_image_style">
                    <div class="container ">
                        <center>
                            <br />
                            <div class="xzoom-container">
                                <img src="{{ asset('storage/'.$article->Images . '/image_1.JPG') }}" class="xzoom image"
                                    xoriginal="{{ asset('storage/'.$article->Images . '/image_1.JPG') }}" alt="">
                                <div class="xzoom-thumbs">
                                    <a href="{{ asset('storage/'.$article->Images . '/image_1.JPG') }}">
                                        <img class="xzoom-gallery" src="{{ asset('storage/'.$article->Images . '/image_1.JPG') }}"
                                            xpreview="{{ asset('storage/'.$article->Images . '/image_1.JPG') }}"
                                            alt="">
                                    </a>
                                    <a href="{{ asset('storage/'.$article->Images . '/image_2.JPG') }}">
                                        <img class="xzoom-gallery" src="{{ asset('storage/'.$article->Images . '/image_2.JPG') }}"
                                            alt="">
                                    </a>
                                    <a href="{{ asset('storage/'.$article->Images . '/image_3.JPG') }}">
                                        <img class="xzoom-gallery" src="{{ asset('storage/'.$article->Images . '/image_3.JPG') }}"
                                            alt="">
                                    </a>
                                    <a href="{{ asset('storage/'.$article->Images . '/image_4.JPG') }}">
                                        <img class="xzoom-gallery" src="{{ asset('storage/'.$article->Images . '/image_4.JPG') }}"
                                            alt="">
                                    </a>

                                </div>
                            </div>
                        </center>
                    </div>
                </div>
                <div class="container col-lg-6 col-xl-7" style="vertical-align: center;">
                    <div>
                        <h3>
                            {{ $article->Description }}
                        </h3>
                        <div>
                            <h1 class="produit_prix_style"><strong>{{ $article->Prix }} Dhs</strong></h1>
                        </div>
                        <div class="text-right">
                            @if($stock == 'En stock')

                            <span style="float:left; margin-left:31%;">

                            <form action="{{ route('ajouterArticle', ['id' => $article->id]) }}" class="mb-4" method="POST"
                                name="ajouterAuPanier" id="ajouterAuPanier">
                                @csrf
                                <span style="float:left; margin-right:10px;">
                                <div class="input-group-prepend">
                                    <div class="pro-quantity">
                                        <div class="pro-qty" max="{{ $article->QteDeStock }}"><input class="form-control qtybtn" id="qty" name="qty" type="text" max="{{ $article->QteDeStock }}" value="1"></div>
                                    </div>
                                </div>
                                </span>

                                <button type="submit" class="btn buy_btn_style"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                    </svg><span class="d-none d-md-inline"> | acheter</span></button>
                            </form>
                            @endif

                        </span>
                        <span style="float:right;">
                            <form action="{{ route('wishlist.store') }}" method="post">
                                {{ csrf_field() }}
                                <button type="submit" name="article_id" value="{{ $article->id }}"
                                    class="btn buy_btn_style"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-suit-heart-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z" />
                                    </svg><span class="d-none d-md-inline"> | ajouter au wishlist</span></a>
                            </form>
                        </span>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- Footer -->

        <footer class="footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 footer_col">
                        <div class="footer_column footer_contact">
                            <div class="logo_container">
                                <div class="logo"><a href="{{ route('index') }}">E-lectronic</a></div>
                            </div>
                            <div class="footer_title">Vous avez une question? Appelez-nous 24/7</div>
                            <div class="footer_phone">+212 6 00 00 00 00</div>
                            <div class="footer_contact_text">
                                <p>Meuntfleuri, Fès</p>
                                <p>Fès-Méknes, MOROCCO</p>
                            </div>
                            <div class="footer_social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 offset-lg-5">
                        <div class="footer_column">
                            <div class="footer_title">Information</div>
                            <ul class="footer_list">
                                <li><a href="{{ route('index') }}">Accueil</a></li>
                                <li><a href="{{ route('Boutique') }}">Boutique</a></li>
                                <li><a href="{{ route('projets') }}">Projets DIY</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="footer_column">
                            <div class="footer_title">Service Client</div>
                            <ul class="footer_list">
                                @if (Route::has('login'))
                                    @auth
                                        <li>
                                            <a href="{{ route('dashboard') }}">Mon Compte</a>
                                        </li>
                                    @else
                                        <li><a href="{{ route('register') }}">Mon Compte</a></li>
                                    @endauth
                                @endif
								<li><a href="{{ route('commande') }}">Commandes</a></li>
								<li><a href="{{ route('wishlist.index') }}">Wish List</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </footer>

        <!-- Copyright -->

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div
                            class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                            <div class="copyright_content">Copyright &copy;<script>
                                    document.write(new Date().getFullYear());

                                </script> All rights reserved</div>
                            <div class="logos ml-sm-auto">
                                <ul class="logos_list">
                                    <li><a href="#"><img
                                                src="<?php echo url('/'); ?>/images/logos_1.png"
                                                alt=""></a></li>
                                    <li><a href="#"><img
                                                src="<?php echo url('/'); ?>/images/logos_2.png"
                                                alt=""></a></li>
                                    <li><a href="#"><img
                                                src="<?php echo url('/'); ?>/images/logos_3.png"
                                                alt=""></a></li>
                                    <li><a href="#"><img
                                                src="<?php echo url('/'); ?>/images/logos_4.png"
                                                alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
            integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
        </script>

        <script src="<?php echo url('/'); ?>/js/jquery.js"></script>
        <script src="<?php echo url('/'); ?>/js/script.js"></script>
        <script src="<?php echo url('/'); ?>/js/zoom.js"></script>
        <script src="<?php echo url('/'); ?>/plugins/greensock/TweenMax.min.js"></script>
        <script src="<?php echo url('/'); ?>/js/custom.js"></script>
        <script>
            $('.pro-qty').prepend('<span class="dec_inc qtybtne">-</span>');
            $('.pro-qty').append('<span class="inc qtybtne">+</span>');
            $('.qtybtne').on('click', function() {
                var $button = $(this);
                var oldValue = $button.parent().find('input').val();
                if ($button.hasClass('inc')) {
                    if(oldValue>= {{ $article->QteDeStock }}){
                        var newVal = parseFloat({{ $article->QteDeStock }});
                    }else{
                        var newVal = parseFloat(oldValue) + 1;
                    }

                } else {
                    // Don't allow decrementing below zero
                    if (oldValue > 0) {
                        var newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 0;
                    }
                }
                $button.parent().find('input').val(newVal);
            });

        </script>
</body>

</html>
