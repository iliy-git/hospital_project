<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Post;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index()
    {
        $records = Record::with('user', 'doctor')
            ->get()
            ->unique(function ($record) {
                return $record->user_id . '-' . $record->doctor_id . '-' . $record->record_date;
            });
        return view('records.index', compact('records'));
    }

    public function create()
    {
        $users = User::all();
        $doctors = Doctor::all();
        return view('records.create', compact('users', 'doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:doctors,id',
            'record_date' => 'required|date',
        ]);

        Record::create($request->all());
        return redirect()->route('records.index')->with('success', 'Запись создана успешно!');
    }

    public function edit($id)
    {
        $record = Record::findOrFail($id);
        $users = User::all();
        $doctors = Doctor::all();
        return view('records.edit', compact('record', 'users', 'doctors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:doctors,id',
            'record_date' => 'required|date',
        ]);

        $record = Record::findOrFail($id);
        $record->update($request->all());
        return redirect()->route('records.index')->with('success', 'Запись обновлена успешно!');
    }

    public function destroy($id)
    {
        $record = Record::findOrFail($id);
        $record->delete();
        return redirect()->route('records.index')->with('success', 'Запись удалена успешно!');
    }

    public function createAppointment()
    {
        $posts = Post::all();
        return view('appointment.create', compact('posts'));
    }

    public function storeAppointment(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'record_date' => 'required|date|after:now',
        ]);

        $existingRecord = Record::where('user_id', auth()->id())
            ->where('doctor_id', $request->doctor_id)
            ->where('record_date', $request->record_date)
            ->first();

        if ($existingRecord) {
            if ($request->ajax()) {
                return response()->json([
                    'errors' => [
                        'record_date' => ['У вас уже есть запись к этому врачу на выбранное время']
                    ]
                ], 422);
            }
            return back()->withErrors(['record_date' => 'У вас уже есть запись к этому врачу на выбранное время']);
        }

        $doctorBusy = Record::where('doctor_id', $request->doctor_id)
            ->where('record_date', $request->record_date)
            ->exists();

        if ($doctorBusy) {
            if ($request->ajax()) {
                return response()->json([
                    'errors' => [
                        'record_date' => ['Это время уже занято. Выберите другое время.']
                    ]
                ], 422);
            }
            return back()->withErrors(['record_date' => 'Это время уже занято. Выберите другое время.']);
        }

        Record::create([
            'user_id' => auth()->id(),
            'doctor_id' => $request->doctor_id,
            'record_date' => $request->record_date,
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('appointment.create')->with('success', 'Вы успешно записаны к врачу!');
    }

    public function getDoctorsByPost($postId)
    {
        $doctors = Doctor::with('post', 'room')
            ->where('post_id', $postId)
            ->get()
            ->map(function ($doctor) {
                return [
                    'id' => $doctor->id,
                    'name' => $doctor->surname . ' ' . $doctor->name . ' ' . $doctor->patronymic,
                    'experience' => $doctor->experience,
                    'room' => $doctor->room->number . ' (' . $doctor->room->name . ') (этаж ' . $doctor->room->floor . ')',
                ];
            });

        return response()->json($doctors);
    }
    public function myRecords()
    {
        $records = Record::with('doctor.post', 'doctor.room')
            ->where('user_id', auth()->id())
            ->orderBy('record_date', 'desc')
            ->get()
            ->unique(function ($record) {
                return $record->doctor_id . $record->record_date->format('Y-m-d H:i');
            });

        return view('records.my', compact('records'));
    }

    public function getDoctorBusyHours(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date_format:Y-m-d',
        ]);

        $busyTimes = Record::where('doctor_id', $request->doctor_id)
            ->whereDate('record_date', $request->date)
            ->pluck('record_date')
            ->map(function ($datetime) {
                return $datetime->format('H:i');
            });

        return response()->json($busyTimes);
    }

}
