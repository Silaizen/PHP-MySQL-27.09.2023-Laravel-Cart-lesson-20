@extends('layouts.app') <!-- Предполагается, что у вас есть макет layouts/app.blade.php -->

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактировать кандидата</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('candidates.update', ['id' => $candidate->id]) }}">
                            @csrf
                            @method('PUT') <!-- Используйте метод PUT для обновления кандидата -->
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $candidate->name) }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $candidate->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="vote_id">ID голосования</label>
                                <input type="number" name="vote_id" id="vote_id" class="form-control @error('vote_id') is-invalid @enderror" value="{{ old('vote_id', $candidate->vote_id) }}" required>
                                @error('vote_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>




                            
                            <!-- Здесь можно добавить другие поля формы для редактирования, если необходимо -->

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection