<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Tambah Data Calon Jamaah Umroh</h3>
                        </div>
                    </div>

                    <div class="mt-5 container row">
                        <form action="{{ route('registrasi-umroh.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-2">
                                <h4 class="mb-4">Pendaftaran Umroh Baru</h4>
                                <div class="row g-3">
                                    <div class="mb-3 col-md-6 col-12 ">
                                        <label for="nomor_id" class="form-label">Nomer ID</label>
                                        <input type="text" name="nomor_id" id="nomor_id" class="form-control"
                                            value="{{ $no_id }}" readonly>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="paket_umroh_id" class="form-label">Paket Umroh</label>
                                        <select name="paket_umroh_id" id="paket_umroh_id" class="form-select" required>
                                            <option selected disabled>-- pilih paket umroh --</option>
                                            @foreach ($paket as $p)
                                                <option value="{{ $p->id }}">{{ $p->nama_paket }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12 ">
                                        <label for="jadwal_keberangkatan" class="form-label">Jadwal
                                            Keberangkatan</label>
                                        <input type="text" id="jadwal_keberangkatan" class="form-control" readonly
                                            placeholder="silahkan pilih paket umroh terlebih dahulu">
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="tanggal_berangkat" class="form-label">tanggal berangkat</label>
                                        <input type="date" id="tanggal_berangkat" class="form-control" readonly>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                                        <select id="tipe_kamar" class="form-select">
                                            <option value="">Silahkan pilih paket umroh terlebih dahulu</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12 ">
                                        <label for="harga" class="form-label">Harga</label>
                                        <input type="text" id="harga" class="form-control" readonly
                                            placeholder="silahkan pilih Tipe Kamar terlebih dahulu">
                                    </div>

                                    <div class="mb-3 col-md-6 col-12 ">
                                        <label for="sisa_kursi" class="form-label">Sisa Kursi</label>
                                        <input type="text" id="sisa_kursi" class="form-control" readonly
                                            placeholder="silahkan pilih paket umroh terlebih dahulu">
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="hotel" class="form-label">Hotel</label>
                                        <select id="hotel" class="form-select">
                                            <option value="">Silahkan pilih paket umroh terlebih dahulu</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="pesawat" class="form-label">Pesawat</label>
                                        <select id="pesawat" class="form-select">
                                            <option value="">Silahkan pilih paket umroh terlebih dahulu</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="agen" class="form-label">Agen/Rekomendator</label>
                                        <select name="agen" id="agen" class="form-select"required>
                                            <option selected disabled>-- pilih Agen --</option>
                                            @foreach ($agen as $a)
                                                <option value="{{ $a->nama_agen }}">{{ $a->nama_agen }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="tanggal_pendaftaran" class="form-label">Tanggal Pendaftaran</label>
                                        <input type="date" name="tanggal_pendaftaran" id="tanggal_pendaftaran"
                                            class="form-control"required>
                                    </div>
                                </div>
                            </div>


                            <div class="mb-2">
                                <h4 class="mb-3">Data Pribadi</h4>
                                <div class="row g-3">
                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" id="nama_lengkap"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="nama_passpor" class="form-label">Nama Passport</label>
                                        <input type="text" name="nama_passpor" id="nama_passpor"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="nama_ayah" class="form-label">Nama Ayah</label>
                                        <input type="text" name="nama_ayah" id="nama_ayah"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="nik" class="form-label">NIK/No KTP</label>
                                        <input type="number" name="nik" id="nik"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" id="tempat_lahir"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="kelompok_usia" class="form-label">Kelompok Usia</label>
                                        <select name="kelompok_usia" id="kelompok_usia" class="form-select"required>
                                            <option selected disabled>-- pilih kelompok usia</option>
                                            <option value="Dewasa(12 Tahun Keatas)">Dewasa(12 Tahun Keatas)</option>
                                            <option value="Anak-Anak(2-12 Tahun)">Anak-Anak(2-12 Tahun)</option>
                                            <option value="Balita (0-2 Tahun)">Balita (0-2 Tahun)</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="usia" class="form-label">Usia</label>
                                        <input type="number" name="usia" id="usia"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="jenis_kelamin" class="form-label">jenis_kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select"required>
                                            <option selected disabled>-- pilih jenis kelamin --</option>
                                            <option value="laki-laki">Laki Laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="status_pernikahan" class="form-label">Status
                                            Pernikahan</label>
                                        <select name="status_pernikahan" id="status_pernikahan"
                                            class="form-select"required>
                                            <option selected disabled>-- pilih Status Pernikahan --</option>
                                            @foreach ($status_pernikahan as $s)
                                                <option value="{{ $s->item_opsi }}"> {{ $s->item_opsi }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="nama_mahram" class="form-label">Nama Mahram</label>
                                        <input type="text" name="nama_mahram" id="nama_mahram"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="status_mahram" class="form-label">Status
                                            Mahram</label>
                                        <select name="status_mahram" id="status_mahram" class="form-select"required>
                                            <option selected disabled>-- pilih Status Mahram --</option>
                                            @foreach ($status_mahram as $s)
                                                <option value="{{ $s->item_opsi }}"> {{ $s->item_opsi }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="mt-5">
                                <h4 class="mb-3">Passpor</h4>
                                <div class="row g-3">
                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="no_passpor" class="form-label">No Passpor</label>
                                        <input type="number" name="no_passpor" id="no_passpor"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="tanggal_dikeluarkan" class="form-label">Tanggal
                                            Dikeluarkan</label>
                                        <input type="date" name="tanggal_dikeluarkan" id="tanggal_dikeluarkan"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="kota_passpor_dikeluarkan" class="form-label">Kota Passpor
                                            Dikeluarkan</label>
                                        <input type="text" name="kota_passpor_dikeluarkan"
                                            id="kota_passpor_dikeluarkan" class="form-control"required>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="tanggal_akhir_berlakunya" class="form-label">Tanggal
                                            Akhir Berlakunya</label>
                                        <input type="date" name="tanggal_akhir_berlakunya"
                                            id="tanggal_akhir_berlakunya" class="form-control"required>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="no_telepon" class="form-label">No telepon</label>
                                        <input type="number" name="no_telepon" id="no_telepon"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="handphone" class="form-label">HandPhone</label>
                                        <input type="text" name="handphone" id="handphone"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="kecamatan" class="form-label">kecamatan</label>
                                        <input type="text" name="kecamatan" id="kecamatan"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="email" class="form-label">email</label>
                                        <input type="email" name="email" id="email"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="pekerjaan" class="form-label">pekerjaan</label>
                                        <input type="text" name="pekerjaan" id="pekerjaan"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="pendidikan" class="form-label">Pendidikan Teakhir</label>
                                        <select name="pendidikan_terakhir" id="pendidikan_terakhir"
                                            class="form-select"required>
                                            <option selected disabled>-- pilih pendidikan tearkhir --</option>
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="pernah_pergi_umroh" class="form-label">Pernah Pergi Umroh</label>
                                        <select name="pernah_pergi_umroh" id="pernah_pergi_umroh"
                                            class="form-select"required>
                                            <option selected disabled>-- pilih Satu --</option>
                                            <option value="Pernah">Pernah</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="pernah_pergi_haji" class="form-label">Pernah Pergi Haji</label>
                                        <select name="pernah_pergi_haji" id="pernah_pergi_haji"
                                            class="form-select"required>
                                            <option selected disabled>-- pilih Satu --</option>
                                            <option value="Pernah">Pernah</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="kelurahan" class="form-label">kelurahan</label>
                                        <input type="text" name="kelurahan" id="kelurahan"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="kode_pos" class="form-label">kode pos</label>
                                        <input type="number" name="kode_pos" id="kode_pos"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="alamat_rumah" class="form-label">Alamat Rumah</label>
                                        <input type="text" name="alamat_rumah" id="alamat_rumah"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="merokok" class="form-label">Merokok</label>
                                        <select name="merokok" id="merokok" class="form-select"required>
                                            <option selected disabled>-- pilih Satu --</option>
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="memiliki_penyakit_khusus" class="form-label">Memiliki Penyakit
                                            Khusus</label>
                                        <select name="memiliki_penyakit_khusus" id="memiliki_penyakit_khusus"
                                            class="form-select"required>
                                            <option selected disabled>-- pilih Satu --</option>
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="penyakit" class="form-label">Masukan Penyakit</label>
                                        <input type="text" name="penyakit" id="penyakit"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="apakah_perlu_penanganan_khusus" class="form-label">Apakah Perlu
                                            Penanganan Khusus</label>
                                        <select name="apakah_perlu_penanganan_khusus"
                                            id="apakah_perlu_penanganan_khusus" class="form-select"required>
                                            <option selected disabled>-- pilih Satu --</option>
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="fasilitas_kursi_roda" class="form-label">Fasilitas Kursi
                                            Roda</label>
                                        <select name="fasilitas_kursi_roda" id="fasilitas_kursi_roda"
                                            class="form-select"required>
                                            <option selected disabled>-- pilih Satu --</option>
                                            <option value="Pada Saat Umroh">Pada Saat Umroh</option>
                                            <option value="Pada Saat Umroh & di Airport">Pada Saat Umroh & di Airport
                                            </option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="foto" class="form-label">foto</label>
                                        <input type="file" name="foto" id="foto" class="form-control"
                                            accept="image/*">
                                    </div>
                                </div>
                            </div>

                            <div class=" mt-5 mb-5">
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

                            <div id="dynamic-field">
                                <div class="mb-3 d-flex align-items-end gap-2">
                                    <div>
                                        <label for="perlengkapan_umroh" class="form-label">Perlengkapan Umroh</label>
                                        <select name="perlengkapan_umroh[0][nama_barang]" class="form-select"
                                            required>
                                            <option selected disabled>-- Pilih Satu --</option>
                                            @foreach ($data_perlengkapan as $d)
                                                <option value="{{ $d->nama_barang }}">Nama: {{ $d->nama_barang }} |
                                                    Stok: {{ $d->stok }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label class="form-label">Jumlah</label>
                                        <input type="number" class="form-control w-75"
                                            name="perlengkapan_umroh[0][jumlah_barang]" required>
                                    </div>
                                    <button type="button" class="btn btn-danger remove-field d-none">Hapus</button>
                                    <button type="button" class="btn btn-primary mt-2"
                                        id="add-field">Tambah</button>
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
        let tipeKamarData = []; // Array untuk menyimpan data tipe kamar
        let hotelData = []; // Array untuk menyimpan data hotel
        let pesawatData = [];

        $("#paket_umroh_id").change(function() {
            var paketName = $(this).val();
            if (paketName) {
                $.ajax({
                    url: "/umroh/get-paket-id/" + paketName,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        // Update jadwal keberangkatan
                        $("#jadwal_keberangkatan").val(
                            `${data.data.jadwal_keberangkatan.tanggal_berangkat} s/d ${data.data.jadwal_keberangkatan.tanggal_selesai}`
                        );
                        $("#sisa_kursi").val(data.data.jadwal_keberangkatan.jumlah_seat);
                        $("#tanggal_berangkat").val(data.data.jadwal_keberangkatan
                            .tanggal_berangkat);

                        // Menyimpan data tipe kamar dan hotel untuk digunakan nanti
                        tipeKamarData = data.data.tipe_kamar;
                        hotelData = data.data.hotel;
                        pesawatData = data.data.pesawat;

                        // **Update Select Tipe Kamar**
                        var tipeKamarSelect = $("#tipe_kamar");
                        tipeKamarSelect.empty().append(
                            '<option value="">Pilih Tipe Kamar</option>');

                        if (Array.isArray(tipeKamarData)) {
                            tipeKamarData.forEach(function(kamar) {
                                tipeKamarSelect.append(
                                    `<option value="${kamar.harga}">${kamar.tipe_kamar}</option>`
                                );
                            });
                        } else {
                            tipeKamarSelect.append(
                                '<option value="">Data tipe kamar tidak tersedia</option>'
                            );
                        }

                        // **Update Select Hotel**
                        var hotelSelect = $("#hotel");
                        hotelSelect.empty().append('<option value="">Pilih Hotel</option>');

                        if (Array.isArray(hotelData)) {
                            hotelData.forEach(function(hotel) {
                                hotelSelect.append(
                                    `<option value="${hotel.lama_hari}" data-nama="${hotel.nama_hotel}">${hotel.nama_hotel} - ${hotel.lokasi}</option>`
                                );
                            });
                        } else {
                            hotelSelect.append(
                                '<option value="">Data hotel tidak tersedia</option>');
                        }

                        // **Update Select Pesawat**
                        var pesawatSelect = $("#pesawat");
                        pesawatSelect.empty().append(
                            '<option value="">Pilih Pesawat</option>');

                        if (Array.isArray(pesawatData)) {
                            pesawatData.forEach(function(pesawat) {
                                pesawatSelect.append(
                                    `<option value="${pesawat.maskapai}" data-nama="${pesawat.maskapai}">${pesawat.maskapai} - ${pesawat.rute}</option>`
                                );
                            });
                        } else {
                            pesawatSelect.append(
                                '<option value="">Data pesawat tidak tersedia</option>');
                        }

                        // Reset harga dan lama hari ketika paket berubah
                        $("#harga").val('');
                        $("#lama_hari").val('');
                    }
                });
            } else {
                // Reset semua input jika tidak ada paket yang dipilih
                $("#jadwal_keberangkatan, #sisa_kursi, #tanggal_berangkat, #harga, #lama_hari").val('');
                $("#tipe_kamar").empty().append(
                    '<option value="">Silahkan pilih Tipe Kamar terlebih dahulu</option>');
                $("#hotel").empty().append(
                    '<option value="">Silahkan pilih Hotel terlebih dahulu</option>');
            }
        });

        // **Event listener untuk select tipe kamar**
        $("#tipe_kamar").change(function() {
            var selectedHarga = $(this).val();
            $("#harga").val(selectedHarga ? `Rp ${parseInt(selectedHarga).toLocaleString()}` : '');
        });

        // **Event listener untuk select hotel**
        $("#hotel").change(function() {
            var selectedLamaHari = $(this).val();
            $("#lama_hari").val(selectedLamaHari ? `${selectedLamaHari} Hari` : '');
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let index = 1; // Mulai index dari 1 karena index 0 sudah ada

        document.getElementById("add-field").addEventListener("click", function() {
            const container = document.getElementById("dynamic-field");
            const newField = document.createElement("div");
            newField.classList.add("mb-3", "d-flex", "align-items-end", "gap-2");

            newField.innerHTML = `
                <div>
                    <label class="form-label">Perlengkapan Umroh</label>
                    <select name="perlengkapan_umroh[${index}][nama_barang]" class="form-select" required>
                        <option selected disabled>-- Pilih Satu --</option>
                        @foreach ($data_perlengkapan as $d)
                            <option value="{{ $d->nama_barang }}">Nama: {{ $d->nama_barang }} | Stok: {{ $d->stok }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="form-label">Jumlah</label>
                    <input type="number" class="form-control w-75" name="perlengkapan_umroh[${index}][jumlah_barang]" required>
                </div>
                <button type="button" class="btn btn-danger remove-field">Hapus</button>
            `;

            container.appendChild(newField);
            index++;

            // Event listener untuk tombol hapus
            newField.querySelector(".remove-field").addEventListener("click", function() {
                newField.remove();
                reindexFields();
            });
        });

        function reindexFields() {
            const fields = document.querySelectorAll("#dynamic-field > div");
            fields.forEach((field, newIndex) => {
                field.querySelector("select").setAttribute("name",
                    `perlengkapan_umroh[${newIndex}][nama_barang]`);
                field.querySelector("input").setAttribute("name",
                    `perlengkapan_umroh[${newIndex}][jumlah_barang]`);
            });
        }
    });
</script>
