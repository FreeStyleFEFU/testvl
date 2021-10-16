<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Лента модерации</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"/>
</head>
<body class="container d-flex flex-column" style="background: #ebebeb">
    @foreach($posts as $post)
    <div class="row p-4" style="background: #f5f5f5">
        <div class="card shadow col-12 col-xl-10 p-2">
            <div class="card-body row">
                <div class="col-12 py-1 d-flex flex-row justify-content-between" style="border-bottom: 1px solid #f5f5f5">
                    <div>
                        {{ $post['publishDate'] }} - {{ $post['publishDateString'] }}
                    </div>
                    <div>
                        <i class="fas fa-user"></i>
                        {{ $post['ownerLogin'] }}
                    </div>
                </div>
                <div class="col-12 pt-2">
                    <h5 class="card-title" style="font-size: 1.5rem">{{$post['bulletinSubject']}}</h5>
                </div>
                <div class="col-12 col-md-8">
                    {{$post['bulletinText']}}
                </div>
                <div class="col-12 col-md-4 d-flex flex-row justify-content-center flex-md-column justify-content-md-start py-2" style="border-left: 1px solid #f5f5f5">
                    @if (gettype($post['bulletinImagees']) == 'string')
                        <img src="{{$post['bulletinImagees']}}" class="m-1" style="object-fit: contain; max-height: 170px; max-width: 170px" />
                    @else
                        @foreach($post['bulletinImagees'] as $image)
                            <img src="{{$image}}" class="m-1" style="object-fit: contain; max-height: 170px; max-width: 170px" />
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-2 d-flex flex-column">
            <?php
            $menu = [
                [
                    'title' => 'Одобрить',
                    'color' => 'darkseagreen',
                    'action' => 'Пробел',
                ],
                [
                    'title' => 'Отклонить',
                    'color' => 'orange',
                    'action' => 'Del',
                ],
                [
                    'title' => 'Эскалация',
                    'color' => 'blue',
                    'action' => 'Shift+Enter',
                ],
                [
                    'title' => 'Сохранить',
                    'action' => 'F7',
                ],
            ];

            ?>
            @foreach ($menu as $m)
                <div class="moderator-menu"><b>{{ $m['title'] }}</b>
                    &nbsp;
                    @if (isset($m['color']))
                        <span style="font-size: 1.5rem; color: {{ $m['color'] }} ">•</span>
                    @else
                        &nbsp;
                    @endif
                    &nbsp;
                    <b style="color: gray ">{{ $m['action'] }}</b>
                </div>
            @endforeach
        </div>
    </div>
    @endforeach
</body>
</html>
<style>
    .moderator-menu {
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        height: 36px;
    }
</style>
