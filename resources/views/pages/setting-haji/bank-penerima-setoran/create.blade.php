<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Tambah Data Rekening Bank </h3>
                        </div>
                    </div>

                    <div class="mt-5 container">
                        <form action="{{ route('bank-penerima-setoran.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="nama_bps" class="form-label">Nama BPS</label>
                                <input type="text" name="nama_bps" id="nama_bps" class="form-control"required>
                            </div>

                            <div class="mb-3">
                                <label for="kode_bank" class="form-label">Kode Bank</label>
                                <input type="text" name="kode_bank" id="kode_bank" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="cabang" class="form-label">Cabang</label>
                                <input type="text" name="cabang" id="cabang" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" required>
                            </div>


                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
