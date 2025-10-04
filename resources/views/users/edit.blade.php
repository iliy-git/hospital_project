@extends('layouts.app')

@section('title', 'Редактировать пользователя')

@section('content')
    <h1>Редактировать пользователя</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="surname" class="form-label">Фамилия</label>
                    <input type="text" class="form-control" id="surname" name="surname" value="{{ $user->surname }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="patronymic" class="form-label">Отчество</label>
                    <input type="text" class="form-control" id="patronymic" name="patronymic" value="{{ $user->patronymic }}" required>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Роль</label>
            <select class="form-control" id="role" name="role" required>
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Пользователь</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Администратор</option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Обновить</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
