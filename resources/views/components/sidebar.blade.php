<aside class="space-y-6">

    <div class="bg-white border p-5">

        <h3 class="font-bold mb-4">
            TRENDING NOW
        </h3>

        @foreach(range(1,4) as $item)

        <div class="py-4 border-b">

            <div class="text-sm font-semibold">
                Judul berita trending terbaru
            </div>

            <div class="text-xs text-gray-400 mt-1">
                11 Mei 2025
            </div>

        </div>

        @endforeach

    </div>

    <div class="bg-white border p-5 text-center">

        <div class="h-56 flex items-center justify-center text-gray-400">
            Area Iklan
        </div>

        <button class="bg-red-600 text-white px-6 py-2">
            BELI SEKARANG
        </button>

    </div>

    <div class="bg-white border p-5">

        <h3 class="font-bold mb-4">
            VIDEO TERBARU
        </h3>

        @foreach(range(1,3) as $item)

        <div class="flex gap-3 mb-4">

            <div class="w-28 h-20 bg-gray-200"></div>

            <div class="text-sm font-semibold">
                Video berita terbaru
            </div>

        </div>

        @endforeach

    </div>

</aside>