<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>

<body>
    <div class="min-h-screen mt-10">
        <div class="">
            @if (count($data_pengguna) > 0)
                <div class="flex flex-wrap gap-10">
                    @foreach ($data_pengguna as $d)
                        <div class="px-10 py-20 border border-black shadow-lg rounded-lg">
                            <p>Kepada YTH, bapak/ibu <span class="font-bold underline">{{ $d->username }}</span>
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
</body>

</html>
