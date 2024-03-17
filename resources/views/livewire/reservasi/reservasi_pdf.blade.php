
<head>
    <title>Reservasi</title>
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
                    Table Reservasi
                </h4>
            </div>
            
            <div class="rounded p-4 bg-white">
                <table class="table table-bordered table-hover align-middle">
                    <thead>
                        <tr style="vertical-align: top">
                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Daftar Paket</th>
                            <th>Tgl Reservasi</th>
                            <th>Harga</th>
                            <th>Peserta</th>
                            <th>Diskon</th>
                            <th>Nilai Diskon</th>
                            <th>Total Bayar</th>
                            <th>Bukti Tf</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @forelse ($reservasi as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->pelanggan->nama_lengkap }}</td>
                                <td>{{ $item->daftar_paket->nama_paket }}</td>
                                <td>{{ date('d-M-y',strtotime($item->tgl_reservasi_wisata)) }}</td>
                                <td>Rp.{{ number_format($item->harga) }}</td>
                                <td>{{ $item->jumlah_peserta }}</td>
                                <td>{{ number_format($item->diskon) }}%</td>
                                <td>Rp.{{ number_format($item->nilai_diskon) }}</td>
                                <td>Rp.{{ number_format($item->total_bayar) }}</td>
                                <td>
                                    <img src="{{ asset('uploads/reservasi_images') }}/{{ $item->file_bukti_tf }}" style="width: 50px; height: 50px; object-fit: cover">
                                </td>
                                <td>
                                    <p class=" 
                                    align-middle
                                    @if ($item->status_reservasi_wisata == 'dibayar')
                                        text-blue
                                    @elseif ($item->status_reservasi_wisata == 'selesai')
                                        text-green
                                    @elseif ($item->status_reservasi_wisata == 'pesan')
                                        text-red
                                    @endif
                                ">{{ $item->status_reservasi_wisata }}</p>
                                </td>
                            </tr>
                        @empty
                            <td colspan="12" class="text-center">Record Not Found</td>    
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>