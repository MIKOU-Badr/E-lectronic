<!DOCTYPE html>

<head>
    <title>E-lectronic</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon"
        href="<?php echo url('/'); ?>/images/shortcut.png" />
    <link
        href="<?php echo url('/'); ?>/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css"
        rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo url('/'); ?>/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo url('/'); ?>/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo url('/'); ?>/plugins/slick-1.8.0/slick.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo url('/'); ?>/styles/main_styles.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo url('/'); ?>/styles/button_styles.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo url('/'); ?>/styles/main_responsive.css">


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
                                        <li><a href="#popular">Catégories populaires <i
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

        <!-- Banner -->

        <div class="banner">
            <div class="banner_background"
                style="background-image:url(<?php echo url('/'); ?>/images/background.jpg)">
            </div>
            <div class="container fill_height">
                <div class="row fill_height">
                    <div class="col-lg-4 offset-lg-6 fill_height">
                        <div class="banner_content">
                            <h1 class="banner_text">electronics shop</h1>
                            <div class="button banner_button"><a href="{{ route('Boutique') }}">Achetez</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Characteristics -->

        <div class="characteristics">
            <div class="container">
                <div class="row">
                    <!-- Char. Item -->
                    <div class="col-lg-3 col-md-6 ">
                        <div class="char_item d-flex flex-row align-items-center justify-content-start">
                            <div class="char_icon"><img
                                    src="<?php echo url('/'); ?>/images/char_1.png"
                                    alt=""></div>
                            <div class="char_content">
                                <div class="char_title">Livraison gratuite</div>
                                <div class="char_subtitle">0 DH</div>
                            </div>
                        </div>
                    </div>

                    <!-- Char. Item -->
                    <div class="col-lg-3 col-md-6">
                        <div class="char_item d-flex flex-row align-items-center justify-content-start">
                            <div class="char_icon"><img
                                    src="<?php echo url('/'); ?>/images/char_1.png"
                                    alt=""></div>
                            <div class="char_content">
                                <div class="char_title">Livraison</div>
                                <div class="char_subtitle">assurée en 24 heures</div>
                            </div>
                        </div>
                    </div>

                    <!-- Char. Item -->
                    <div class="col-lg-3 col-md-6">
                        <div class="char_item d-flex flex-row align-items-center justify-content-start">
                            <div class="char_icon"><img
                                    src="<?php echo url('/'); ?>/images/char_3.png"
                                    alt=""></div>
                            <div class="char_content">
                                <div class="char_title">Paiement</div>
                                <div class="char_subtitle">plus courantes</div>
                            </div>
                        </div>
                    </div>

                    <!-- Char. Item -->
                    <div class="col-lg-3 col-md-6">
                        <div class="char_item d-flex flex-row align-items-center justify-content-start">
                            <div class="char_icon"><img
                                    src="<?php echo url('/'); ?>/images/char_4.png"
                                    alt=""></div>
                            <div class="char_content">
                                <div class="char_title">Qualité</div>
                                <div class="char_subtitle">la meilleure</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--produits-->
        <div id="carouselExampleControls" class="carousel slide carousel_style d-none d-md-block" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <center>
                        <a href="{{ route('New') }}">
                            <div class="col-lg-11">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="<?php echo url('/'); ?>/images/Pack1/new.JPG"
                                            class="d-block carousel_image_style" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <h1>Kit Raspberry Pi 3 Modèle B Plus (B+)</h1>
                                        <h2 class="d-none d-xl-block">boîtier noir Premium <br />3 dissipateurs de
                                            chaleur en cuivren <br />Et autres ...</h2>

                                        <p style="text-shadow: 5px 5px 5px  rgb(179, 175, 175)">1000 Dhs</p>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </center>
                </div>
                <div class="carousel-item">
                    <center>
                        <a href="{{ route('New') }}">
                            <div class="col-lg-11">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h1> Ensemble moteur pas à pas + carte de pilote</h1>
                                        <h2 class="d-none d-xl-block">Moteur Pas à Pas 5V <br />Carte de Commande
                                            ULN2003 28BYJ-48 Moteur Pas à Pas à 4 Phases pour Arduino</h2>

                                        <p style="text-shadow: 5px 5px 5px  rgb(179, 175, 175)">40 Dhs</p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="<?php echo url('/'); ?>/images/Accessoire2/new.JPG"
                                            class="d-block carousel_image_style" alt="...">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </center>
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- Popular Categories -->

        <div class="popular_categories" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="popular_categories_content">
                            <div class="popular_categories_title">Catégories Populaires</div>
                            <div class="popular_categories_slider_nav">
                                <div class="popular_categories_prev popular_categories_nav"><i
                                        class="fas fa-angle-left ml-auto"></i></div>
                                <div class="popular_categories_next popular_categories_nav"><i
                                        class="fas fa-angle-right ml-auto"></i></div>
                            </div>
                        </div>
                    </div>

                    <!-- Popular Categories Slider -->

                    <div class="col-lg-9">
                        <div class="popular_categories_slider_container">
                            <div class="owl-carousel owl-theme popular_categories_slider">

                                <!-- Popular Categories Item -->
                                <div class="owl-item">
                                    <div
                                        class="popular_category d-flex flex-column align-items-center justify-content-center ">
                                        <div class="popular_category_image"><img
                                                src="<?php echo url('/'); ?>/images/popular_1.png"
                                                alt=""></div>
                                        <div class="popular_category_text">Kits électroniques</div>
                                    </div>
                                </div>

                                <!-- Popular Categories Item -->
                                <div class="owl-item">
                                    <div
                                        class="popular_category d-flex flex-column align-items-center justify-content-center">
                                        <div class="popular_category_image"><img
                                                src="<?php echo url('/'); ?>/images/popular_2.png"
                                                alt=""></div>
                                        <div class="popular_category_text">Cartes électroniques</div>
                                    </div>
                                </div>

                                <!-- Popular Categories Item -->
                                <div class="owl-item">
                                    <div
                                        class="popular_category d-flex flex-column align-items-center justify-content-center">
                                        <div class="popular_category_image"><img
                                                src="<?php echo url('/'); ?>/images/popular_3.png"
                                                alt=""></div>
                                        <div class="popular_category_text">Accessories</div>
                                    </div>
                                </div>

                                <!-- Popular Categories Item -->
                                <div class="owl-item">
                                    <div
                                        class="popular_category d-flex flex-column align-items-center justify-content-center">
                                        <div class="popular_category_image"><img
                                                src="<?php echo url('/'); ?>/images/popular_4.png"
                                                alt=""></div>
                                        <div class="popular_category_text">Capteurs</div>
                                    </div>
                                </div>
                                <!-- Popular Categories Item -->
                                <div class="owl-item">
                                    <div
                                        class="popular_category d-flex flex-column align-items-center justify-content-center">
                                        <div class="popular_category_image"><img
                                                src="<?php echo url('/'); ?>/images/popular_5.png"
                                                alt=""></div>
                                        <div class="popular_category_text">Moteurs</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
        @endif
        <div class="container rayon_produit_style" id="Kits">
            <h3><strong>Kits Electroniques </strong></h3>
            <div class="row">
                @foreach ($articles as $article)
                    @if ($article->Categorie === 'Kit')
                        @if ($article->New === 1)
                            <div class="card col-6 col-md-4 col-lg-3" id="newKit">
                                <a href="{{ route('voirArticle', ['refArticle' => $article->refArticle]) }}"><img
                                        src="{{ asset('storage/'.$article->Images . '/new.JPG') }}" class="card-img-top"
                                        alt="..."></a>
                                <div class="card-body">
                                    <h6 class="card-title text-center" style="height: 50px;">{{ $article->Titre }}</h6>
                                    <p><strong>{{ $article->Prix }} Dhs</strong></p>
                                    <center>
                                        <div class="text-center" style="display: inline-flex;">
                                            <form action="{{ route('wishlist.store') }}" class="mr-4" method="post">
                                                {{ csrf_field() }}
                                                <button type="submit" name="article_id" value="{{ $article->id }}"
                                                    class="btn buy_btn_style"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z" />
                                                    </svg><span class="d-none d-md-inline"></span></a>
                                            </form>
                                            @if(($stock = $article->QteDeStock === 0 ? 'En rupture de stock' : 'En stock') == 'En stock')
                                            <form action="{{ route('ajouterArticle', ['id' => $article->id]) }}"
                                                method="POST" name="ajouterAuPanier" id="ajouterAuPanier">
                                                @csrf
                                                <button type="submit" class="btn buy_btn_style"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-cart-plus-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                                    </svg><span class="d-none d-md-inline"></span></button>
                                            </form>
                                            @endif
                                        </div>
                                    </center>
                                </div>
                            </div>
                        @else
                            <div class="card col-6 col-md-4 col-lg-3">
                                <a href="{{ route('voirArticle', ['refArticle' => $article->refArticle]) }}"><img
                                        src="{{ asset('storage/'.$article->Images . '/image_1.JPG') }}" class="card-img-top"
                                        alt="..."></a>
                                <div class="card-body">
                                    <h6 class="card-title text-center" style="height: 50px;">{{ $article->Titre }}</h6>
                                    <p><strong>{{ $article->Prix }} Dhs</strong></p>
                                    <center>
                                        <div class="text-center" style="display: inline-flex;">
                                            <form action="{{ route('wishlist.store') }}" class="mr-4" method="post">
                                                {{ csrf_field() }}
                                                <button type="submit" name="article_id"  value="{{ $article->id }}"
                                                    class="btn buy_btn_style"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z" />
                                                    </svg><span class="d-none d-md-inline"></span></a>
                                            </form>
                                            @if(($stock = $article->QteDeStock === 0 ? 'En rupture de stock' : 'En stock') == 'En stock')
                                            <form action="{{ route('ajouterArticle', ['id' => $article->id]) }}"
                                                method="POST" name="ajouterAuPanier" id="ajouterAuPanier">
                                                @csrf
                                                <button type="submit" class="btn buy_btn_style"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-cart-plus-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                                    </svg><span class="d-none d-md-inline"></span></button>
                                            </form>
                                            @endif
                                        </div>
                                    </center>
                                </div>
                            </div>
                        @endif

                    @else
                    @endif
                @endforeach

            </div>
        </div>

        <div class="container rayon_produit_style" id="cartes">
            <h3><strong>Cartes Electroniques </strong></h3>
            <div class="row">
                @foreach ($articles as $article)
                    @if ($article->Categorie === 'Carte')
                        @if ($article->New === 1)
                            <div class="card col-6 col-md-4 col-lg-3">
                                <a href="{{ route('voirArticle', ['refArticle' => $article->refArticle]) }}"><img
                                        src="{{ asset('storage/'.$article->Images . '/new.JPG') }}" class="card-img-top"
                                        alt="..."></a>
                                <div class="card-body">
                                    <h6 class="card-title text-center" style="height: 50px;">{{ $article->Titre }}</h6>
                                    <p><strong>{{ $article->Prix }} Dhs</strong></p>
                                    <center>
                                        <div class="text-center" style="display: inline-flex;">
                                            <form action="{{ route('wishlist.store') }}" class="mr-4" method="post">
                                                {{ csrf_field() }}
                                                <button type="submit" name="article_id" value="{{ $article->id }}"
                                                    class="btn buy_btn_style"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z" />
                                                    </svg><span class="d-none d-md-inline"></span></a>
                                            </form>
                                            @if(($stock = $article->QteDeStock === 0 ? 'En rupture de stock' : 'En stock') == 'En stock')
                                            <form action="{{ route('ajouterArticle', ['id' => $article->id]) }}"
                                                method="POST" name="ajouterAuPanier" id="ajouterAuPanier">
                                                @csrf
                                                <button type="submit" class="btn buy_btn_style"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-cart-plus-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                                    </svg><span class="d-none d-md-inline"></span></button>
                                            </form>
                                            @endif
                                        </div>
                                    </center>
                                </div>
                            </div>
                        @else
                            <div class="card col-6 col-md-4 col-lg-3">
                                <a href="{{ route('voirArticle', ['refArticle' => $article->refArticle]) }}"><img
                                        src="{{ asset('storage/'.$article->Images . '/image_1.JPG') }}" class="card-img-top"
                                        alt="..."></a>
                                <div class="card-body">
                                    <h6 class="card-title text-center" style="height: 50px;">{{ $article->Titre }}</h6>
                                    <p><strong>{{ $article->Prix }} Dhs</strong></p>
                                    <center>
                                        <div class="text-center" style="display: inline-flex;">
                                            <form action="{{ route('wishlist.store') }}" class="mr-4" method="post">
                                                {{ csrf_field() }}
                                                <button type="submit" name="article_id" value="{{ $article->id }}"
                                                    class="btn buy_btn_style"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z" />
                                                    </svg><span class="d-none d-md-inline"></span></a>
                                            </form>
                                            @if(($stock = $article->QteDeStock === 0 ? 'En rupture de stock' : 'En stock') == 'En stock')
                                            <form action="{{ route('ajouterArticle', ['id' => $article->id]) }}"
                                                method="POST" name="ajouterAuPanier" id="ajouterAuPanier">
                                                @csrf
                                                <button type="submit" class="btn buy_btn_style"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-cart-plus-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                                    </svg><span class="d-none d-md-inline"></span></button>
                                            </form>
                                            @endif
                                        </div>
                                    </center>
                                </div>
                            </div>
                        @endif

                    @else
                    @endif
                @endforeach
            </div>
        </div>

        <div class="container rayon_produit_style" id="accessoires">
            <h3><strong>Accessoires </strong></h3>
            <div class="row">
                @foreach ($articles as $article)
                    @if ($article->Categorie === 'Accessoire')
                        @if ($article->New === 1)
                            <div class="card col-6 col-md-4 col-lg-3" id="newAccessoire">
                                <a href="{{ route('voirArticle', ['refArticle' => $article->refArticle]) }}"><img
                                        src="{{ asset('storage/'.$article->Images . '/new.JPG') }}" class="card-img-top"
                                        alt="..."></a>
                                <div class="card-body">
                                    <h6 class="card-title text-center" style="height: 50px;">{{ $article->Titre }}</h6>
                                    <p><strong>{{ $article->Prix }} Dhs</strong></p>
                                    <center>
                                        <div class="text-center" style="display: inline-flex;">
                                            <form action="{{ route('wishlist.store') }}" class="mr-4" method="post">
                                                {{ csrf_field() }}
                                                <button type="submit" name="article_id" value="{{ $article->id }}"
                                                    class="btn buy_btn_style"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z" />
                                                    </svg><span class="d-none d-md-inline"></span></a>
                                            </form>
                                            @if(($stock = $article->QteDeStock === 0 ? 'En rupture de stock' : 'En stock') == 'En stock')
                                            <form action="{{ route('ajouterArticle', ['id' => $article->id]) }}"
                                                method="POST" name="ajouterAuPanier" id="ajouterAuPanier">
                                                @csrf
                                                <button type="submit" class="btn buy_btn_style"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-cart-plus-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                                    </svg><span class="d-none d-md-inline"></span></button>
                                            </form>
                                            @endif
                                        </div>
                                    </center>
                                </div>
                            </div>
                        @else
                            <div class="card col-6 col-md-4 col-lg-3">
                                <a href="{{ route('voirArticle', ['refArticle' => $article->refArticle]) }}"><img
                                        src="{{ asset('storage/'.$article->Images . '/image_1.JPG') }}" class="card-img-top"
                                        alt="..."></a>
                                <div class="card-body">
                                    <h6 class="card-title text-center" style="height: 50px;">{{ $article->Titre }}</h6>
                                    <p><strong>{{ $article->Prix }} Dhs</strong></p>
                                    <center>
                                        <div class="text-center" style="display: inline-flex;">
                                            <form action="{{ route('wishlist.store') }}" class="mr-4" method="post">
                                                {{ csrf_field() }}
                                                <button type="submit" name="article_id" value="{{ $article->id }}"
                                                    class="btn buy_btn_style"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z" />
                                                    </svg><span class="d-none d-md-inline"></span></a>
                                            </form>
                                            @if(($stock = $article->QteDeStock === 0 ? 'En rupture de stock' : 'En stock') == 'En stock')
                                            <form action="{{ route('ajouterArticle', ['id' => $article->id]) }}"
                                                method="POST" name="ajouterAuPanier" id="ajouterAuPanier">
                                                @csrf
                                                <button type="submit" class="btn buy_btn_style"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-cart-plus-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                                    </svg><span class="d-none d-md-inline"></span></button>
                                            </form>
                                            @endif
                                        </div>
                                    </center>
                                </div>
                            </div>
                        @endif

                    @else
                    @endif
                @endforeach
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
    </div>

    <script src="<?php echo url('/'); ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo url('/'); ?>/plugins/greensock/TweenMax.min.js"></script>
    <script src="<?php echo url('/'); ?>/js/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <script src="<?php echo url('/'); ?>/plugins/OwlCarousel2-2.2.1/owl.carousel.js">
    </script>
</body>

</html>
