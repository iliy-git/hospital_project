@extends('layouts.app')

@section('title', 'Кабинеты')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Кабинеты</h1>
        <a href="{{ route('rooms.create') }}" class="btn btn-primary">Добавить кабинет</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Этаж</th>
            <th>Номер</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rooms as $room)
            <tr>
                <td>{{ $room->id }}</td>
                <td>{{ $room->name }}</td>
                <td>{{ $room->description }}</td>
                <td>{{ $room->floor }}</td>
                <td>{{ $room->number }}</td>
                <td>
                    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="d-inline">
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
