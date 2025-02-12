<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Data Biaya Registrasi</h3>
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
                            <a href="{{ route('biaya-registrasi.create') }}" class="btn btn-primary">Tambah Data</a>
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tahun</th>
                                    <th>Jumlah Biaya</th>
                                    <th>Rincian Biaya</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($biaya_registrasi as $br)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $br->tahun }} </td>
                                        <td> {{ $br->jumlah_biaya }} </td>
                                        <td> {{ $br->rincian_biaya }} </td>
                                        <td>
                                            <a href="{{ route('biaya-registrasi.show', $br->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('biaya-registrasi.destroy', $br->id) }}"
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
