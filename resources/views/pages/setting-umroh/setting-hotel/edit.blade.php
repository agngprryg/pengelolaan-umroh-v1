<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Tambah Data Setting Hotel </h3>
                        </div>
                    </div>

                    <div class="mt-5 container">
                        <form action="{{ route('setting-hotel.update', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama_hotel" class="form-label">Nama Hotel</label>
                                <input type="text" name="nama_hotel" id="nama_hotel" class="form-control"
                                    value="{{ $data->nama_hotel }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga Perhari</label>
                                <input type="number" name="harga" id="harga" class="form-control"
                                    value="{{ $data->harga }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="lokasi" class="form-label">Lokasi Hotel</label>
                                <input type="text" name="lokasi" id="lokasi" class="form-control"
                                    value="{{ $data->lokasi }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" name="keterangan" id="keterangan" class="form-control"
                                    value="{{ $data->keterangan }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
