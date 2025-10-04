<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Post;
use App\Models\Room;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('post', 'room')->get();
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        $posts = Post::all();
        $rooms = Room::all();
        return view('doctors.create', compact('posts', 'rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'patronymic' => 'required|string|max:255',
            'experience' => 'required|string',
            'birth_date' => 'required|date',
            'room_id' => 'required|exists:rooms,id',
            'post_id' => 'required|exists:posts,id',
        ]);

        Doctor::create($request->all());
        return redirect()->route('doctors.index')->with('success', 'Врач создан успешно!');
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $posts = Post::all();
        $rooms = Room::all();
        return view('doctors.edit', compact('doctor', 'posts', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'patronymic' => 'required|string|max:255',
            'experience' => 'required|string',
            'birth_date' => 'required|date',
            'room_id' => 'required|exists:rooms,id',
            'post_id' => 'required|exists:posts,id',
        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->update($request->all());
        return redirect()->route('doctors.index')->with('success', 'Врач обновлен успешно!');
    }

    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Врач удален успешно!');
    }
}
