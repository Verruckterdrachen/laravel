@extends('layouts.layout', ['title' => "Главная страница"])

@section('content')

    @if(isset($_GET['search']))
        @if(count($posts)>0)
            <h2>Результаты поиска по запросу "<?=htmlspecialchars($_GET['search'])?>"</h2>
            <?php
            function declOfNum($num, $titles): string {
                    $cases = array(2, 0, 1, 1, 1, 2);
                    return $num . " " . $titles[($num % 100 > 4 && $num % 100 < 20) ? 2 : $cases[min($num % 10, 5)]];
            }?>
            <p class="lead">Всего найдено: {{declOfNum(count($posts), array('пост', 'поста', 'постов'))}} </p>
        @else
            <h2>По запросу "<?=htmlspecialchars($_GET['search'])?>" ничего не найдено</h2>
            <a href="{{ route('post.index') }}" class="btn btn-outline-primary">Посмотреть все посты</a>
        @endif
    @endif

    <div class="row">
        @foreach($posts as $post)
            <div class="col-6">
                <div class="card">
                    <div class="card-header"><h3>{{ $post->short_title }}</h3></div>
                    <div class="card-body">
                        <img src="{{ $post->img ?? asset('img/cat.jpeg') }}" alt="cat" class="card-img">
                        <div class="card-author">Автор: {{ $post->name }}</div>
                        <a href="{{ route('post.show', ['id' => $post->post_id]) }}" class="btn btn-outline-primary">Посмотреть пост</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if(!isset($_GET['search']))
        {{ $posts->links() }}
    @endif

@endsection
