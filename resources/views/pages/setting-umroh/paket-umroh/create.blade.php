<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Tambah Data Paket Umroh </h3>
                        </div>
                    </div>

                    <div class="mt-5 container">
                        <form action="{{ route('paket-umroh.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="nama_paket" class="form-label">Nama Paket</label>
                                <input type="text" name="nama_paket" id="nama_paket" class="form-control"required>
                            </div>

                            <div class="mb-3">
                                <label for="durasi" class="form-label">Durasi</label>
                                <input type="text" name="durasi" id="durasi" class="form-control" required>
                            </div>

                            {{-- Tipe Kamar Section --}}
                            <div id="tipeKamarContainer">
                                <div class="w-100 mb-1 d-flex gap-5">
                                    <div class="w-50">
                                        <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                                        <select name="tipe_kamar[]" class="form-select" required>
                                            <option selected disabled>-- pilih Tipe Kamar --</option>
                                            @foreach ($tipe_kamar as $t)
                                                <option value="{{ $t->item_opsi }}">{{ $t->item_opsi }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="w-50">
                                        <label for="harga" class="form-label">Harga</label>
                                        <input type="number" name="harga[]" class="form-control" required>
                                    </div>

                                    <button type="button" class=" btn btn-primary " onclick="tambahTipeKamar()">
                                        +</button>
                                </div>
                            </div>

                            <!-- Hotel Section -->
                            <div id="hotelContainer">
                                <label class="form-label">Hotel</label>
                                <div class="w-100 mb-3 d-flex gap-3">
                                    <select name="hotel[]" class="form-select" required>
                                        <option selected disabled>Pilih Lokasi</option>
                                        @foreach ($hotels as $h)
                                            <option value="{{ $h->lokasi }}">{{ $h->lokasi }}</option>
                                        @endforeach
                                    </select>
                                    <select name="hotel[]" class="form-select" required>
                                        <option selected disabled>Pilih Hotel</option>
                                        @foreach ($hotels as $hotel)
                                            <option value="{{ $hotel->nama_hotel }}">{{ $hotel->nama_hotel }}</option>
                                        @endforeach
                                    </select>
                                    <input type="number" name="lama_hari[]" class="form-control"
                                        placeholder="Lama Hari" required>
                                    <button type="button" class="btn btn-success" onclick="tambahHotel()">+</button>
                                </div>
                            </div>

                            <!-- Pesawat Section -->
                            <div id="pesawatContainer">
                                <label class="form-label">Pesawat</label>
                                <div class="w-100 mb-3 d-flex gap-3">
                                    <select name="pesawat[]" class="form-select" required>
                                        <option selected disabled>Pilih Maskapai</option>
                                        @foreach ($maskapai as $m)
                                            <option value="{{ $m }}">{{ $m }}</option>
                                        @endforeach
                                    </select>
                                    <select name="pesawat[]" class="form-select" required>
                                        <option selected disabled>Pilih Rute</option>
                                        @foreach ($rute as $r)
                                            <option value="{{ $r }}">{{ $r }}</option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-success" onclick="tambahPesawat()">+</button>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Jadwal Keberangkatan</label>
                                <select type="text" name="jadwal_keberangkatan_id" id="Jenis opsi"
                                    class="form-select" required>
                                    <option selected disabled>-- pilih Jadwal Keberangkatan --</option>
                                    @foreach ($jadwal_keberangkatan as $j)
                                        <option value="{{ $j->id }}"> {{ $j->tanggal_berangkat }} S/D
                                            {{ $j->tanggal_selesai }} </option>
                                    @endforeach
                                </select>
                            </div>



                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select type="text" name="status" id="Jenis opsi" class="form-select" required>
                                    <option selected disabled>-- pilih Status --</option>
                                    <option value="aktif">aktif</option>
                                    <option value="nonaktif">nonaktif</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function tambahTipeKamar() {
        let container = document.getElementById("tipeKamarContainer");
        let newRow = document.createElement("div");
        newRow.classList.add("w-100", "mb-3", "d-flex", "gap-5");
        newRow.innerHTML = `
            <div class="w-50">
                <label class="form-label">tipe_kamar</label>
                <select name="tipe_kamar[]" class="form-select" required>
                    <option selected disabled>-- pilih Tipe Kamar --</option>
                    @foreach ($tipe_kamar as $t)
                        <option value="{{ $t->item_opsi }}">{{ $t->item_opsi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-50">
                <label class="form-label">Harga</label>
                <input type="number" name="harga[]" class="form-control" required>
            </div>
            <button type="button" class=" btn btn-primary " onclick="tambahTipeKamar()"> +

        `;
        container.appendChild(newRow);
    }

    function tambahHotel() {
        let container = document.getElementById("hotelContainer");
        let newRow = document.createElement("div");
        newRow.classList.add("w-100", "mb-3", "d-flex", "gap-3");
        newRow.innerHTML = `
        <select name="hotel[]" class="form-select" required>
            <option selected disabled>Pilih Lokasi</option>
                @foreach ($hotels as $h)
            <option value="{{ $h->lokasi }}">{{ $h->lokasi }}</option>
                    @endforeach
        </select>
        <select name="hotel[]" class="form-select" required>
            <option selected disabled>Pilih Hotel</option>
                @foreach ($hotels as $hotel)
                    <option value="{{ $hotel->nama_hotel }}">{{ $hotel->nama_hotel }}</option>
                 @endforeach
        </select>
        <input type="number" name="lama_hari[]" class="form-control" placeholder="Lama Hari" required>
        <button type="button" class="btn btn-success" onclick="tambahHotel()">+</button>
        `;
        container.appendChild(newRow);
    }

    function tambahPesawat() {
        let container = document.getElementById("pesawatContainer");
        let newRow = document.createElement("div");
        newRow.classList.add("w-100", "mb-3", "d-flex", "gap-3");
        newRow.innerHTML = `
            <select name="pesawat[]" class="form-select" required>
                <option selected disabled>Pilih Maskapai</option>
                    @foreach ($maskapai as $m)
                option value="{{ $m }}">{{ $m }}</option>
                    @endforeach
            </select>
            <select name="pesawat[]" class="form-select" required>
                <option selected disabled>Pilih Rute</option>
                @foreach ($rute as $r)
                <option value="{{ $r }}">{{ $r }}</option>
                @endforeach
            </select>
            <button type="button" class="btn btn-success" onclick="tambahPesawat()">+</button>
        `;
        container.appendChild(newRow);
    }
</script>
