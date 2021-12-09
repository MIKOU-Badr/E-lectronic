<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>E-lectronic | Détails du compte</title>

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
        href="<?php echo url('/'); ?>/styles/product_responsive.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo url('/'); ?>/styles/main_styles.css">
        <link rel="stylesheet" type="text/css"
        href="<?php echo url('/'); ?>/styles/main_responsive.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo url('/'); ?>/styles/monCompte.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo url('/'); ?>/styles/button_styles.css">
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
                                    <div><a href="{{ route('dashboard') }}">{{ Auth::user()->name }}</a></div>
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
                                        <div class="wishlist_count">{{ Auth::user()->wishlist->count() }}</div>
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
                                        <li><a href="Boutique">Boutique<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="projets">Projets DIY <i class="fas fa-chevron-down"></i></a></li>
                                    </ul>
                                </div>

                                <!-- Menu Trigger -->

                                <div class="menu_trigger_container ml-auto">
                                    <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                        <div class="menu_burger">
                                            <div class="menu_trigger_text">menu</div>
                                            <div class="cat_burger menu_burger_inner">
                                                <span></span><span></span><span></span>
                                            </div>
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
                                        <input class="page_menu_search_input" id="search" name="q" value="{{ request()->q ?? '' }}" required="required"
                                            type="search" placeholder="Search for products...">
                                    </form>
                                </div>
                                <li class="page_menu_item">
                                    <a href="{{ route('index') }}">Accueil<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item">
                                    <a href="index#popular">Catégories populaires<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item">
                                    <a href="Boutique">Boutique<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item">
                                    <a href="projets">Projets DIY<i class="fa fa-angle-down"></i></a>
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
                        <a href="#">Mon Compte</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!--Mon Compte-->
        <section class="jumbotron text-center" style="background-image:url(<?php echo url('/'); ?>/images/banner_background.jpg)">
            <div class="container">
                <h1 class="jumbotron-heading">Détails du compte</h1>
            </div>
        </section>
        <div class="container mb-4">
            <section>
                <div class="monCompteEcom  row">
                    <div class="monCompte col-lg-4 d-flex">
                        <nav>
                            <li class="monCompte-navigation-link"><a href="{{ route('dashboard') }}">Tableau de bord</a>
                            </li>
                            <li class="monCompte-navigation-link"><a href="{{ route('commande') }}">Commandes</a></li>
                            <li class="monCompte-navigation-link"><a href="{{ route('adresse') }}">Adresses</a></li>
                            <li class="monCompte-navigation-link" style="background-color: #fbfbfb"><a
                                    style="color:black;" href="#">Détails du compte</a></li>
                            <li class="monCompte-navigation-link">
                                <form method="POST" style="text-align: center;" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ _('Déconnexion') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </li>
                        </nav>
                    </div>
                    <div class="mon-Compte col-lg-8">
                        <div>
                            <div>
                                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                                    <br/>
                                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                        @livewire('profile.update-profile-information-form')

                                        <x-jet-section-border />
                                    @endif
                                    <br/>
                                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                        <div class="mt-10 sm:mt-0">
                                            @livewire('profile.update-password-form')
                                        </div>

                                        <x-jet-section-border />
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
                                <li><a href="{{ route('dashboard') }}">Mon Compte</a></li>
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
</body>

</html>
