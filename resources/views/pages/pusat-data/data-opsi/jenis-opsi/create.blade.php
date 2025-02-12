<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Data Jenis Opsi</h3>
                        </div>
                    </div>

                    <div class="mt-5 container">
                        <form action="{{ route('jenis-opsi.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
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
