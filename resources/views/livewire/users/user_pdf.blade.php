<head>
    <title>User</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<div class="m-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-header mb-3">
                <h4 class="text-center">
                    Table User
                </h3>
            </div>
            
            <div class="rounded bg-white p-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Aktif</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->level }}</td>
                                @if ($item->aktif == 1)
                                    <td>Aktif</td>
                                    @else
                                    <td>Tidak Aktif</td>
                                @endif
                            </tr>
                        @empty
                            <td colspan="5" class="text-center">Record Not Found</td>    
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>