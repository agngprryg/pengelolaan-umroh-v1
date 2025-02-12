<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Edit Data Pengguna</h3>
                        </div>
                    </div>

                    <div class="mt-5 container">
                        <form action="{{ route('data-pengguna.update', $data_pengguna->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    value="{{ $data_pengguna->username }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                                <input type="text" name="nama_pengguna" id="nama_pengguna" class="form-control"
                                    value="{{ $data_pengguna->nama_pengguna }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control"
                                    value="{{ $data_pengguna->alamat }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="no_telepon" class="form-label">No Telepon</label>
                                <input type="text" name="no_telepon" id="no_telepon" class="form-control"
                                    value="{{ $data_pengguna->no_telepon }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select type="text" name="role_id" id="role" class="form-select" required>
                                    <option selected disabled>-- pilih role --</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ $role->id == $data_pengguna->role_id ? 'selected' : '' }}>
                                            {{ $role->nama_role }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
