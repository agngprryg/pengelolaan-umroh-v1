<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Tambah Data Perlengkapan Umroh </h3>
                        </div>
                    </div>

                    <div class="mt-5 container">
                        <form action="{{ route('tambah-cabang') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="data_cabang_id" class="form-label">Cabang</label>
                                <select type="text" name="data_cabang_id" id="data_cabang_id" class="form-select"
                                    required>
                                    <option selected disabled>-- pilih Cabang --</option>
                                    @foreach ($data_cabang as $c)
                                        <option value="{{ $c->id }}">{{ $c->id }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="data_perlengkapan_umroh_id" class="form-label">perlengkapan</label>
                                <select type="text" name="data_perlengkapan_umroh_id" id="data_perlengkapan_umroh_id"
                                    class="form-select" required>
                                    <option selected disabled>-- pilih perlengkapan --</option>
                                    @foreach ($data_perlengkapan as $c)
                                        <option value="{{ $c->id }}">nama barang : {{ $c->nama_barang }} | Stok :
                                            {{ $c->stok }} </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control"required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
