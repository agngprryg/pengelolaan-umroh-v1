<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Tambah Data Jadwal Keberangkatan </h3>
                        </div>
                    </div>

                    <div class="mt-5 container">
                        <form action="{{ route('jadwal-keberangkatan.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="nama_paket" class="form-label">Nama Paket</label>
                                <input type="text" name="nama_paket" id="nama_paket" class="form-control"required>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_berangkat" class="form-label">Tanggal Berangkat</label>
                                <input type="date" name="tanggal_berangkat" id="tanggal_berangkat"
                                    class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="durasi" class="form-label">Durasi</label>
                                <input type="text" name="durasi" id="durasi" class="form-control"required>
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_seat" class="form-label">Jumlah Seat</label>
                                <input type="text" name="jumlah_seat" id="jumlah_seat" class="form-control"required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
