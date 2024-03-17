<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @foreach ($paketWisata as $item)
        <title>{{ $item->nama_paket }}</title>
    @endforeach
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/detailPaketWisataLanding.css">
</head>
<body class="">
    <div class="d-flex p-3" >
        @foreach ($paketWisata as $paket)
            <div class="left" style="width: 50vw">
                <div class="images">
                    <img src="{{ asset('uploads/paketWisata_images') }}/{{ $paket->foto1 }}">
                    <div class="small-images">
                        <img src="{{ asset('uploads/paketWisata_images') }}/{{ $paket->foto2 }}">
                        <img src="{{ asset('uploads/paketWisata_images') }}/{{ $paket->foto3 }}">
                        <img src="{{ asset('uploads/paketWisata_images') }}/{{ $paket->foto4 }}">
                        <img src="{{ asset('uploads/paketWisata_images') }}/{{ $paket->foto5 }}">
                    </div>
                </div>
            </div>
            <div class="right p-3">
                <div class="d-flex wrap mb-3 namaPaket">{{ $paket->nama_paket }}</div>
                <div class="d-flex wrap deskripsi">
                    <div class="header">Deskripsi: </div>
                    <div class="content mx-2"> {{ $paket->deskripsi }}</div>
                </div>
                <div class="d-flex wrap fasilitas">
                    <div class="header">Fasilitas: </div>
                    <div class="content mx-2"> {{ $paket->fasilitas }}</div>
                </div>
                <div class="d-flex wrap itinerary">
                    <div class="header">Itinerary: </div>
                    <div class="content mx-2"> {{ $paket->itinerary }}</div>
                </div>
                <div class="d-flex wrap harga">
                    <div class="header">Harga: </div>
                    <div class="content mx-2"> Rp.{{ number_format($harga) }},--</div>
                </div>
                <br>
                <hr>
                <br>
                <form action="{{ route('reservasiPelanggan', $paket->id) }}">
                <div class="action">
                    <button type="submit" class="btn-pesan">PESAN</button>
                    <button class="btn-save">&nbsp;SAVE</button>
                </div>
                </form>
                
            </div>
        @endforeach
    </div>

</body>
</html>
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @foreach ($paketWisata as $item)
        <title>{{ $item->nama_paket }}</title>
    @endforeach
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/detailPaketWisataLanding.css">
</head>
<body>
    <main>
        @foreach ($paketWisata as $paket)
        <header>
            <h1>{{ $paket->nama_paket }}</h1>
        </header>
        <div class="images">
            <div class="big-image">
                <img src="{{ asset('uploads/paketWisata_images') }}/{{ $paket->foto1 }}">
            </div>
            <div class="small-images">
                <img class="sm-img1" src="{{ asset('uploads/paketWisata_images') }}/{{ $paket->foto2 }}">
                <img class="sm-img2" src="{{ asset('uploads/paketWisata_images') }}/{{ $paket->foto3 }}">
                <img class="sm-img3" src="{{ asset('uploads/paketWisata_images') }}/{{ $paket->foto4 }}">
                <img class="sm-img4" src="{{ asset('uploads/paketWisata_images') }}/{{ $paket->foto5 }}">
            </div>
        </div>
        <div class="right p-3">
            <div class="d-flex wrap mb-3 namaPaket">{{ $paket->nama_paket }}</div>
            <div class="d-flex wrap deskripsi">
                <div class="header">Deskripsi: </div>
                <div class="content mx-2"> {{ $paket->deskripsi }}</div>
            </div>
            <div class="d-flex wrap fasilitas">
                <div class="header">Fasilitas: </div>
                <div class="content mx-2"> {{ $paket->fasilitas }}</div>
            </div>
            <div class="d-flex wrap itinerary">
                <div class="header">Itinerary: </div>
                <div class="content mx-2"> {{ $paket->itinerary }}</div>
            </div>
            <br>
            <hr>
            <br>
            <form action="{{ route('reservasiPelanggan', $paket->id) }}">
            <div class="action">
                <button type="submit" class="btn-pesan">PESAN</button>
                <button class="btn-save">&nbsp;SAVE</button>
            </div>
            </form>
            
        </div>
        @endforeach
    </ma>

</body>
</html> --}}