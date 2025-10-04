@extends('layouts.app')

@section('title', 'Редактировать кабинет')

@section('content')
    <h1>Редактировать кабинет</h1>

    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Название</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $room->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $room->description }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="floor" class="form-label">Этаж</label>
                    <input type="number" class="form-control" id="floor" name="floor" value="{{ $room->floor }}" min="-2" max="9" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="number" class="form-label">Номер кабинета</label>
                    <input type="number" class="form-control" id="number" name="number" value="{{ $room->number }}" min="-200" max="900" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-warning">Обновить</button>
        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
