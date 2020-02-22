@extends('layouts.app')

@section('content')
<div class="l-form-container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="c-form">
        <h2 class="c-form__title">パスワードリセット</h2>
        @csrf
        <label for="email">メールアドレス</label>
        <input id="email" type="email" class="c-form__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="c-form__button">
            <button type="submit" class="c-button-right">
                送信する
            </button>
        </div>
    </form>
</div>
@endsection