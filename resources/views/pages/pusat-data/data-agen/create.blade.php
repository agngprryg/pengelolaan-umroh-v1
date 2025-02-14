<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Tambah Data Data Agen </h3>
                        </div>
                    </div>

                    <div class="mt-5 container">
                        <form action="{{ route('data-agen.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="nama_agen" class="form-label">Nama Agen</label>
                                <input type="text" name="nama_agen" id="nama_agen" class="form-control"required>
                            </div>

                            <div class="mb-3">
                                <label for="grup_agen" class="form-label">Grup Agen</label>
                                <select type="text" name="grup_agen" id="grup_agen" class="form-control" required>
                                    <option selected disabled>-- Pilih Grup Agen --</option>
                                    <option value="KBIH">KBIH</option>
                                    <option value="Umroh">Umroh</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="no_telepon" class="form-label">No Telepon</label>
                                <input type="text" name="no_telepon" id="no_telepon" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select type="text" name="status" id="Jenis opsi" class="form-select" required>
                                    <option selected disabled>-- pilih Status --</option>
                                    <option value="aktif">aktif</option>
                                    <option value="nonaktif">nonaktif</option>
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
