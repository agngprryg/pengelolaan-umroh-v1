<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Data Detail Calon Haji</h3>
                        </div>
                    </div>

                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="card shadow-lg">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary fw-bold">{{ $data->nama_lengkap }}</h5>

                                        <div class="row">
                                            {{-- <div class="col-md-4">
                                                <img src="{{ asset('storage/' . $data->foto) }}"
                                                    class="img-fluid rounded" alt="Foto" width="120">
                                            </div> --}}
                                            <div class="col-md-4">
                                                <img src="{{ asset('images/user-profile.jpeg') }}" alt=""
                                                    width="140">
                                            </div>
                                            <div class="col-md-8">
                                                <p class="mb-1"><strong>No Registrasi:</strong>
                                                    {{ $data->no_registrasi }}</p>
                                                <p class="mb-1"><strong>Tanggal Daftar:</strong>
                                                    {{ $data->tanggal_daftar }}</p>
                                                <p class="mb-1"><strong>Agen:</strong> {{ $data->agen }}</p>
                                                <p class="mb-1"><strong>Tahun Berangkat:</strong>
                                                    {{ $data->tahun_berangkat }}</p>
                                                <p class="mb-1"><strong>NIK:</strong> {{ $data->nik }}</p>
                                                <p class="mb-1"><strong>Jenis Kelamin:</strong>
                                                    {{ $data->jenis_kelamin }}</p>
                                                <p class="mb-1"><strong>Status Pernikahan:</strong>
                                                    {{ $data->status_pernikahan }}</p>
                                            </div>
                                        </div>

                                        <hr>
                                        <p><strong>Alamat:</strong> {{ $data->alamat_lengkap }},
                                            {{ $data->kota }}, {{ $data->provinsi }}</p>
                                        <p><strong>Pendidikan:</strong> {{ $data->pendidikan }}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
