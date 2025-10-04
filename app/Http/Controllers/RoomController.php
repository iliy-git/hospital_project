<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:512',
            'floor' => 'required|integer|min:-2|max:9',
            'number' => 'required|integer|min:-200|max:900',
        ]);

        Room::create($request->all());
        return redirect()->route('rooms.index')->with('success', 'Кабинет создан успешно!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $room = Room::with('doctors')->findOrFail($id);
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:512',
            'floor' => 'required|integer|min:-2|max:9',
            'number' => 'required|integer|min:-200|max:900',
        ]);

        $room = Room::findOrFail($id);
        $room->update($request->all());
        return redirect()->route('rooms.index')->with('success', 'Кабинет обновлен успешно!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Кабинет удален успешно!');
    }
}
