<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    // Função para exibir uma lista de livros
    public function index()
    {
        $books = Book::with(['author', 'publisher', 'categories'])->get();
        return view('books.index', compact('books'));
    }

    // Função para exibir um livro específico
    public function show($id)
    {
        $book = Book::with(['author', 'publisher', 'categories'])->findOrFail($id);
        return view('books.show', compact('book'));
    }

    // Função para exibir o formulário de criação de um novo livro
    public function create()
    {
        $authors = Author::all();
        $publishers = Publisher::all();
        $categories = Category::all();
        return view('books.create', compact('authors', 'publishers', 'categories'));
    }

    // Função para armazenar um novo livro no banco de dados
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|integer|exists:authors,id',
            'publisher_id' => 'required|integer|exists:publishers,id',
            'published_year' => 'required|integer',
            'categories' => 'required|array',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('cover_image')) {
            $validatedData['cover_image'] = $request->file('cover_image')->store('cover_images');
        }

    
        $book = Book::create($validatedData);
        $book->categories()->attach($request->categories);

        return redirect()->route('books.index')->with('success', 'Livro criado com sucesso!');
    }
   
    // Função para atualizar um livro no banco de dados

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|integer|exists:authors,id',
            'publisher_id' => 'required|integer|exists:publishers,id',
            'published_year' => 'required|integer',
            'categories' => 'required|array',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $book = Book::findOrFail($id);

    if ($request->hasFile('cover_image')) {
        if ($book->cover_image) {
            Storage::delete($book->cover_image);
        }
        $validatedData['cover_image'] = $request->file('cover_image')->store('cover_images');
    }

    // Atualiza o livro e as categorias associadas
    $book->update($validatedData);
    $book->categories()->sync($request->categories);

    return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso!');
}
    

    // Função para excluir um livro do banco de dados
    public function destroy($id)
{
    $book = Book::findOrFail($id);

    // Deleta a imagem, se houver


    if ($book->cover_image) {
        $book_images='public/'.$book->cover_image;
        Storage::delete($book_images);
    }
    //$book->categories()->detach();
    $book->delete();

    return redirect()->route('books.index')->with('success', 'Livro excluído com sucesso!');
}
    
}
