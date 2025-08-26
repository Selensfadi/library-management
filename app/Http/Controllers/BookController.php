<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->latest()->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('books.create', compact('categories'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'title' => 'required|string|max:255|unique:books,title',
            'author'=> 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'nullable|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'release_date' => 'nullable|date',
        ]);

        Book::create([
            'title' => $r->title,
            'slug'  => Str::slug($r->title).'-'.rand(1000,9999),
            'author'=> $r->author,
            'category_id' => $r->category_id,
            'description' => $r->description,
            'release_date'=> $r->release_date,
            'price' => $r->price ?? 0,
            'stock' => $r->stock ?? 0,
        ]);

        return redirect()->route('books.index')->with('success','Book created');
    }

    public function edit(Book $book)
    {
        $categories = Category::orderBy('name')->get();
        return view('books.edit', compact('book','categories'));
    }

    public function update(Request $r, Book $book)
    {
        $r->validate([
            'title' => 'required|string|max:255|unique:books,title,'.$book->id,
            'author'=> 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'nullable|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'release_date' => 'nullable|date',
        ]);

        $book->update([
            'title' => $r->title,
            'slug'  => Str::slug($r->title).'-'.rand(1000,9999),
            'author'=> $r->author,
            'category_id' => $r->category_id,
            'description' => $r->description,
            'release_date'=> $r->release_date,
            'price' => $r->price ?? 0,
            'stock' => $r->stock ?? 0,
        ]);

        return redirect()->route('books.index')->with('success','Book updated');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success','Book deleted');
    }
}
