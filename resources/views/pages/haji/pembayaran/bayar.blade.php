<x-app-layout :assets="$assets ?? []">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Tambah Pembayaran </h3>
                        </div>
                    </div>

                    <div class="mt-5 container">
                        <form action="{{ route('pembayaran-haji', $registrasi->id) }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <h4 class="mb-4">Data Calon Jamaah</h4>
                                <div class="grid grid-cols-2 gap-4">

                                    <input type="text" name="registrasi_haji_id"
                                        value="{{ $registrasi->registrasi_haji->id }}" hidden>

                                    <div class="mb-3">
                                        <label for="no_registrasi" class="form-label">No Registrasi</label>
                                        <input type="text" class="form-control"
                                            value="{{ $registrasi->registrasi_haji->no_registrasi }}" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_registrasi" class="form-label">No Porsi</label>
                                        <input type="text" class="form-control"
                                            value="{{ $registrasi->registrasi_haji->no_porsi }}" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_spph" class="form-label">No SPPH</label>
                                        <input type="text" class="form-control"
                                            value="{{ $registrasi->registrasi_haji->spph }}" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control"
                                            value="{{ $registrasi->registrasi_haji->nama_lengkap }}" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Alamat Lengkap</label>
                                        <input type="text" class="form-control"
                                            value="{{ $registrasi->registrasi_haji->alamat_lengkap }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h4 class="mb-4">Data Pembayaran</h4>
                                <div class="grid grid-cols-2 gap-4">

                                    <div class="mb-3">
                                        <label for="biaya_registrasi" class="form-label">Biaya Registrasi</label>
                                        <input type="text" class="form-control"
                                            value="Rp. {{ number_format($registrasi->registrasi_haji->biaya_registrasi_haji->jumlah_biaya) }}"
                                            readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="sudah_bayar" class="form-label">Sudah Bayar</label>
                                        <input type="text" class="form-control" name="sudah_bayar"
                                            value="{{ $registrasi->sudah_bayar }}" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="sisa_pembayaran" class="form-label">Kurang</label>
                                        <input type="text" class="form-control" name="sisa_pembayaran"
                                            value="{{ $registrasi->sisa_pembayaran }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h4 class="mb-4">Bayar</h4>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="mb-3">
                                        <label for="no_kuitansi" class="form-label">No Kuitansi</label>
                                        <input type="text" class="form-control" name="no_kuitansi"
                                            value="{{ $registrasi->no_kuitansi }}" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal_pembayaran" class="form-label">Tanggal Bayar</label>
                                        <input type="date" class="form-control" name="tanggal_pembayaran" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="jenis_pembayaran" class="form-label">Jenis Pembayaran</label>
                                        <select class="form-select" name="jenis_pembayaran" required>
                                            <option selected disabled>-- pilih jenis pembayaran --</option>
                                            @foreach ($jenis_pembayaran as $j)
                                                <option value="{{ $j->item_opsi }}"> {{ $j->item_opsi }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="jumlah_uang" class="form-label">Jumlah Uang</label>
                                        <input type="number" class="form-control" name="jumlah_uang" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="sisa_pembayaran" class="form-label">Sisa Bayar</label>
                                        <input type="text" class="form-control" name="sisa_pembayaran"
                                            value="{{ $registrasi->sisa_pembayaran }}" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="kembalian" class="form-label">Kembalian</label>
                                        <input type="number" class="form-control"
                                            value="{{ $registrasi->kembalian }}" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-control" name="status" required>
                                            <option selected disabled>-- pilih status --</option>
                                            <option value="lunas">Lunas</option>
                                            <option value="belum lunas">Belum Lunas</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tujuan_pembayaran" class="form-label">Untuk Pembayaran</label>
                                        <input type="text" class="form-control" name="tujuan_pembayaran" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="petugas" class="form-label">Petugas</label>
                                        <input type="text" class="form-control" name="petugas" required>
                                    </div>
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
