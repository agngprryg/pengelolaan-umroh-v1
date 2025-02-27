<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Tambah Data Kelengkapan Umroh</h3>
                        </div>
                    </div>

                    <div class="mt-5 container">
                        <form action="{{ route('kelengkapan-umroh.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="perlengkapan_umroh_id" class="form-label">perlengkapan_umroh_id</label>
                                <select name="perlengkapan_umroh_id" id="perlengkapan_umroh_id" class="form-select"
                                    required>
                                    <option value="">-- Pilih --</option>
                                    @foreach ($barang as $b)
                                        <option value="{{ $b->id }}"> {{ $b->nama_barang }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" name="keterangan" id="keterangan" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="harga_beli" class="form-label">Harga Beli</label>
                                <input type="number" name="harga_beli" id="harga_beli" class="form-control" required>
                            </div>


                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
