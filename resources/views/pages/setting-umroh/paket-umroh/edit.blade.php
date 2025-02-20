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
                        <form action="{{ route('paket-umroh.update', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama_paket" class="form-label">Nama Paket</label>
                                <input type="text" name="nama_paket" id="nama_paket" class="form-control"
                                    value="{{ $data->nama_paket }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="durasi" class="form-label">Durasi</label>
                                <input type="text" name="durasi" id="durasi" class="form-control"
                                    value="{{ $data->durasi }}" required>
                            </div>

                            <div id="inputContainer">
                                @foreach ($data->tipe_kamar as $index => $tipe_kamar)
                                    <div class="w-100 mb-3 d-flex gap-5 input-group">
                                        <!-- Tipe Kamar -->
                                        <div class="w-50">
                                            <label class="form-label">Tipe Kamar</label>
                                            <select name="tipe_kamar[]" class="form-select" required>
                                                <option selected disabled>-- pilih Status --</option>
                                                @foreach ($opsis as $opsi)
                                                    <option value="{{ $opsi->item_opsi }}"
                                                        {{ $opsi->item_opsi == $tipe_kamar ? 'selected' : '' }}>
                                                        {{ $opsi->item_opsi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Harga -->
                                        <div class="w-25">
                                            <label class="form-label">Harga</label>
                                            <input type="text" name="harga[]" class="form-control" required
                                                value="{{ $data->harga[$index] }}">
                                        </div>

                                        <button type="button" class="btn btn-primary" onclick="tambahInput()"> +
                                        </button>

                                        <button type="button" class="btn btn-danger"
                                            onclick="hapusInput(this)">-</button>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Jadwal Keberangkatan</label>
                                <select type="text" name="jadwal_keberangkatan_id" id="Jenis opsi"
                                    class="form-select" required>
                                    <option selected disabled>-- pilih Jadwal Keberangkatan --</option>
                                    @foreach ($jadwal_keberangkatan as $j)
                                        <option value="{{ $j->id }}" {{ $data->id == $j->id ? 'selected' : '' }}>
                                            {{ $j->tanggal_berangkat }} S/D
                                            {{ $j->tanggal_selesai }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select type="text" name="status" id="Jenis opsi" class="form-select" required>
                                    <option selected disabled>-- pilih Status --</option>
                                    <option value="aktif" {{ $data->status == 'aktif' ? 'selected' : '' }}>aktif
                                    </option>
                                    <option value="nonaktif" {{ $data->status == 'nonaktif' ? 'selected' : '' }}>
                                        nonaktif
                                    </option>
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
    function tambahInput() {
        let container = document.getElementById("inputContainer");

        let newRow = document.createElement("div");
        newRow.classList.add("w-100", "mb-3", "d-flex", "gap-5", "input-group");

        newRow.innerHTML = `
            <div class="w-50">
                <label class="form-label">tipe_kamar</label>
                <select name="tipe_kamar[]" class="form-select" required>
                    <option selected disabled>-- pilih Status --</option>
                    @foreach ($opsis as $opsi)
                        <option value="{{ $opsi->item_opsi }}">{{ $opsi->item_opsi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-25">
                <label class="form-label">Harga</label>
                <input type="text" name="harga[]" class="form-control" required>
            </div>
            <button type="button" class="btn btn-primary" onclick="tambahInput()">+</button>
            <button type="button" class="btn btn-danger" onclick="hapusInput(this)">-</button>
        `;

        container.appendChild(newRow);
    }

    function hapusInput(button) {
        button.parentElement.remove();
    }
</script>
