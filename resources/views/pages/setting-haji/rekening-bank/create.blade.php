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
                        <form action="{{ route('rekening-bank.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="nama_bank" class="form-label">Nama Bank</label>
                                <input type="text" name="nama_bank" id="nama_bank" class="form-control"required>
                            </div>

                            <div class="mb-3">
                                <label for="cabang" class="form-label">Cabang</label>
                                <input type="text" name="cabang" id="cabang" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="no_rekening" class="form-label">No Rekening</label>
                                <input type="text" name="no_rekening" id="no_rekening" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="atas_nama" class="form-label">Atas Nama</label>
                                <input type="text" name="atas_nama" id="atas_nama" class="form-control" required>
                            </div>


                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
