@extends('layouts.app')

@section('title', 'Редактировать врача')

@section('content')
    <h1>Редактировать врача</h1>

    <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="surname" class="form-label">Фамилия</label>
                    <input type="text" class="form-control" id="surname" name="surname" value="{{ $doctor->surname }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $doctor->name }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="patronymic" class="form-label">Отчество</label>
                    <input type="text" class="form-control" id="patronymic" name="patronymic" value="{{ $doctor->patronymic }}" required>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="experience" class="form-label">Опыт работы</label>
            <input type="text" class="form-control" id="experience" name="experience" value="{{ $doctor->experience }}" required>
        </div>

        <div class="mb-3">
            <label for="birth_date" class="form-label">Дата рождения</label>
            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $doctor->birth_date->format('Y-m-d') }}" required>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="post_id" class="form-label">Должность</label>
                    <select class="form-control" id="post_id" name="post_id" required>
                        <option value="">Выберите должность</option>
                        @foreach($posts as $post)
                            <option value="{{ $post->id }}" {{ $doctor->post_id == $post->id ? 'selected' : '' }}>{{ $post->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="room_id" class="form-label">Кабинет</label>
                    <select class="form-control" id="room_id" name="room_id" required>
                        <option value="">Выберите кабинет</option>
                        @foreach($rooms as $room)
                            <option value="{{ $room->id }}" {{ $doctor->room_id == $room->id ? 'selected' : '' }}>{{ $room->name }} (этаж {{ $room->floor }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-warning">Обновить</button>
        <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
