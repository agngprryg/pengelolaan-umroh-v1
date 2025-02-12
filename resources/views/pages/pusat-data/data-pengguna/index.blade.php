<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Data Pengguna</h3>
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
                            <a href="{{ route('data-pengguna.create') }}" class="btn btn-primary">Tambah Pengguna</a>
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_penggunas as $data_pengguna)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $data_pengguna->username }} </td>
                                        <td> {{ $data_pengguna->nama_pengguna }} </td>
                                        <td> {{ $data_pengguna->alamat }} </td>
                                        <td> {{ $data_pengguna->no_telepon }} </td>
                                        <td> {{ $data_pengguna->role_data_pengguna->nama_role }} </td>
                                        <td>
                                            <a href="{{ route('data-pengguna.show', $data_pengguna->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('data-pengguna.destroy', $data_pengguna->id) }}"
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
