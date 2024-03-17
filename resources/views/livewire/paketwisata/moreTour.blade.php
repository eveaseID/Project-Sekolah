<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>All Tour</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
    <header style="font-size: 20px; font-weight: bolder; background: #ad7847; color: white">
        <div class="text-center">ALL TOUR</div>
    </header>
    <div class="container d-flex wrap justify-content-center">
        @forelse ($paketWisata as $paket)
            <div class="card m-2" style="width: 18rem;">
                <img src="{{ asset('uploads/paketWisata_images') }}/{{ $paket->foto1 }}" class="card-img-top" style="width: 100%; height: 100%">
                <div class="card-body">
                    <h5 class="card-title">{{ $paket->nama_paket }}</h5>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($paket->deskripsi, 100, '...') }}</p>
                    <a href="{{ route('detailPaket', $paket->id) }}" target="_blank" class="btn text-white" style="background: #ad7847;">Read More</a>
                </div>
            </div>
        @empty
            <div>Record Not Found</div>
        @endforelse
    </div>

</body>

</html>
