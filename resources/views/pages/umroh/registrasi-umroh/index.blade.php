<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Data Calon Umroh</h3>
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
                            <a href="{{ route('registrasi-umroh.create') }}" class="btn btn-primary">Tambah Pengguna</a>
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nomor ID</th>
                                    <th>Nama</th>
                                    <th>Bin/Binti</th>
                                    <th>Kota</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $d->no_registrasi }} </td>
                                        <td> {{ $d->nama_lengkap }} </td>
                                        <td> {{ $d->bin_binti }} </td>
                                        <td> {{ $d->kota }} </td>
                                        <td> {{ $d->tanggal_daftar }} </td>
                                        <td>
                                            <a href="{{ route('registrasi-umroh.show', $d->id) }}"
                                                class="btn btn-warning btn-sm">view</a>
                                            <a href="{{ route('registrasi-umroh.edit', $d->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('registrasi-umroh.destroy', $d->id) }}"
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
