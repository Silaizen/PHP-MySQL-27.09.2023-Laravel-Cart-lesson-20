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
                        <p>Результаты голосования:</p>
                        <ul>
                            <!-- Здесь вы можете отобразить результаты голосования -->
                            <!-- Например, переберите варианты ответов и покажите количество голосов для каждого варианта -->
                            <li>Вариант ответа 1: {{ $vote->getOptionVotes(1) }} голосов</li>
                            <li>Вариант ответа 2: {{ $vote->getOptionVotes(2) }} голосов</li>
                            <!-- Добавьте другие варианты ответов по мере необходимости -->
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection