<?php


namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class VoteController extends Controller
{
    public function create()
    {
        return view('votes.create'); // соответствующее представление
    }

    public function store(Request $request)
    {
        // Валидация данных формы
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        // Создание нового голосования
        $vote = new Vote();
        $vote->title = $request->input('title');
        $vote->description = $request->input('description');
        $vote->start_time = $request->input('start_time');
        $vote->end_time = $request->input('end_time');
        $vote->save();

        // Редирект на страницу с информацией о созданном голосовании
        return redirect()->route('view.vote', ['id' => $vote->id]);
    }

    public function view($id)
    {
        //$vote = Vote::find($id);

       // if (!$vote) {
       //     abort(404);
       // }

       $vote = Vote::findOrFail($id);
        return view('votes.view', compact('vote'));
        //return view('votes.view', ['vote' => $vote]);
    }

    public function vote(Request $request, $id)
    {
        $vote = Vote::find($id);

        if (!$vote) {
            abort(404);
        }

        // В этом методе вы можете обработать голос пользователя и сохранить его результат в базе данных
        // Добавьте код для обработки голоса здесь

        return redirect()->route('results.vote', ['id' => $vote->id]);
    }

    public function results($id)
    {
        $vote = Vote::find($id);

        if (!$vote) {
            abort(404);
        }

        // В этом методе вы можете отобразить результаты голосования
        // Получите результаты голосования из базы данных и передайте их в представление

        return view('votes.results', ['vote' => $vote]);
    }
}