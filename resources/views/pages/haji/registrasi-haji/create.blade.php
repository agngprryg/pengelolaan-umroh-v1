<x-app-layout :assets="$assets ?? []">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Tambah Data Calon Haji </h3>
                        </div>
                    </div>

                    <form action="{{ route('registrasi-haji.store') }}" method="POST" class="container"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mt-5 container">

                            <h4 class="mb-4">Data Umum Registrasi</h4>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="mb-3">
                                    <label for="no_registrasi" class="form-label">No Registrasi</label>
                                    <input type="text" name="no_registrasi" id="no_registrasi" class="form-control"
                                        value="{{ $no_registrasi }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="tanggal_daftar" class="form-label">Tanggal Daftar</label>
                                    <input type="date" name="tanggal_daftar" id="tanggal_daftar"
                                        class="form-control"required>
                                </div>

                                <div class="mb-3">
                                    <label for="agen" class="form-label">Jenis Haji</label>
                                    <select name="jenis_haji" id="agen" class="form-select"required>
                                        <option selected disabled>-- Pilih Jenis Haji --</option>
                                        @foreach ($jenis_haji as $jh)
                                            <option value="{{ $jh->item_opsi }}">{{ $jh->item_opsi }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="agen" class="form-label">Biaya Registrasi Haji</label>
                                    <select name="biaya_registrasi_haji_id" id="agen" class="form-select"required>
                                        <option selected disabled>-- Pilih Biaya Registrasi Haji --</option>
                                        @foreach ($biaya_registrasi as $br)
                                            <option value="{{ $br->id }}">Rp.
                                                {{ number_format($br->jumlah_biaya) }} =
                                                {{ $br->rincian_biaya }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="agen" class="form-label">Rekomendator/Agen</label>
                                    <select name="agen" id="agen" class="form-select"required>
                                        <option selected disabled>-- Pilih Agen --</option>
                                        @foreach ($agen as $a)
                                            <option value="{{ $a->nama_agen }}">{{ $a->nama_agen }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="tahun_berangkat" class="form-label">Tahun Berangkat</label>
                                    <select name="tahun_berangkat" class="form-select" required>
                                        <option value="">-- Pilih Tahun Berangkat --</option>
                                        @for ($year = date('Y'); $year <= 2040; $year++)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="bps" class="form-label">Bank Penerima Setoran</label>
                                    <select name="bps" id="bps" class="form-select"required>
                                        <option selected disabled>-- Pilih BPS --</option>
                                        @foreach ($bps as $b)
                                            <option value="{{ $b->nama_bps }}">{{ $b->nama_bps }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="no_porsi" class="form-label">No Porsi</label>
                                    <input type="text" name="no_porsi" id="no_porsi" class="form-control"required>
                                </div>

                                <div class="mb-3">
                                    <label for="spph" class="form-label">SPPH</label>
                                    <input type="text" name="spph" id="spph" class="form-control"required>
                                </div>

                                <div class="mb-3">
                                    <label for="no_rekening" class="form-label">No Rekening</label>
                                    <input type="number" name="no_rekening" id="no_rekening"
                                        class="form-control"required>
                                </div>
                            </div>

                        </div>

                        <div class="container mt-5">
                            <h4 class="mb-4">Data Pribadi</h4>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" id="nama_lengkap"
                                        class="form-control"required>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_passport" class="form-label">Nama Passport</label>
                                    <input type="text" name="nama_passport" id="nama_passport"
                                        class="form-control"required>
                                </div>

                                <div class="mb-3">
                                    <label for="alamat_passport" class="form-label">Alamat Passport</label>
                                    <input type="text" name="alamat_passport" id="alamat_passport"
                                        class="form-control"required>
                                </div>

                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK/No KTP</label>
                                    <input type="number" name="nik" id="nik"
                                        class="form-control"required>
                                </div>

                                <div class="mb-3">
                                    <label for="bin_binti" class="form-label">Bin/Binti</label>
                                    <input type="text" name="bin_binti" id="bin_binti"
                                        class="form-control"required>
                                </div>

                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select"required>
                                        <option selected disabled>-- Pilih Jenis Kelamin --</option>
                                        <option value="laki-laki">Laki Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tangal Lahir</label>
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                        class="form-control"required>
                                </div>

                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Kelahiran</label>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                                        class="form-control"required>
                                </div>

                                <div class="mb-3">
                                    <label for="status_pernikahan" class="form-label">Status Pernikahan</label>
                                    <select name="status_pernikahan" id="status_pernikahan"
                                        class="form-select"required>
                                        <option selected disabled>-- pilih Status Pernikahan --</option>
                                        @foreach ($status_pernikahan as $s)
                                            <option value="{{ $s->item_opsi }}"> {{ $s->item_opsi }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="golongan_darah" class="form-label">Golongan Darah</label>
                                    <input type="text" name="golongan_darah" id="golongan_darah"
                                        class="form-control"required>
                                </div>

                                <div class="mb-3">
                                    <label for="pendidikan" class="form-label">Pendidikan</label>
                                    <input type="text" name="pendidikan" id="pendidikan"
                                        class="form-control"required>
                                </div>

                                <div class="mb-3">
                                    <label for="foto" class="form-label">foto</label>
                                    <input type="file" name="foto" id="foto" class="form-control"
                                        accept="image/*">
                                </div>
                            </div>
                        </div>

                        <div class="container mt-5">
                            <h4 class="mb-4">Alamat</h4>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="mb-3">
                                    <label for="jalan" class="form-label">Jalan</label>
                                    <input type="text" name="jalan" id="jalan"
                                        class="form-control"required>
                                </div>

                                <div class="mb-3">
                                    <label for="kelurahan" class="form-label">Kelurahan</label>
                                    <input type="text" name="kelurahan" id="kelurahan"
                                        class="form-control"required>
                                </div>

                                <div class="mb-3">
                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                    <input type="text" name="kecamatan" id="kecamatan"
                                        class="form-control"required>
                                </div>

                                <div class="mb-3">
                                    <label for="kota" class="form-label">Kota/Kabupaten</label>
                                    <input type="text" name="kota" id="kota"
                                        class="form-control"required>
                                </div>

                                <div class="mb-3">
                                    <label for="provinsi" class="form-label">Provinsi</label>
                                    <input type="text" name="provinsi" id="provinsi"
                                        class="form-control"required>
                                </div>

                                <div class="mb-3">
                                    <label for="kode_pos" class="form-label">Kode Pos</label>
                                    <input type="number" name="kode_pos" id="kode_pos"
                                        class="form-control"required>
                                </div>

                                <div class="mb-3">
                                    <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                                    <input type="text" name="alamat_lengkap" id="alamat_lengkap"
                                        class="form-control"required>
                                </div>
                            </div>
                        </div>

                        <div class="container mt-5 mb-5">
                            <h4 class="mb-4">Data Kelengkapan Dokumen</h4>

                            @foreach ($kelengkapan_registrasi as $k)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="dokumen_kelengkapan"
                                        value="{{ $k->nama_dokumen }}" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $k->nama_dokumen }}
                                    </label>
                                </div>
                            @endforeach

                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
