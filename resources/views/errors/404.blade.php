@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-6 offset-3">
            <div class="alert alert-danger">
                <h5 class="alert-heading">Страница не найдена</h5>
                <p>В нашей базе не найдено таких ссылок</p>
                <hr>
                <p class="mb-0">
                    <a href="{{ route('create') }}">Сгенерировать новую ссылку</a>
                </p>
            </div>
        </div>
    </div>
@endsection
