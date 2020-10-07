@extends('layouts/default')
@section('title', 'Edycja wpisu')

@section('content')

<div class="wrapper">
    <div class="rte">
        <h1>Edycja wpisu</h1>
    </div>

    <form method="POST" action="{{ route('admin.edit', $post->id) }}" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}
        <div class="form-fieldset">
            <input class="form-field{{ $errors->has('title') ? ' is-invalid' : '' }}" type="text" name="title" placeholder="Tytuł" value="{{ $post->title }}">
        </div>
        <div class="form-fieldset">
            <div class="form-select{{ $errors->has('type') ? ' is-invalid' : '' }}">
                <select name="type">
                    <option value="" disabled selected>Wybierz typ</option>
                    <option value="text"{{ $post->type == 'text' ? ' selected' : '' }}>Tekst</option>
                    <option value="photo"{{ $post->type == 'photo' ? ' selected' : '' }}>Zdjęcie</option>
                </select>
            </div>
        </div>
        <div class="form-fieldset">
            <label class="form-label">Data:</label>
            <input class="form-field{{ $errors->has('date') ? ' is-invalid' : '' }}" type="date" name="date" value={{ $post->date->format('Y-m-d') }}>
        </div>
        <div class="form-fieldset">
            <label class="form-label">Opublikowane:</label>
            <input type="checkbox" name="published" value="1">
        </div>
        <div class="form-fieldset">
            <label class="form-label">Premium:</label>
            <input type="checkbox" name="premium" value="1">
        </div>
        <div class="form-fieldset">
            <label class="form-label">Zdjęcie:</label>
            <input type="file" name="image">
        </div>
        <div class="form-fieldset is-wide">
            <textarea class="form-textarea{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" placeholder="Tekst">{{ $post->content }}</textarea>
        </div>
        <button class="button">Dodaj wpis</button>
    </form>

    <div class="rte mt">
        <h1>Usuwanie posta</h1>
    </div>

    <form method="POST" action="{{ route('admin.delete', $post->id) }}">
        @csrf
        {{ method_field('DELETE') }}
        <button class="button button--danger" onclick="return confirm('Czy na pewno usunąć wpis?');">Usuń</button>
    </form>
</div>

@endsection