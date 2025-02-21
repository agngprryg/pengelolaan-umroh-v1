<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Data Perlengkapan Umroh</h3>
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

                        <div class="d-flex gap-5 mb-4">
                            <div class="">
                                <a href="{{ route('data-perlengkapan-umroh.create') }}" class="btn btn-primary">Tambah
                                    Data</a>
                            </div>

                            <form method="GET" action="{{ route('stok-cabang') }}">
                                <select name="cabang" onchange="this.form.submit()" class="form-select">
                                    <option value="">-- Pilih cabang --</option>
                                    @foreach ($data_cabang as $d)
                                        <option value="{{ $d->id }}"> {{ $d->nama_cabang }} </option>
                                    @endforeach
                                </select>
                            </form>
                        </div>


                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Perlengkapan Umroh</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($get_cabang_by_id as $d)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $d->data_perlengkapan_umroh->nama_barang }} </td>
                                        <td> {{ $d->data_perlengkapan_umroh->stok }} </td>
                                        <td>
                                            <a href="{{ route('data-perlengkapan-umroh.show', $d->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('data-perlengkapan-umroh.destroy', $d->id) }}"
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
