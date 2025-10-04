@extends('layouts.app')

@section('title', 'Запись к врачу')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Запись на прием к врачу</h4>
                </div>
                <div class="card-body">
                    <div id="message"></div>

                    <form id="appointmentForm">
                        @csrf

                        <div class="mb-3">
                            <label for="post_id" class="form-label">Специальность врача</label>
                            <select class="form-control" id="post_id" name="post_id" required>
                                <option value="">Выберите специальность</option>
                                @foreach($posts as $post)
                                    <option value="{{ $post->id }}">{{ $post->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3" id="doctorSection" style="display: none;">
                            <label for="doctor_id" class="form-label">Выберите врача</label>
                            <select class="form-control" id="doctor_id" name="doctor_id" required>
                                <option value="">Загрузка врачей...</option>
                            </select>
                            <div id="doctorInfo" class="mt-2"></div>
                        </div>

                        <div class="mb-3" id="dateSection" style="display: none;">
                            <label for="record_date" class="form-label">Дата и время приема</label>
                            <input type="datetime-local" class="form-control" id="record_date" name="record_date"
                                   min="{{ now()->addDay()->format('Y-m-d\T08:00') }}"
                                   max="{{ now()->addMonth()->format('Y-m-d\T18:00') }}" required>
                            <div class="form-text">Запись доступна с завтрашнего дня</div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submitBtn" style="display: none;">
                            Записаться на прием
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#post_id').change(function() {
                let postId = $(this).val();

                if (!postId) {
                    $('#doctorSection, #dateSection, #submitBtn').hide();
                    return;
                }

                $('#doctorSection').show();
                $('#doctor_id').html('<option value="">Загрузка...</option>');
                $('#doctorInfo, #dateSection, #submitBtn').hide();

                $.get('/get-doctors/' + postId, function(doctors) {
                    if (doctors.length === 0) {
                        $('#doctor_id').html('<option value="">Нет врачей</option>');
                        $('#doctorInfo').html('<div class="alert alert-warning">Нет врачей по этой специальности</div>').show();
                        return;
                    }

                    let options = '<option value="">Выберите врача</option>';
                    $.each(doctors, function(index, doctor) {
                        options += `<option value="${doctor.id}" data-exp="${doctor.experience}" data-room="${doctor.room}">${doctor.name}</option>`;
                    });
                    $('#doctor_id').html(options);
                });
            });

            $('#doctor_id').change(function() {
                let selected = $(this).find('option:selected');

                if (!this.value) {
                    $('#doctorInfo, #dateSection, #submitBtn').hide();
                    return;
                }

                $('#doctorInfo').html(`
            <div class="card">
                <div class="card-body">
                    <h6>Информация о враче:</h6>
                    <p class="mb-1"><strong>Опыт:</strong> ${selected.data('exp')}</p>
                    <p class="mb-0"><strong>Кабинет:</strong> ${selected.data('room')}</p>
                </div>
            </div>
        `).show();

                $('#dateSection, #submitBtn').show();
            });

            $('#appointmentForm').submit(function(e) {
                e.preventDefault();
                let btn = $('#submitBtn');

                btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span> Отправка...');

                $.post('{{ route("appointment.store") }}', $(this).serialize(), function() {
                    $('#message').html('<div class="alert alert-success">Запись успешна!</div>');
                    $('#appointmentForm')[0].reset();
                    $('#doctorSection, #dateSection, #submitBtn').hide();
                    btn.prop('disabled', false).html('Записаться на прием');
                });
            });
        });
    </script>
@endsection
