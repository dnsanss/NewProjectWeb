@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="max-w-6xl mx-auto px-4 py-6">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2 space-y-6">

            <div class="relative h-420px rounded-lg overflow-hidden">

                <img
                    src="https://images.unsplash.com/photo-1560958089-b8a1929cea89"
                    class="w-full h-full object-cover">

                <div class="absolute inset-0 bg-linear-to-t from-black/80 to-transparent"></div>

                <div class="absolute bottom-0 p-8 text-white">

                    <span class="bg-red-600 px-3 py-1 text-xs font-bold">
                        FEATURED
                    </span>

                    <h2 class="text-3xl font-bold mt-4">
                        Tesla Model S 2025 Resmi Meluncur dengan Fitur Super Canggih
                    </h2>

                    <p class="text-sm mt-3">
                        11 Mei 2025
                    </p>

                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                @foreach(range(1,4) as $item)

                <article class="bg-white">

                    <img
                        src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7"
                        class="w-full h-32 object-cover">

                    <div class="p-3">

                        <span class="text-xs text-red-600 font-semibold">
                            OTOMOTIF
                        </span>

                        <h3 class="font-semibold text-sm mt-2">
                            Judul Berita Terbaru
                        </h3>

                    </div>

                </article>

                @endforeach

            </div>

            <div class="space-y-6">

                @foreach(range(1,3) as $item)

                <article class="bg-white flex">

                    <img
                        src="https://images.unsplash.com/photo-1503736334956-4c8f8e92946d"
                        class="w-56 h-40 object-cover">

                    <div class="p-5">

                        <span class="text-xs text-purple-600 font-semibold">
                            REVIEW
                        </span>

                        <h3 class="text-xl font-bold mt-2">
                            Review Produk Terbaru Tahun 2025
                        </h3>

                        <p class="text-gray-500 text-sm mt-3">
                            Ringkasan berita yang nantinya berasal dari database.
                        </p>

                    </div>

                </article>

                @endforeach

            </div>

            <div>

                <h2 class="text-xl font-bold mb-4">
                    Rekomendasi untuk Anda
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                    @foreach(range(1,4) as $item)

                    <article class="bg-white">

                        <img
                            src="https://images.unsplash.com/photo-1494976388531-d1058494cdd8"
                            class="w-full h-28 object-cover">

                        <div class="p-3">

                            <h3 class="font-semibold text-sm">
                                Artikel Rekomendasi
                            </h3>

                        </div>

                    </article>

                    @endforeach

                </div>

            </div>

            <button class="w-full bg-red-600 text-white py-3 font-semibold">
                LOAD MORE
            </button>

        </div>

        @include('components.sidebar')

    </div>

</div>

<section class="bg-white border-y">

    <div class="max-w-6xl mx-auto px-4 py-10 grid grid-cols-2 md:grid-cols-6 gap-6 text-center">

        <div>
            <div class="text-2xl font-bold">10K+</div>
            <div class="text-sm text-gray-500">Artikel</div>
        </div>

        <div>
            <div class="text-2xl font-bold">5K+</div>
            <div class="text-sm text-gray-500">Video</div>
        </div>

        <div>
            <div class="text-2xl font-bold">20K+</div>
            <div class="text-sm text-gray-500">Pembaca</div>
        </div>

        <div>
            <div class="text-2xl font-bold">50+</div>
            <div class="text-sm text-gray-500">Kategori</div>
        </div>

        <div>
            <div class="text-2xl font-bold">100+</div>
            <div class="text-sm text-gray-500">Kontributor</div>
        </div>

        <div>
            <div class="text-2xl font-bold">24/7</div>
            <div class="text-sm text-gray-500">Update</div>
        </div>

    </div>

</section>

@endsection