
{{-- ! Modal  CREATE Karyawan --}}
<div class="modal fade absolute" id="createKaryawan" tabindex="-1" aria-labelledby="createKaryawanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 " id="createKaryawanLabel">Pilih Email</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="shadow-sm p-4">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <th>No</th>
                                <th>Paket Wisata</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($users as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs" wire:click="select({{ $item->id }})" data-bs-dismiss="modal">
                                            Pilih
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                    <td colspan="2" class="text-center">Not Found</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ! Modal  UPDATE Karyawan --}}
<div class="modal fade absolute" id="updateKaryawan" tabindex="-1" aria-labelledby="updateKaryawanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 " id="updateKaryawanLabel">Pilih Email</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="shadow-sm p-4">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <th>No</th>
                                <th>Paket Wisata</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($users as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs" wire:click="select({{ $item->id }})" data-bs-dismiss="modal">
                                            Pilih
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                    <td colspan="2" class="text-center">Not Found</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
