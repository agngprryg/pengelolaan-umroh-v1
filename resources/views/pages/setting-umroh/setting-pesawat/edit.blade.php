<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Edit Data Setting Pesawat </h3>
                        </div>
                    </div>

                    <div class="mt-5 container">
                        <form action="{{ route('setting-pesawat.update', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="rute" class="form-label">Rute</label>
                                <input type="text" name="rute" id="rute" class="form-control"
                                    value="{{ $data->rute }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" name="harga" id="harga" class="form-control"
                                    value="{{ $data->harga }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_maskapai" class="form-label">Nama Maskapai</label>
                                <input type="text" name="nama_maskapai" id="nama_maskapai" class="form-control"
                                    value="{{ $data->nama_maskapai }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
