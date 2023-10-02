<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function manage()
    {
        $candidates = Candidate::all();
        return view('candidates.manage', compact('candidates'));
    }

// Метод для отображения формы создания кандидата
public function create()
{
    return view('candidates.candidates_create');
}

// Метод для сохранения нового кандидата
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'vote_id' => 'required|integer',
    ]);

    Candidate::create([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'vote_id' => $request->input('vote_id'),
    ]);

    return redirect()->route('candidates.manage')->with('success', 'Кандидат успешно добавлен.');
}

// Метод для отображения формы редактирования кандидата
public function edit($id)
{
    $candidate = Candidate::findOrFail($id);
    return view('candidates.candidates_edit', compact('candidate'));
}

// Метод для обновления данных кандидата
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'vote_id' => 'required|integer',
    ]);

    $candidate = Candidate::findOrFail($id);
    $candidate->update([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'vote_id' => $request->input('vote_id'),
    ]);

    return redirect()->route('manage.candidates')->with('success', 'Данные кандидата обновлены.');
}

// Метод для удаления кандидата
public function destroy($id)
{
    $candidate = Candidate::findOrFail($id);
    $candidate->delete();
    return redirect()->route('candidates.manage')->with('success', 'Кандидат успешно удален.');
}


}