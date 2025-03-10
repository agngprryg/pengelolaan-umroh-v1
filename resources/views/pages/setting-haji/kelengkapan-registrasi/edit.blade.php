<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Tambah Data Kelengkapan Registrasi Haji</h3>
                        </div>
                    </div>

                    <div class="mt-5 container">
                        <form action="{{ route('kelengkapan-registrasi-haji.update', $data->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="urutan_tampil" class="form-label">Urutan Tampil</label>
                                <input type="text" name="urutan_tampil" id="urutan_tampil" class="form-control"
                                    value="{{ $data->urutan_tampil }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_dokumen" class="form-label">Nama Dokumen</label>
                                <input type="text" name="nama_dokumen" id="nama_dokumen" class="form-control"
                                    value="{{ $data->nama_dokumen }}" required>
                            </div>


                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
