<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Tambah Data Opsi</h3>
                        </div>
                    </div>

                    <div class="mt-5 container">
                        <form action="{{ route('data-opsi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="item_opsi" class="form-label">Item Opsi</label>
                                <input type="text" name="item_opsi" id="item_opsi" class="form-control" required>
                            </div>


                            <div class="mb-3">
                                <label for="Jenis opsi" class="form-label">Jenis opsi</label>
                                <select type="text" name="jenis_opsi_id" id="Jenis opsi" class="form-select"
                                    required>
                                    <option selected disabled>-- pilih Jenis Opsi --</option>
                                    @foreach ($opsis as $opsi)
                                        <option value="{{ $opsi->id }}"> {{ $opsi->nama }} </option>
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
