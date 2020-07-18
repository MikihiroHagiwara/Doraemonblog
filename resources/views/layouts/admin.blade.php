<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-epuiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <body style="padding-top:50px">
            <nav class="navbar fixed-top navbar-expand-md navbar-light" style="background-color: #e3f2fd;">
                <a class="navbar-brand" href="">
                    <img src="https://2.bp.blogspot.com/-qo1-jw0Mn78/ViipGqI56RI/AAAAAAAAzv0/IL0njuWFSb0/s800/sweets_dorayaki_one.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    ドラえもんから学ぼう
                </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#切替表示されるコンテンツ名" aria-controls="切替表示されるコンテンツ名" aria-expanded="false" aria-label="ナビゲーション切替">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="切替表示されるコンテンツ名">
                        <ul class="navbar-nav mr-auto"></ul>
                        <ul class="navbar-nav ml-auto"></ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="検索キーワード" aria-label="検索キーワード">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
                        </form>
                    </div> 
            </nav>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>