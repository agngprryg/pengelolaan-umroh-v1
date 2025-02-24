<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Edit Data Pemandu Jamaah </h3>
                        </div>
                    </div>

                    <div class="mt-5 container">
                        <form action="{{ route('pemandu-jamaah.update', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama_pemandu" class="form-label">Nama Pemandu</label>
                                <input type="text" name="nama_pemandu" id="nama_pemandu" class="form-control"
                                    value="{{ $data->nama_pemandu }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" name="harga" id="harga" class="form-control"
                                    value="{{ $data->harga }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select type="text" name="status" id="status" class="form-select" required>
                                    <option selected disabled>-- pilih Status --</option>
                                    <option value="tersedia" {{ $data->status == 'tersedia' ? 'selected' : '' }}>
                                        tersedia</option>
                                    <option value="tidak tersedia"
                                        {{ $data->status == 'tidak tersedia' ? 'selected' : '' }}>
                                        tidak tersedia</option>
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
