
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $book->title }}</h1>
        <p>{{ $book->author->name }}</p>
        @if($book->cover_image)
            <img src="{{ asset('storage/'.$book->cover_image) }}" alt="Capa do Livro">
        @endif
        <p><strong>Autor:</strong> {{ $book->author->name }}</p>
        <p><strong>Editora:</strong> {{ $book->publisher->name }}</p>
        <p><strong>Ano de Publicação:</strong> {{ $book->published_year }}</p>
        <p><strong>Categorias:</strong> 
            @foreach ($book->categories as $category)
                <span class="badge bg-secondary">{{ $category->name }}</span>
            @endforeach
        </p>
        <a href="{{ route('books.index') }}" class="btn btn-primary">Voltar à Lista</a>
        
        @cannot('isCliente', Auth::user())
            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este livro?')">Excluir</button>
            </form>
        @endcannot

        <h3>Comentários</h3>
        @foreach ($book->comments as $comment)
            <div>
                <strong>{{ $comment->user->name }}</strong>:
                <p>{{ $comment->comment }}</p>
            </div>
        @endforeach

        @auth
            <form action="{{ route('comments.store', $book->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea name="comment" rows="3" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Adicionar Comentário</button>
            </form>
        @else
            <p>Por favor, <a href="{{ route('login') }}">faça login</a> para deixar um comentário.</p>
        @endauth
    </div>
@endsection

<!-- @extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $book->title }}</h1>
        <p>{{ $book->author->name }}</p>
        @if($book->cover_image)
                <img src="{{ asset('storage/'.$book->cover_image) }}" alt="Capa do Livro">
        @endif
        <p><strong>Autor:</strong> {{ $book->author->name }}</p>
        <p><strong>Editora:</strong> {{ $book->publisher->name }}</p>
        <p><strong>Ano de Publicação:</strong> {{ $book->published_year }}</p>
        <p><strong>Categorias:</strong> 
            @foreach ($book->categories as $category)
                <span class="badge bg-secondary">{{ $category->name }}</span>
            @endforeach
            </p>
        <a href="{{ route('books.index') }}" class="btn btn-primary">Voltar à Lista</a>
        @cannot('isCliente', Auth::user())
        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este livro?')">Excluir</button>
            @endcannot
        </form>
    </div>
@endsection
 -->
