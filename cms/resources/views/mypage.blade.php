<!DOCTYPE html>

<html lang="ja">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neenee-お悩み相談</title>
    <link rel="stylesheet" href="{{ secure_asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{ secure_asset('css/style.css')}}">

</head>    

    <header class="header">　
        <div class="headerLogo" >
            <a href="{{url('/') }}" ><img src="/image/icon3.jpg" alt="TOP画像" class="example1 icon1"></a>
        </div>
        
        <div>
            <!--アイコン画像-->
            <a href="{{url('/mypage') }}" ><img src="/img/prof/{{Auth::user()->prof_img}}" width="50" height="50" class="icon2"></a> <!-- "/image/user.jpg" -->
            <!--出品画像-->
            <!--<a href="{{url('/items_create') }}" class="box2">出品する</a>-->
        </div>
            
    </header>
    
    <div class="pc-view">
    <!--ユーザー登録情報-->
    <div class="sales-header3">
        <p class="sales-header-text">登録情報の確認</p>
    </div>
    
    <div class="prf">
        <div class="prf2">
            <label class="label">プロフィール画像</label><br>
        </div> 
        
        <div class="prf2">
            <!--<img src="/image/user.jpg" class="user_icon">-->
            <img src="/img/prof/{{Auth::user()->prof_img}}" class="user_icon">
        </div>
        
        <div>
            <input type="file" name="file_upload" ><br>
            <input type="submit" value="アップロード">
       </div>
       
       <!--ユーザー名-->
       <div class="prf2">
           <label class="label">名前</label><br>
           <!--<p>そうちゃん</p>-->
           <p>{{ Auth::user()->name }}</p>
       </div>
       
       <div class="prf2">
           <label class="label">メールアドレス</label><br>
           <!--<p>test@test.com</p>-->
           <p>{{ Auth::user()->email }}</p>
       </div>
       
       
       
    </div> 
    
    <br>

    <div class="profile-button">
        <a href="{{url('/items_create')}}"><button class="buy-button3">出品する</button></a>
    </div>
    
    <div class="profile-button">
        <a href="{{url('/items_list_sell')}}"><button class="buy-button3">出品一覧</button></a>
    </div>
    <div class="profile-button">
        <a href="{{url('/') }}"><button class="buy-button3">TOPにもどる</button></a>
    </div>

    <!--ログアウト-->
    <div class="profile-button">
        <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            <button class="buy-button3">ログアウト</button>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

  </div>
 </body>
    
</html>      