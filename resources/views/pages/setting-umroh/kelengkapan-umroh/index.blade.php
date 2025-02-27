<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Data Paket Umroh</h3>
                        </div>
                    </div>


                    <div class="container mt-5">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="mb-4">
                            <a href="{{ route('kelengkapan-umroh.create') }}" class="btn btn-primary">Tambah
                                Data</a>
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Item</th>
                                    <th>Keterangan</th>
                                    <th>Harga Beli</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $d->perlengkapan_umroh->nama_barang }} </td>
                                        <td> {{ $d->keterangan }} </td>
                                        <td>
                                            Rp. {{ number_format($d->harga_beli) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('kelengkapan-umroh.show', $d->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('kelengkapan-umroh.destroy', $d->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
