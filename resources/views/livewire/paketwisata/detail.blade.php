<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product detail page</title>

    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="/detail/assets/css/style.css">

    <!--
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;500;700&display=swap" rel="stylesheet">

</head>

<body>

    <!--
    - #HEADER
  -->

    <header class="header">
        <div class="container">

            <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
                <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
            </button>

            <a href="#" class="logo">
                {{-- <img src="/detail/assets/images/logo.svg" width="77" height="20" alt="Nike home"> --}}
                <h1 style="color: black !important">ZT</h1>
            </a>

            <nav class="navbar" data-navbar>

                <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
                    <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
                </button>

                <ul class="navbar-list">
                    <li>
                        <a href="/" class="navbar-link">Home</a>
                    </li>

                </ul>

            </nav>

            <div class="header-action">

                <button class="header-action-btn" aria-label="add to cart">
                    <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
                </button>

                <button class="profile-btn" aria-label="profile">
                    <img src="/detail/assets/images/profile.png" width="100" height="100" alt="profile"
                        class="img">
                </button>

            </div>

            <div class="overlay" data-overlay data-nav-toggler></div>

        </div>
    </header>





    <main>
        <article>

            <!--
        - #PRODUCT
      -->

            <section class="section product" aria-label="product">
                <div class="container">
                    <div class="product-slides">
                        <div class="slider-banner" data-slider>
                            @foreach ($paketWisata as $paket)
                                <figure class="product-banner">
                                    <img src="{{ asset('uploads/paketWisata_images') }}/{{ $paket->foto1 }}"
                                        width="600" height="600" loading="lazy" class="img-cover">
                                </figure>

                                <figure class="product-banner">
                                    <img src="{{ asset('uploads/paketWisata_images') }}/{{ $paket->foto2 }}"
                                        width="600" height="600" loading="lazy" class="img-cover">
                                </figure>

                                <figure class="product-banner">
                                    <img src="{{ asset('uploads/paketWisata_images') }}/{{ $paket->foto3 }}"
                                        width="600" height="600" loading="lazy" class="img-cover">
                                </figure>

                                <figure class="product-banner">
                                    <img src="{{ asset('uploads/paketWisata_images') }}/{{ $paket->foto4 }}"
                                        width="600" height="600" loading="lazy" class="img-cover">
                                </figure>

                                <figure class="product-banner">
                                    <img src="{{ asset('uploads/paketWisata_images') }}/{{ $paket->foto5 }}"
                                        width="600" height="600" loading="lazy" class="img-cover">
                                </figure>
                            @endforeach
                        </div>
                        <button class="slide-btn prev" aria-label="Previous image" data-prev>
                            <ion-icon name="chevron-back" aria-hidden="true"></ion-icon>
                        </button>
                        <button class="slide-btn next" aria-label="Next image" data-next>
                            <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>
                        </button>
                    </div>
                    <div class="product-content">
                        <p class="product-subtitle">Zen Tour</p>
                        <h1 class="h1 product-title">{{ $daftarPaket[0]->nama_paket }}</h1>
                        <p class="product-text">
                          {{ $paketWisata[0]->deskripsi }}
                            {{-- These low-profile sneakers are your perfect casual wear companion. Featuring a
                            durable rubber outer sole, they’ll withstand everything the weather can offer. --}}
                        </p>
                        <div class="wrapper">
                            <span class="price" data-total-price>Rp.{{ number_format($hargaDiskon) }},-</span>
                            <span class="badge">{{ number_format($diskon) }}%</span>
                            <del class="del">Rp.{{ number_format($harga) }},-</del>
                        </div>
                        <div class="btn-group">
                            <div class="counter-wrapper">
                                <div class="counter-btn">
                                    <ion-icon name="remove-outline"></ion-icon>
                                </div>
                                <span class="span" data-qty>{{ $daftarPaket[0]->jumlah_peserta }}</span>
                                &nbsp;<ion-icon name="people"></ion-icon>
                                <div class="counter-btn" >
                                    <ion-icon name="add-outline"></ion-icon>
                                </div>
                            </div>
                            {{-- <a href="{{ route('reservasiPelanggan', $paketWisata[0]->id) }}" class="cart-btn"> --}}
                            <a href="{{ route('reservasiPelanggan', $paketWisata[0]->id) }}" class="cart-btn">
                                <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
                                <span class="span">PESAN SEKARANG</span>
                            </a>
                        </div>
                    </div>
                    <div>
                        @foreach ($paketWisata as $paket)
                            <div>Fasilitas: {{ $paket->fasilitas }}</div><br>             
                            <div>Itinerary: {{ $paket->itinerary }}</div>                        
                        @endforeach
                    </div>
                </div>
            </section>
        </article>
    </main>




    <!--
    - custom js link
  -->
    <script src="/detail/assets/js/script.js"></script>

    <!--
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
