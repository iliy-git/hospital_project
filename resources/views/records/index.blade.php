@extends('layouts.app')

@section('title', 'Записи')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Записи</h1>
        <a href="{{ route('records.create') }}" class="btn btn-primary">Добавить запись</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Пациент</th>
            <th>Врач</th>
            <th>Дата записи</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($records as $record)
            <tr>
                <td>{{ $record->id }}</td>
                <td>{{ $record->user->surname }} {{ $record->user->name }}</td>
                <td>({{ $record->doctor->post->name }}) {{ $record->doctor->surname }} {{ $record->doctor->name }}</td>
                <td>{{ $record->record_date->format('d.m.Y H:i') }}</td>
                <td>
                    <a href="{{ route('records.edit', $record->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                    <form action="{{ route('records.destroy', $record->id) }}" method="POST" class="d-inline">
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
