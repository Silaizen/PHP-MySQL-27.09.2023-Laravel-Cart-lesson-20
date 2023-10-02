@extends('layouts.app') <!-- Предполагается, что у вас есть макет layouts/app.blade.php -->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $vote->title }}</div>

                <div class="card-body">
                    <p>{{ $vote->description }}</p>

                    @if ($vote->isExpired())
                        <p class="text-danger">Голосование закрыто</p>
                    @else
                        <p>Голосование открыто с {{ $vote->start_time }} до {{ $vote->end_time }}</p>
                        <form method="POST" action="{{ route('view.vote', ['id' => $vote->id]) }}">
                            @csrf
                            <!-- Здесь вы можете добавить варианты ответов для голосования -->
                            <!-- Например, для каждого варианта добавьте поле ввода или кнопку -->
                            <div class="form-group">
                                <label for="option1">Вариант ответа 1</label>
                                <input type="radio" name="option" id="option1" value="1" required>
                            </div>

                            <div class="form-group">
                                <label for="option2">Вариант ответа 2</label>
                                <input type="radio" name="option" id="option2" value="2" required>
                            </div>

                            <!-- Добавьте другие варианты ответов по мере необходимости -->

                            <button type="submit" class="btn btn-primary">Проголосовать</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection