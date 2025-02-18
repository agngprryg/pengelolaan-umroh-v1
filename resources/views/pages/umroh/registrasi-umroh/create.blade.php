<x-app-layout :assets="$assets ?? []">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
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
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="mb-3 ">
                                        <label for="nomor_id" class="form-label">Nomer ID</label>
                                        <input type="text" name="nomor_id" id="nomor_id" class="form-control"
                                            value="{{ $no_id }}" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="paket_umroh" class="form-label">Paket Umroh</label>
                                        <select name="paket_umroh" id="paket_umroh" class="form-select" required>
                                            <option selected disabled>-- pilih paket umroh --</option>
                                            @foreach ($paket as $p)
                                                <option value="{{ $p->nama_paket }}">{{ $p->nama_paket }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 ">
                                        <label for="jadwal_keberangkatan" class="form-label">Jadwal
                                            Keberangkatan</label>
                                        <input type="text" name="jadwal_keberangkatan" id="jadwal_keberangkatan"
                                            class="form-control" readonly>
                                    </div>

                                    <div class="mb-3 ">
                                        <label for="fasilitas" class="form-label">Fasilitas</label>
                                        <input type="text" name="fasilitas" id="fasilitas" class="form-control"
                                            readonly>
                                    </div>

                                    <div class="mb-3 ">
                                        <label for="sisa_kursi" class="form-label">Sisa Kursi</label>
                                        <input type="text" name="sisa_kursi" id="sisa_kursi" class="form-control"
                                            readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="agen" class="form-label">Agen/Rekomendator</label>
                                        <select name="agen" id="agen" class="form-select"required>
                                            <option selected disabled>-- pilih Agen --</option>
                                            @foreach ($agen as $a)
                                                <option value="{{ $a->nama_agen }}">{{ $a->nama_agen }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal_pendaftaran" class="form-label">Tanggal Pendaftaran</label>
                                        <input type="date" name="tanggal_pendaftaran" id="tanggal_pendaftaran"
                                            class="form-control"required>
                                    </div>


                                    <div class="mb-3">
                                        <label for="tanggal_berangkat" class="form-label">tanggal berangkat</label>
                                        <input type="date" name="tanggal_berangkat" id="tanggal_berangkat"
                                            class="form-control"required>
                                    </div>
                                </div>
                            </div>


                            <div class="mb-2">
                                <h4 class="mb-3">Data Pribadi</h4>
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
                                        <label for="nama_ayah" class="form-label">Nama Ayah</label>
                                        <input type="text" name="nama_ayah" id="nama_ayah"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik" class="form-label">NIK/No KTP</label>
                                        <input type="text" name="nik" id="nik"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" id="tempat_lahir"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="usia" class="form-label">Usia</label>
                                        <input type="text" name="usia" id="usia"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="jenis_kelamin" class="form-label">jenis_kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select"required>
                                            <option selected disabled>-- pilih jenis kelamin --</option>
                                            <option value="laki-laki">Laki Laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
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
                                </div>
                            </div>


                            <div class="mt-5">
                                <h4 class="mb-3">Passpor</h4>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="mb-3">
                                        <label for="no_passpor" class="form-label">No Passpor</label>
                                        <input type="text" name="no_passpor" id="no_passpor"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal_dikeluarkan" class="form-label">Tanggal
                                            Dikeluarkan</label>
                                        <input type="date" name="tanggal_dikeluarkan" id="tanggal_dikeluarkan"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="kota_passpor_dikeluarkan" class="form-label">Kota Passpor
                                            Dikeluarkan</label>
                                        <input type="text" name="kota_passpor_dikeluarkan"
                                            id="kota_passpor_dikeluarkan" class="form-control"required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal_akhir_berlakunya" class="form-label">Tanggal
                                            Akhir Berlakunya</label>
                                        <input type="date" name="tanggal_akhir_berlakunya"
                                            id="tanggal_akhir_berlakunya" class="form-control"required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_telepon" class="form-label">No telepon</label>
                                        <input type="text" name="no_telepon" id="no_telepon"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="handphone" class="form-label">HandPhone</label>
                                        <input type="text" name="handphone" id="handphone"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="kecamatan" class="form-label">kecamatan</label>
                                        <input type="text" name="kecamatan" id="kecamatan"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">email</label>
                                        <input type="email" name="email" id="email"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="kelurahan" class="form-label">kelurahan</label>
                                        <input type="text" name="kelurahan" id="kelurahan"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="kode_pos" class="form-label">kode pos</label>
                                        <input type="text" name="kode_pos" id="kode_pos"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat_rumah" class="form-label">Alamat Rumah</label>
                                        <input type="text" name="alamat_rumah" id="alamat_rumah"
                                            class="form-control"required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="merokok" class="form-label">Merokok</label>
                                        <select name="merokok" id="merokok" class="form-select"required>
                                            <option selected disabled>-- pilih Satu --</option>
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="memiliki_penyakit_khusus" class="form-label">Memiliki Penyakit
                                            Khusus</label>
                                        <select name="memiliki_penyakit_khusus" id="memiliki_penyakit_khusus"
                                            class="form-select"required>
                                            <option selected disabled>-- pilih Satu --</option>
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="apakah_perlu_penanganan_khusus" class="form-label">Apakah Perlu
                                            Penanganan Khusus</label>
                                        <select name="apakah_perlu_penanganan_khusus"
                                            id="apakah_perlu_penanganan_khusus" class="form-select"required>
                                            <option selected disabled>-- pilih Satu --</option>
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
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

                                    <div class="mb-3">
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

                            <div class=" mt-5 mb-5">
                                <h4 class="mb-4">Data Merchandise yang sudah diterima</h4>

                                @foreach ($merchandise as $m)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="merchandise_diterima"
                                            value="{{ $m->nama_merchandise }}" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ $m->nama_merchandise }}
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
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#paket_umroh").change(function() {
            var paketName = $(this).val();
            if (paketName) {
                $.ajax({
                    url: "/umroh/get-paket-id/" + paketName,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#jadwal_keberangkatan").val(data.jadwal.tanggal_berangkat);
                        $("#fasilitas").val(data.paket_umroh.fasilitas);
                        $("#sisa_kursi").val(data.jadwal.jumlah_seat);
                    }
                });
            } else {
                $("#jadwal_keberangkatan").val('');
                $("#fasilitas").val('');
            }
        });
    });
</script>
