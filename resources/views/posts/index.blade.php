@extends('layouts.layout', ['title' => "Главная страница"])

@section('content')

    @if(isset($_GET['search']))
        @if(count($posts)>0)
            <div class="card text-center justify-content-center p-3 mb-5">
                <h3 class="mb-0 pb-3">Результаты поиска по запросу "<?=htmlspecialchars($_GET['search'])?>"</h3>
                <?php
                function declOfNum($num, $titles): string {
                        $cases = array(2, 0, 1, 1, 1, 2);
                        return $num . " " . $titles[($num % 100 > 4 && $num % 100 < 20) ? 2 : $cases[min($num % 10, 5)]];
                }?>
                <p class="lead mb-0">Всего найдено: {{declOfNum(count($posts), array('пост', 'поста', 'постов'))}} </p>
            </div>
        @else
            <div class="card text-center justify-content-center p-3 mb-5">
                <h3 class="mb-0 pb-4">По запросу "<?=htmlspecialchars($_GET['search'])?>" ничего не найдено</h3>
                <a href="{{ route('post.index') }}" class="btn btn-outline-primary py-3">Посмотреть все посты</a>
            </div>
        @endif
    @endif

    <div class="row justify-content-center text-center">
        @foreach($posts as $post)
            <div class="col-sm-6 mb-5">
                <div class="card">
                    <div class="card-header"><h2 class="mb-0 py-3">{{ $post->short_title }}</h2></div>
                    <div class="card-body">
                        <img src="{{ $post->img ?? asset('img/cat.jpeg') }}" alt="cat" class="card-img">
                        <h5 class="card-author py-4 mb-0">Автор: {{ $post->name }}</h5>
                        <a href="{{ route('post.show', ['id' => $post->post_id]) }}" class="btn btn-primary">Посмотреть пост</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if(!isset($_GET['search']))
        {{ $posts->links() }}
    @endif

@endsection
