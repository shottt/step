<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'STEP') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="l-container">
        <header class="l-header">
            <h1 class="l-header__logo">
                <a class="l-header__logo-link" href="/">STEP</a>
            </h1>
            <nav class="l-header__nav-menu js-toggle-sp-menu-target">
                @auth
                <ul class="c-menu">
                    <li class="c-menu__item">
                        <a class="c-menu__link" href="/steplist">STEP一覧</a>
                    </li>
                    <li class="c-menu__item">
                        <a class="c-menu__link" href="/step_register">STEP登録</a>
                    </li>
                    <li class="c-menu__item">
                        <a class="c-menu__link" href="/mypage">マイページ</a>
                    </li>
                    <li class="c-menu__item">
                        <button class="c-menu__button" @click="logout">ログアウト</button>
                    </li>
                </ul>
                @else
                <ul class="c-menu">
                    <li class="c-menu__item">
                        <a class="c-menu__link" href="/login">ログイン</a>
                    </li>
                    <li class="c-menu__item">
                        <a class="c-menu__link" href="/register">ユーザー登録</a>
                    </li>
                    </ul>
                @endauth
            </nav>
        </header>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="l-footer">
            <p class="l-footer__text">Copyright &copy; 2020 STEP. All Rights Reserved</p>
        </footer>
    </div>
</body>
</html>
