@extends('layouts.app')

@section('title', 'Мои записи')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Мои записи к врачам</h4>
                    <a href="{{ route('appointment.create') }}" class="btn btn-primary">Новая запись</a>
                </div>
                <div class="card-body">
                    @if($records->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Врач</th>
                                    <th>Специальность</th>
                                    <th>Кабинет</th>
                                    <th>Дата и время</th>
                                    <th>Статус</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($records as $record)
                                    <tr>
                                        <td>
                                            <strong>{{ $record->doctor->surname }} {{ mb_substr($record->doctor->name, 0, 1) }}. {{ mb_substr($record->doctor->patronymic, 0, 1) }}.</strong><br>

                                        </td>
                                        <td>{{ $record->doctor->post->name }}</td>
                                        <td>
                                            {{ $record->doctor->room->number }} ({{ $record->doctor->room->name }})<br>
                                            <small class="text-muted">Этаж {{ $record->doctor->room->floor }}</small>
                                        </td>
                                        <td>
                                            {{ $record->record_date->format('d.m.Y') }}<br>
                                            <small class="text-muted">{{ $record->record_date->format('H:i') }}</small>
                                        </td>
                                        <td>
                                            @if($record->record_date->isPast())
                                                <span class="badge bg-secondary">Завершено</span>
                                            @elseif($record->record_date->isToday())
                                                <span class="badge bg-warning">Сегодня</span>
                                            @else
                                                <span class="badge bg-success">Запланировано</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <h5>У вас пока нет записей</h5>
                            <p class="text-muted">Запишитесь на прием к врачу</p>
                            <a href="{{ route('appointment.create') }}" class="btn btn-primary">Записаться к врачу</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.cancel-record').click(function() {
                let recordId = $(this).data('record-id');
                let button = $(this);

                if (confirm('Вы уверены, что хотите отменить запись?')) {
                    $.ajax({
                        url: '/records/' + recordId,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        beforeSend: function() {
                            button.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span>');
                        },
                        success: function(response) {
                            button.closest('tr').fadeOut(300, function() {
                                $(this).remove();
                            });
                        },
                    });
                }
            });
        });
    </script>
@endsection
