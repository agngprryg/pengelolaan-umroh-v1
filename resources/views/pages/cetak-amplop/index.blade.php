<x-app-layout :assets="$assets ?? []">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-5">Cetak Amplop Umroh</h3>
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <form action="{{ route('cetak-amplop') }}" method="GET">
                            <div class="w-[250px] px-3 py-2 border-2 border-black shadow-lg rounded-xl relative">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000 "
                                    viewBox="0 0 256 256" class="absolute top-0.5">
                                    <path
                                        d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z">
                                    </path>
                                </svg>
                                <input type="text" name="keyword" placeholder="Cari di sini" class="pl-10">
                            </div>
                        </form>

                        <div class="flex gap-2 px-2 py-1 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000"
                                viewBox="0 0 256 256">
                                <path
                                    d="M224,152a8,8,0,0,1-8,8H192v16h16a8,8,0,0,1,0,16H192v16a8,8,0,0,1-16,0V152a8,8,0,0,1,8-8h32A8,8,0,0,1,224,152ZM92,172a28,28,0,0,1-28,28H56v8a8,8,0,0,1-16,0V152a8,8,0,0,1,8-8H64A28,28,0,0,1,92,172Zm-16,0a12,12,0,0,0-12-12H56v24h8A12,12,0,0,0,76,172Zm88,8a36,36,0,0,1-36,36H112a8,8,0,0,1-8-8V152a8,8,0,0,1,8-8h16A36,36,0,0,1,164,180Zm-16,0a20,20,0,0,0-20-20h-8v40h8A20,20,0,0,0,148,180ZM40,112V40A16,16,0,0,1,56,24h96a8,8,0,0,1,5.66,2.34l56,56A8,8,0,0,1,216,88v24a8,8,0,0,1-16,0V96H152a8,8,0,0,1-8-8V40H56v72a8,8,0,0,1-16,0ZM160,80h28.69L160,51.31Z">
                                </path>
                            </svg>
                            <a href="{{ route('export.pdf', ['keyword' => request('keyword')]) }}"
                                class="text-sm text-black">Export PDF</a>
                        </div>
                    </div>

                    <div class="min-h-screen mt-10">
                        <div class="">
                            @if (count($data_pengguna) > 0)
                                <div class="flex flex-wrap gap-10">
                                    @foreach ($data_pengguna as $d)
                                        <div class="px-10 py-20 border border-black shadow-lg rounded-lg">
                                            <p>Kepada YTH, bapak/ibu <span
                                                    class="font-bold underline">{{ $d->username }}</span>
                                                diperkirakan
                                                berangkat pada tahun 2024
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>Tidak Ada Data</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</x-app-layout>
