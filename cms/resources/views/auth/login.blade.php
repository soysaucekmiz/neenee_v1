<!DOCTYPE html>

<html lang="ja">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neenee-お悩み相談</title>
    <link rel="stylesheet" href="{{ secure_asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ secure_asset('css/reset.css')}}">
    
</head>    


<body>
    
    <header class="header">
        <div class="headerLogo" >
            <a href="{{url('/') }}" ><img src="/image/icon.jpg" alt="TOP画像" class="example1 icon1"></a>
        </div>
        
        <div>
            <!-- <a href="{{url('/mypage') }}" ><img src="/image/user.jpg" width="50" height="50" class="icon2"></a>
            <a href="{{url('/items_create') }}" class="box2">出品する</a> -->
        </div>
            
    </header>




<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <!-- email -->
                        <div class="form-group row">
                            <label for="email" class="label">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} textarea-default2" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- email -->
                        <br>
                        
                        <!-- password -->
                        <div class="form-group row">
                            <label for="password" class="label">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} textarea-default2" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- password -->
                        <br>
                        
                        <!-- remember me -->
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('パスワードを保存する') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- remember me -->

                        <br>
                        <!-- submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                
                                <!-- button -->
                                <button type="submit" class="buy-button">
                                    {{ __('ログイン') }}
                                </button>
                                <!-- button -->

                                <br>
                                <br>
                                <!-- forget -->
                                @if (Route::has('password.request'))
                                    <a class="label2" href="{{ route('password.request') }}">
                                        {{ __('パスワードをお忘れの方') }}
                                    </a>
                                @endif
                                <!-- forget -->
                                
                                <!-- register （仮） -->
                                <br>
                                <a class="label2" href="{{url('/register/')}}">新規登録</a>
                                <br>
                                <!-- register （仮） -->

                            </div>
                        </div>
                        <!-- submit -->
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>