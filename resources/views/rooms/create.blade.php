@extends('layouts.app')

@section('title', 'Добавить кабинет')

@section('content')
    <h1>Добавить кабинет</h1>

    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Название</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="floor" class="form-label">Этаж</label>
                    <input type="number" class="form-control" id="floor" name="floor" min="-2" max="9" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="number" class="form-label">Номер кабинета</label>
                    <input type="number" class="form-control" id="number" name="number" min="-200" max="900" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Создать</button>
        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
