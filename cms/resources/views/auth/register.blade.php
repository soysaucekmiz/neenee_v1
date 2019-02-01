
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
            <a href="{{url('/') }}" ><img src="/image/icon3.jpg" alt="TOP画像" class="example1 icon1"></a>
        </div>
        
        <div>
            <!--<a href="{{url('/mypage') }}" ><img src="/image/user.jpg" width="50" height="50" class="icon2"></a>-->
            <!--<a href="{{url('/items_create') }}" class="box2">出品する</a>-->
        </div>
            
    </header>
    
    <div class="pc-view">
    <div class="sales-header3">
        <p class="sales-header-text">会員登録</p>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"> <!-- enctypeを追加 -->
                            @csrf
                            
                            <!-- name -->
                            <div class="form-group row">
                                <label for="name" class="label">{{ __('名前') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} textarea-default2" name="name" value="{{ old('name') }}" required autofocus>
    
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- name -->
                            
                            <!-- email -->
                            <div class="form-group row">
                                <label for="email" class="label">{{ __('メールアドレス') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} textarea-default2" name="email" value="{{ old('email') }}" required>
    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- email -->
                            
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
                            
                            <!-- password-confirm -->
                            <div class="form-group row">
                                <label for="password-confirm" class="label">{{ __('パスワード確認') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control textarea-default2" name="password_confirmation" required>
                                </div>
                            </div>
                            <!-- password-confirm -->
                            
                            <!-- prof_img -->
                            <div class="form-group row">
                                <label for="prof_img" class="label">{{ __('プロフィール写真') }}</label>
                                
                                <br>
                                <div class="col-md-6">
                                    <input id="prof_img" type="file" class="form-control{{ $errors->has('prof_img') ? ' is-invalid' : '' }} " name="prof_img">
    
                                    @if ($errors->has('prof_img'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('prof_img') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- prof_img -->
                            
                            <br>
                            <!-- button -->
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="buy-button3">
                                        {{ __('登録') }} <!-- 'Register' -> '登録' -->
                                    </button>
                                </div>
                            </div>
                            <!-- button -->
                            
                            <!-- login （仮） -->
                                <br>
                                <a class="label2" href="{{url('/login/')}}">ログイン</a>
                                <br>
                            <!-- login （仮） -->
                                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>