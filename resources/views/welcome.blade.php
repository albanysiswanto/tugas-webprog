<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jurnal Pribadi - Catat Momen Berhargamu</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    {{-- Directive Vite untuk CSS dan JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-50 text-slate-800">

    {{-- Navbar Sederhana --}}
    <nav class="bg-white shadow-sm">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-sky-600">JurnalKu</a>
            <div>
                {{-- Ganti # dengan route login dan register yang sesuai --}}
                <a href="{{ route('login') }}" class="text-slate-600 hover:text-sky-500 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                <a href="{{ route('register') }}" class="ml-2 bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-md text-sm font-medium shadow-md transition duration-150 ease-in-out">Register</a>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <main class="min-h-[calc(100vh-140px)] {{-- Adjust height based on navbar/footer --}}">
        <section class="container mx-auto px-6 py-16 md:py-24 text-center">
            <div class="max-w-3xl mx-auto">
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-slate-900 mb-6 leading-tight">
                    Tuliskan Perjalananmu, Temukan Dirimu.
                </h1>
                <p class="text-lg sm:text-xl text-slate-600 mb-10 leading-relaxed">
                    JurnalKu adalah ruang pribadimu untuk mencatat setiap pikiran, perasaan, dan momen berharga dalam hidup. Mulai menulis hari ini dan lihat bagaimana refleksi diri mengubah perspektifmu.
                </p>
                <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('register') }}" class="w-full sm:w-auto bg-sky-500 hover:bg-sky-600 text-white font-semibold py-3 px-8 rounded-lg shadow-lg text-lg transition duration-150 ease-in-out transform hover:scale-105">
                        Mulai Menulis Sekarang
                    </a>
                    <a href="{{ route('login') }}" class="w-full sm:w-auto bg-white hover:bg-slate-100 text-sky-600 font-semibold py-3 px-8 rounded-lg shadow-lg border border-slate-300 text-lg transition duration-150 ease-in-out">
                        Sudah Punya Akun? Login
                    </a>
                </div>
            </div>
        </section>

        {{-- Bagian Fitur (Opsional, bisa ditambahkan nanti) --}}
        <section class="bg-white py-16 md:py-24">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-slate-900 text-center mb-12">Mengapa Memilih JurnalKu?</h2>
                <div class="grid md:grid-cols-3 gap-8 text-center">
                    <div class="p-6">
                        <div class="flex items-center justify-center mb-4">
                            {{-- Ganti dengan ikon yang sesuai (misalnya dari Heroicons atau FontAwesome jika sudah di-setup) --}}
                            <svg class="w-12 h-12 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v11.494m0 0a8.485 8.485 0 0011.494 0M12 17.747a8.485 8.485 0 01-11.494 0"></path></svg> {{-- Contoh Ikon Globe --}}
                        </div>
                        <h3 class="text-xl font-semibold text-slate-800 mb-2">Aman & Pribadi</h3>
                        <p class="text-slate-600">Tulisanmu adalah milikmu sepenuhnya. Kami menjaga privasimu dengan serius.</p>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-center mb-4">
                            <svg class="w-12 h-12 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg> {{-- Contoh Ikon Edit --}}
                        </div>
                        <h3 class="text-xl font-semibold text-slate-800 mb-2">Mudah Digunakan</h3>
                        <p class="text-slate-600">Antarmuka yang simpel dan intuitif, fokus pada pengalaman menulismu.</p>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-center mb-4">
                            <svg class="w-12 h-12 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg> {{-- Contoh Ikon Search --}}
                        </div>
                        <h3 class="text-xl font-semibold text-slate-800 mb-2">Temukan Kembali</h3>
                        <p class="text-slate-600">Cari dan temukan kembali catatan lamamu dengan mudah kapan saja.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- Footer Sederhana --}}
    <footer class="bg-slate-800 text-slate-300 text-center py-8">
        <div class="container mx-auto px-6">
            <p>&copy; {{ date('Y') }} JurnalKu. Semua Hak Cipta Dilindungi.</p>
        </div>
    </footer>

</body>
</html>
