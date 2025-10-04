@extends('layouts.app')

@section('title', 'Врачи')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Врачи</h1>
        <a href="{{ route('doctors.create') }}" class="btn btn-primary">Добавить врача</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>ФИО</th>
            <th>Опыт</th>
            <th>Дата рождения</th>
            <th>Должность</th>
            <th>Кабинет</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($doctors as $doctor)
            <tr>
                <td>{{ $doctor->id }}</td>
                <td>{{ $doctor->surname }} {{ $doctor->name }} {{ $doctor->patronymic }}</td>
                <td>{{ $doctor->experience }}</td>
                <td>{{ $doctor->birth_date->format('d.m.Y') }}</td>
                <td>{{ $doctor->post->name }}</td>
                <td>{{ $doctor->room->name }}</td>
                <td>
                    <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                    <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Удалить?')">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
