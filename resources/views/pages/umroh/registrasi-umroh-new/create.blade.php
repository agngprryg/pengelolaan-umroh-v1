<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Tambah Data Calon Umroh </h3>
                        </div>
                    </div>

                    <div class="mt-5 container">
                        <form action="{{ route('registrasi-umroh-new.store') }}" method="POST">
                            @csrf

                            <div class="row g-3">

                                <div class="mb-3 col-md-6 col-12">
                                    <label for="no_registrasi" class="form-label">No Registrasi</label>
                                    <input type="text" name="no_registrasi" id="no_registrasi" class="form-control"
                                        value="{{ $no_registrasi }}" readonly>
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label for="no_ktp" class="form-label">No KTP</label>
                                    <input type="text" name="no_ktp" id="no_ktp" class="form-control" required>
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label for="nama_paspor" class="form-label">Nama Sesuai Paspor</label>
                                    <input type="text" name="nama_paspor" id="nama_paspor" class="form-control"
                                        required>
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label for="nama_ayah" class="form-label">Nama Ayah Kandung</label>
                                    <input type="text" name="nama_ayah" id="nama_ayah" class="form-control" required>
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label for="ttl" class="form-label">Tempat/Tanggal Lahir</label>
                                    <input type="text" name="ttl" id="ttl" class="form-control" required>
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control"
                                        required>
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                                    <input type="text" name="status_perkawinan" id="status_perkawinan"
                                        class="form-control" required>
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label for="alamat_ktp" class="form-label">Alamat Sesuai KTP</label>
                                    <input type="text" name="alamat_ktp" id="alamat_ktp" class="form-control"
                                        required>
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label for="alamat_tempat_tinggal" class="form-label">Alamat Tempat Tinggal</label>
                                    <input type="text" name="alamat_tempat_tinggal" id="alamat_tempat_tinggal"
                                        class="form-control" required>
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label for="kode_pos" class="form-label">Kode Pos</label>
                                    <input type="number" name="kode_pos" id="kode_pos" class="form-control" required>
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label for="no_telepon" class="form-label">No Telepon</label>
                                    <input type="number" name="no_telepon" id="no_telepon" class="form-control"
                                        required>
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label for="pendidikan" class="form-label">Pendidikan</label>
                                    <input type="text" name="pendidikan" id="pendidikan" class="form-control"
                                        required>
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control"
                                        required>
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label for="nama_suami" class="form-label">Relationship/ Nama Suami</label>
                                    <input type="text" name="nama_suami" id="nama_suami" class="form-control"
                                        required>
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label for="hubungan_keluarga" class="form-label">Hubungan Keluarga</label>
                                    <input type="text" name="hubungan_keluarga" id="hubungan_keluarga"
                                        class="form-control" required>
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label for="nomor_paspor" class="form-label">Nomor Paspor</label>
                                    <input type="number" name="nomor_paspor" id="nomor_paspor" class="form-control"
                                        required>
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label for="tempat_dikeluarkan" class="form-label">Tempat Dikeluarkan nya</label>
                                    <input type="text" name="tempat_dikeluarkan" id="tempat_dikeluarkan"
                                        class="form-control" required>
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label for="golongan_darah" class="form-label">Golongan Darah</label>
                                    <input type="text" name="golongan_darah" id="golongan_darah"
                                        class="form-control" required>
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label for="ukuran_baju" class="form-label">Ukuran Baju</label>
                                    <input type="text" name="ukuran_baju" id="ukuran_baju" class="form-control"
                                        required>
                                </div>

                                <div class="row g-3">
                                    <label for="">Ciri Ciri :</label>
                                    <div class="mb-3 col-md-3 col-12">
                                        <label for="rambut" class="form-label">Rambut</label>
                                        <input type="text" name="rambut" id="rambut" class="form-control"
                                            required>
                                    </div>

                                    <div class="mb-3 col-md-3 col-12">
                                        <label for="alis" class="form-label">Alis</label>
                                        <input type="text" name="alis" id="alis" class="form-control"
                                            required>
                                    </div>

                                    <div class="mb-3 col-md-3 col-12">
                                        <label for="hidung" class="form-label">Hidung</label>
                                        <input type="text" name="hidung" id="hidung" class="form-control"
                                            required>
                                    </div>

                                    <div class="mb-3 col-md-3 col-12">
                                        <label for="muka" class="form-label">Muka</label>
                                        <input type="text" name="muka" id="muka" class="form-control"
                                            required>
                                    </div>

                                    <div class="mb-3 col-md-3 col-12">
                                        <label for="tinggi_badan" class="form-label">Tinggi Badan</label>
                                        <input type="text" name="tinggi_badan" id="tinggi_badan"
                                            class="form-control" required>
                                    </div>

                                    <div class="mb-3 col-md-3 col-12">
                                        <label for="berat_badan" class="form-label">Berat Badan</label>
                                        <input type="text" name="berat_badan" id="berat_badan"
                                            class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label for="paket_umroh" class="form-label">Paket Umroh</label>
                                    <select name="paket_umroh[]" id="paket_umroh" class="form-select">
                                        <option selected disabled>-- Pilih Paket Umroh --</option>
                                        @foreach ($paket_umroh as $p)
                                            <option value="{{ $p->id }}"> {{ $p->nama_paket }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Menampilkan Jadwal Keberangkatan -->
                                <div id="jadwal_keberangkatan">
                                    <p><strong>Tanggal Berangkat:</strong> <span id="tanggal_berangkat"></span></p>
                                    <p><strong>Tanggal Selesai:</strong> <span id="tanggal_selesai"></span></p>
                                    <p><strong>Durasi:</strong> <span id="durasi"></span> hari</p>
                                    <p><strong>Jumlah Seat:</strong> <span id="jumlah_seat"></span></p>
                                </div>



                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#paket_umroh").change(function() {
            var paketId = $(this).val(); // Ambil ID Paket Umroh yang dipilih

            if (paketId) {
                $.ajax({
                    url: "/umroh/get-paket-id/" +
                        paketId, // Pastikan URL sesuai dengan route yang benar
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        if (response.data && response.data.jadwal_keberangkatan) {
                            $("#tanggal_berangkat").text(response.data.jadwal_keberangkatan
                                .tanggal_berangkat);
                            $("#tanggal_selesai").text(response.data.jadwal_keberangkatan
                                .tanggal_selesai);
                            $("#durasi").text(response.data.jadwal_keberangkatan.durasi);
                            $("#jumlah_seat").text(response.data.jadwal_keberangkatan
                                .jumlah_seat);
                        } else {
                            alert("Jadwal keberangkatan tidak ditemukan!");
                        }
                    },
                    error: function() {
                        alert("Terjadi kesalahan saat mengambil data.");
                    }
                });
            } else {
                // Kosongkan data jika tidak ada paket dipilih
                $("#tanggal_berangkat").text("");
                $("#tanggal_selesai").text("");
                $("#durasi").text("");
                $("#jumlah_seat").text("");
            }
        });
    });
</script>
