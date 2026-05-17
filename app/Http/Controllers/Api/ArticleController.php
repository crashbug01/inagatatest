<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // GET /articles (Pagination)
    public function index(Request $request)
    {
        $limit = $request->query('limit', 10); // Default 10
        $articles = Article::with('category')->paginate($limit);

        return response()->json($articles, 200);
    }

    // POST /articles (Create & Validate)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id', // Validasi kategori valid
        ]);

        $article = Article::create($validated);

        return response()->json($article->load('category'), 201);
    }

    // GET /articles/{id} (Detail)
    public function show($id)
    {
        $article = Article::with('category')->find($id);

        if (!$article) {
            return response()->json(['message' => 'Artikel tidak ditemukan'], 404);
        }

        return response()->json($article, 200);
    }

    // PUT /articles/{id} (Update)
    public function update(Request $request, $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return response()->json(['message' => 'Artikel tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
        ]);

        $article->update($validated);

        return response()->json($article, 200);
    }

    // DELETE /articles/{id}
    public function destroy($id)
    {
        $article = Article::find($id);

        if (!$article) {
            return response()->json(['message' => 'Artikel tidak ditemukan'], 404);
        }

        $article->delete();

        return response()->json(['message' => 'Artikel berhasil dihapus'], 200);
    }

    // GET /articles/search (Search & Advanced Filter)
    public function search(Request $request)
    {
        $query = Article::with('category');

        // Filter berdasarkan kategori
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Pencarian berdasarkan kata kunci di Judul ATAU Konten (Bonus Lanjutan)
        if ($request->has('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'LIKE', "%{$keyword}%")
                    ->orWhere('content', 'LIKE', "%{$keyword}%");
            });
        }

        // Filter berdasarkan rentang tanggal (Bonus Lanjutan)
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('created_at', [$request->start_date . ' 00:00:00', $request->end_date . ' 23:59:59']);
        }

        return response()->json($query->get(), 200);
    }
}
