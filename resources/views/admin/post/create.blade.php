@extends('layouts/default')
@section('title', 'Dodawanie wpisu')

@section('content')

<div class="wrapper">
    <div class="rte">
        <h1>Dodaj nowy wpis</h1>
    </div>

    <form action="#">
        <div class="form-fieldset">
            <input class="form-field" type="title" name="text" placeholder="Title">
        </div>
        <div class="form-fieldset">
            <div class="form-select">
                <select name="type">
                    <option value="" disabled selected>Wybierz typ</option>
                    <option value="text">Tekst</option>
                    <option value="photo">Zdjęcie</option>
                </select>
            </div>
        </div>
        <div class="form-fieldset">
            <label class="form-label">Data:</label>
            <input class="form-field" type="date" name="date">
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
            <textarea class="form-textarea" name="content" placeholder="Content"></textarea>
        </div>
        <button class="button">Dodaj wpis</button>
    </form>

    <div class="rte mt">
        <h1>Usuwanie posta</h1>
    </div>

    <form action="#">
        <button class="button button--danger">Usuń</button>
    </form>
</div>

@endsection