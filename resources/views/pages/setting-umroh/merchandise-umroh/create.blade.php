<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Tambah Data Kelengkapan Registrasi Umroh</h3>
                        </div>
                    </div>

                    <div class="mt-5 container">
                        <form action="{{ route('merchandise-umroh.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="urutan_tampil" class="form-label">Urutan Tampil</label>
                                <input type="text" name="urutan_tampil" id="urutan_tampil"
                                    class="form-control"required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_merchandise" class="form-label">Nama Merchandise</label>
                                <input type="text" name="nama_merchandise" id="nama_merchandise" class="form-control"
                                    required>
                            </div>


                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
