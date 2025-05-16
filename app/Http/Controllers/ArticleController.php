<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ArticleController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $articles = Article::with('user')->latest()->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $uploadedFileUrl = Storage::disk('cloudinary')->put('articles', $uploadedFile);
            $validated['image'] = $uploadedFileUrl;
        }

        $validated['user_id'] = Auth::id();

        Article::create($validated);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dibuat!');
    }


    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $this->authorize('update', $article);
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->has('remove_image')) {
            $validated['image'] = null;
        } elseif ($request->hasFile('image')) {

            $uploadedFile = $request->file('image');
            $uploadedFileUrl = Storage::disk('cloudinary')->put('articles', $uploadedFile);
            $validated['image'] = $uploadedFileUrl;
        }

        $article->update($validated);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui!');
    }


    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);

        if ($article->image) {
            Storage::disk('cloudinary')->delete($article->image);
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus!');
    }

}
