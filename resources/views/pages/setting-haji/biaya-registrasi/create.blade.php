<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Tambah Data Biaya Registrasi Haji</h3>
                        </div>
                    </div>

                    <div class="mt-5 container">
                        <form action="{{ route('biaya-registrasi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="Tahun" class="form-label">Tahun</label>
                                <select name="tahun" class="form-select" required>
                                    <option value="">Pilih Tahun</option>
                                    @for ($year = date('Y'); $year >= 2000; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_biaya" class="form-label">Jumlah Biaya</label>
                                <input type="text" name="jumlah_biaya" id="jumlah_biaya"
                                    class="form-control"required>
                            </div>

                            <div class="mb-3">
                                <label for="rincian_biaya" class="form-label">Rincian Biaya</label>
                                <input type="text" name="rincian_biaya" id="rincian_biaya" class="form-control"
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
