@extends('layouts.app')

@section('content')
<div class="container">
    <p><strong>Neme:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    @if ($user->role == 1)
    <p><strong>Role:</strong> Admin </p>
    @elseif ($user->role == 2)
    <p><strong>Role:</strong> Bibliotecario(a) </p>
    @else
    <p><strong>Role:</strong> Cliente </p>
    @endif
    <a href="{{ route('users.index') }}" class="btn btn-primary">Voltar à Lista</a>
    @can('isAdmin', Auth::user())
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        
        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este livro?')">Excluir</button>
        @endcan
        
</div>
@endsection