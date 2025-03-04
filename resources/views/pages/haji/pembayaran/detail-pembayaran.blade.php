<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Detail Pembayaran Jamaah Haji</h3>
                        </div>
                    </div>


                    <div class="container mt-5">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Sisa Pembayaran</th>
                                    <th>Keterangan Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $d->tanggal_pembayaran }} </td>
                                        <td>Rp. {{ number_format($d->jumlah_uang) }} </td>
                                        <td>Rp. {{ number_format($d->sisa_pembayaran) }} </td>
                                        <td> {{ $d->tujuan_pembayaran }} </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <a href="{{ route('registrasi-haji.index') }}" class="btn btn-primary">Kembali</a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
