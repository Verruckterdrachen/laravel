@extends('layouts.layout', ['title' => "Пост №$post->post_id. $post->title"])

@section('content')

    <div class="row justify-content-center text-left">
        <div class="col-10">
            <div class="card">
                <div class="card-header"><h2 class="mb-0 py-3">{{ $post->title }}</h2></div>
                <div class="card-body">
                    <img src="{{ $post->img ?? asset('img/cat.jpeg') }}" alt="cat" class="card-img card-img_max">
                    <div class="card-desc my-4 p-4 bg-light text-dark">{{ $post->desc }}</div>
                    <h5 class="card-author my-0">Автор: {{ $post->name }}</h5>
                    <div class="card-date py-3">Пост создан: {{ $post->created_at->diffForHumans()}}</div>
                    <div class="card-btn">
                        <a href="{{ route('post.index') }}" class="btn btn-primary mr-3 mb-3">На главную</a>
                        @auth
                            @if((Auth::user()->id == $post->author_id) or (Auth::user()->id == '10'))
                            <a href="{{ route('post.edit', ['id' => $post->post_id]) }}" class="btn btn-secondary mb-3">Редактировать</a>
                            <form action="{{ route('post.destroy', ['id' => $post->post_id]) }}" method="post" onsubmit="if(confirm('Точно удалить пост?')) { return true } else { return false }">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить">
                            </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
