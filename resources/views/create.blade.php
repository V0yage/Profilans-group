@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-6 offset-3">
            <div class="alert alert-success" style="display:none;">
                <h5 class="alert-heading">Ссылка сгенерирована</h5>
                <hr>
                <p>Короткая ссылка для url <span class="extern fw-bold"></span> была успешно сгенерирована</p>
                <p class="mb-0">
                    <a class="short" target="_blank"></a>
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4 offset-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Сокращение ссылок</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="url" class="form-label">Ссылка на внешний ресурс</label>
                            <input type="text" name="extern" class="form-control" id="url">
                        </div>
                        <button type="submit" class="btn btn-primary">Создать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
