<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        // Artikel utama / featured
        $featuredArticle = Article::with(['category', 'author'])
            ->where('status', 'published')
            ->where('is_featured', true)
            ->latest('published_at')
            ->first();

        // Jika belum ada artikel yang ditandai sebagai featured,
        // gunakan artikel terbaru sebagai artikel utama.
        if (!$featuredArticle) {
            $featuredArticle = Article::with(['category', 'author'])
                ->where('status', 'published')
                ->latest('published_at')
                ->first();
        }

        // Artikel terbaru
        $latestArticles = Article::with(['category', 'author'])
            ->where('status', 'published')
            ->latest('published_at')
            ->take(6)
            ->get();

        // Artikel trending berdasarkan jumlah views
        $trendingArticles = Article::with(['category', 'author'])
            ->where('status', 'published')
            ->orderByDesc('views')
            ->take(5)
            ->get();

        // Artikel video
        $videoArticles = Article::with(['category', 'author'])
            ->where('status', 'published')
            ->where('media_type', 'video')
            ->latest('published_at')
            ->take(4)
            ->get();

        return view('home', compact(
            'featuredArticle',
            'latestArticles',
            'trendingArticles',
            'videoArticles'
        ));
    }
}
