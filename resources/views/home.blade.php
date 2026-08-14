@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="max-w-6xl mx-auto px-4 py-6">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2 space-y-6">

            <!-- artikel utama -->
            <div class="relative h-420px rounded-lg overflow-hidden">

                @if ($featuredArticle)
                <article class="relative overflow-hidden rounded-xl">
                    <img
                        src="{{ Storage::url($featuredArticle->thumbnail) }}"
                        alt="{{ $featuredArticle->title }}"
                        class="h-420px w-full object-cover">

                    <div class="absolute inset-0 bg-linear-to-t from-black/80 via-black/20 to-transparent"></div>

                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <span class="inline-block rounded bg-red-600 px-3 py-1 text-xs font-semibold">
                            {{ $featuredArticle->category->name }}
                        </span>

                        <h1 class="mt-3 text-2xl font-bold md:text-4xl">
                            {{ $featuredArticle->title }}
                        </h1>

                        <p class="mt-2 text-sm text-gray-200">
                            {{ $featuredArticle->excerpt }}
                        </p>

                        <div class="mt-3 text-xs text-gray-300">
                            {{ $featuredArticle->published_at?->format('d M Y') }}
                        </div>
                    </div>
                </article>
                @endif

            </div>

            <!-- artikel lainnya -->
            <div class="space-y-6">

                <section class="mt-10">

                    <div class="mb-5 flex items-center justify-between">
                        <h2 class="text-2xl font-bold">
                            Berita Terbaru
                        </h2>

                        <a
                            href="#"
                            class="text-sm font-semibold text-red-600 hover:text-red-700">
                            Lihat Semua
                        </a>
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                        @foreach ($latestArticles as $article)

                        <article class="overflow-hidden rounded-xl bg-white shadow-sm">

                            <a href="#">
                                <img
                                    src="{{ Storage::url($article->thumbnail) }}"
                                    alt="{{ $article->title }}"
                                    class="h-52 w-full object-cover">
                            </a>

                            <div class="p-4">

                                <div class="mb-2 flex items-center gap-2 text-xs">
                                    <span class="font-semibold text-red-600">
                                        {{ $article->category->name }}
                                    </span>

                                    <span class="text-gray-400">
                                        {{ $article->published_at?->format('d M Y') }}
                                    </span>
                                </div>

                                <h3 class="text-lg font-bold leading-tight">
                                    <a href="#">
                                        {{ $article->title }}
                                    </a>
                                </h3>

                                @if ($article->excerpt)
                                <p class="mt-2 line-clamp-2 text-sm text-gray-500">
                                    {{ $article->excerpt }}
                                </p>
                                @endif

                            </div>

                        </article>

                        @endforeach

                    </div>

                </section>

            </div>

            <!-- video terbaru -->
            <section class="mt-12">

                <div class="mb-5 flex items-center justify-between">
                    <h2 class="text-2xl font-bold">
                        Video Terbaru
                    </h2>
                </div>

                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">

                    @foreach ($videoArticles as $article)

                    <article>

                        <div class="relative overflow-hidden rounded-xl">

                            <img
                                src="{{ Storage::url($article->thumbnail) }}"
                                alt="{{ $article->title }}"
                                class="h-48 w-full object-cover">

                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-white/90">
                                    <svg
                                        class="ml-1 h-5 w-5 text-red-600"
                                        fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path d="M6.3 2.8A1 1 0 0 0 5 3.6v12.8a1 1 0 0 0 1.3.8l10-6.4a1 1 0 0 0 0-1.6l-10-6.4Z" />
                                    </svg>
                                </div>
                            </div>

                        </div>

                        <div class="mt-3">

                            <span class="text-xs font-semibold text-red-600">
                                {{ $article->category->name }}
                            </span>

                            <h3 class="mt-1 font-bold">
                                {{ $article->title }}
                            </h3>

                        </div>

                    </article>

                    @endforeach

                </div>

            </section>

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