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
                            <label class="form-label">Дата и время приема</label>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="record_day" class="form-label">Дата</label>
                                    <select class="form-control" id="record_day" required>
                                        <option value="">Выберите дату</option>
                                        @for ($day = now()->addDay(); $day <= now()->addMonth(); $day->addDay())
                                            <option value="{{ $day->format('Y-m-d') }}">
                                                {{ $day->format('d.m.Y') }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="record_time" class="form-label">Время</label>
                                    <select class="form-control" id="record_time" required>
                                        <option value="">Выберите время</option>
                                        @for ($hour = 8; $hour <= 17; $hour++)
                                            <option value="{{ sprintf('%02d:00', $hour) }}">
                                                {{ sprintf('%02d:00', $hour) }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <!-- Это скрытое поле, которое будет объединённым значением -->
                            <input type="hidden" id="record_date" name="record_date" required>

                            <div class="form-text mt-2">Доступно только с 08:00 до 17:00, начиная с завтрашнего дня</div>
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

            function updateRecordDate() {
                const day = $('#record_day').val();
                const time = $('#record_time').val();

                if (day && time) {
                    $('#record_date').val(`${day}T${time}`);
                } else {
                    $('#record_date').val('');
                }
            }

            function loadAvailableTimes() {
                const doctorId = $('#doctor_id').val();
                const selectedDate = $('#record_day').val();

                if (!doctorId || !selectedDate) {
                    $('#record_time').html('<option value="">Выберите время</option>');
                    return;
                }

                $.get('/doctor-busy-hours', {
                    doctor_id: doctorId,
                    date: selectedDate
                }, function (busyHours) {
                    const timeSelect = $('#record_time');
                    timeSelect.html('<option value="">Выберите время</option>');

                    for (let hour = 8; hour <= 17; hour++) {
                        const time = `${String(hour).padStart(2, '0')}:00`;
                        if (!busyHours.includes(time)) {
                            timeSelect.append(`<option value="${time}">${time}</option>`);
                        }
                    }
                });
            }

            $('#record_day, #record_time').on('change', updateRecordDate);

            $('#record_day').on('change', loadAvailableTimes);

            $('#doctor_id').on('change', function () {
                $('#record_time').html('<option value="">Выберите время</option>');
                $('#record_day').val('');
                $('#record_date').val('');
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
