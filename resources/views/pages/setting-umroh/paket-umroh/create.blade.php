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

                            <div id="inputContainer">
                                <div class="w-100 mb-1 d-flex gap-5">

                                    <div class="w-50">
                                        <label for="fasilitas" class="form-label">Fasilitas</label>
                                        <select name="fasilitas[]" class="form-select" required>
                                            <option selected disabled>-- pilih Fasilitas --</option>
                                            @foreach ($opsis as $opsi)
                                                <option value="{{ $opsi->item_opsi }}">{{ $opsi->item_opsi }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="w-50">
                                        <label for="harga" class="form-label">Harga</label>
                                        <input type="text" name="harga[]" class="form-control" required>
                                    </div>

                                </div>
                            </div>

                            <button type="button" class="btn btn-primary mb-3" onclick="tambahInput()"> +
                            </button>
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
    function tambahInput() {
        let container = document.getElementById("inputContainer");
        let newRow = document.createElement("div");
        newRow.classList.add("w-100", "mb-3", "d-flex", "gap-5");
        newRow.innerHTML = `
            <div class="w-50">
                <label class="form-label">Fasilitas</label>
                <select name="fasilitas[]" class="form-select" required>
                    <option selected disabled>-- pilih Fasilitas --</option>
                    @foreach ($opsis as $opsi)
                        <option value="{{ $opsi->item_opsi }}">{{ $opsi->item_opsi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-50">
                <label class="form-label">Harga</label>
                <input type="text" name="harga[]" class="form-control" required>
            </div>
        `;
        container.appendChild(newRow);
    }
</script>
