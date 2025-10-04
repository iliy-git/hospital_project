@extends('layouts.app')

@section('title', 'Добавить запись')

@section('content')
    <h1>Добавить запись</h1>

    <form action="{{ route('records.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="user_id" class="form-label">Пациент</label>
                    <select class="form-control" id="user_id" name="user_id" required>
                        <option value="">Выберите пациента</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->surname }} {{ $user->name }} {{ $user->patronymic }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="doctor_id" class="form-label">Врач</label>
                    <select class="form-control" id="doctor_id" name="doctor_id" required>
                        <option value="">Выберите врача</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">Др. {{ $doctor->surname }} {{ $doctor->name }} - {{ $doctor->post->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="record_date" class="form-label">Дата и время записи</label>
            <input type="datetime-local" class="form-control" id="record_date" name="record_date" required>
        </div>

        <button type="submit" class="btn btn-success">Создать</button>
        <a href="{{ route('records.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
