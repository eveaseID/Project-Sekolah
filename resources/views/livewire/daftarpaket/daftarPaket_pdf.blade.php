
<head>
    <title>Daftar Paket</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<div class="m-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-header mb-5">
                <h4 class="text-center">
                    Table Daftar Paket
                </h4>
            </div>
            
            <div class=" rounded bg-white p-4">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Paket</th>
                            <th>Paket Wisata</th>
                            <th>Jumlah Peserta</th>
                            <th>Harga Paket</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($daftarPaket as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->nama_paket }}</td>
                                <td>{{ $item->paket_wisata->nama_paket }}</td>
                                <td>{{ $item->jumlah_peserta }}</td>
                                <td>Rp.{{ number_format($item->harga_paket, 2) }}</td>

                            </tr>
                        @empty
                            <td colspan="6" class="text-center">Record Not Found</td>    
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>