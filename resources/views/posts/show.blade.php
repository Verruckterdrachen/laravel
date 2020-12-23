@extends('layouts.layout', ['title' => "Пост №$post->post_id. $post->title"])

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h3>{{ $post->title }}</h3></div>
                <div class="card-body">
                    <img src="{{ $post->img ?? asset('img/cat.jpeg') }}" alt="cat" class="card-img card-img_max">
                    <div class="card-desc">Описание: {{ $post->desc }}</div>
                    <div class="card-author">Автор: {{ $post->name }}</div>
                    <div class="card-date">Пост создан: {{ $post->created_at->diffForHumans()}}</div>
                    <div class="card-btn">
                        <a href="{{ route('post.index') }}" class="btn btn-outline-primary">На главную</a>
                        <a href="{{ route('post.edit', ['id' => $post->post_id]) }}" class="btn btn-outline-secondary">Редактировать</a>
                        <form action="{{ route('post.destroy', ['id' => $post->post_id]) }}" method="post" onsubmit="if(confirm('Точно удалить пост?')) { return true } else { return false }">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-outline-danger" type="submit" value="Удалить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
