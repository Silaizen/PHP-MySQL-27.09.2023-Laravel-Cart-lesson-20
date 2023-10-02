<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Voting System</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('main') }}">Главная</a></li>
                @if (Auth::check())
                    <!-- Показать только для авторизованных пользователей -->
                    <li><a href="{{ route('create.vote.form') }}">Создать голосование</a></li>
                    <li><a href="{{ route('manage.candidates') }}">Управление кандидатами</a></li>
                    <!-- Добавьте другие ссылки на функции администратора здесь -->
                @endif
            </ul>
        </nav>
    </header>
    <main>
        <h1>Добро пожаловать в систему голосования</h1>

        @if (Auth::check())
        <!-- Показать только для авторизованных пользователей -->
        <p>Вы вошли как {{ Auth::user()->name }}</p>
    @else
        <!-- Показать только для неавторизованных пользователей -->
        <p>Чтобы начать голосование, <a href="{{ route('register') }}">зарегистрируйтесь</a> или <a href="{{ route('login') }}">войдите</a> в систему.</p>
    @endif

     <p>Здесь можно добавить информацию о том, как работает система голосования, какие голосования доступны, и т. д.</p>

    <h2>Популярные голосования</h2>
    <ul>
        <!-- Здесь можно отобразить список популярных голосований -->
        @foreach($votes as $vote)
        <li>
            <a href="{{ route('view.vote', ['id' => $vote->id]) }}">
                {{ $vote->title }}
            </a>
        </li>
    @endforeach
        <!-- Добавьте другие голосования по мере их создания -->
    </ul>
</main>
</body>
</html>