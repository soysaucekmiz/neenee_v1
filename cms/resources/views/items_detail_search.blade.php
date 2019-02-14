<!DOCTYPE html>

<html lang="ja">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neenee-お悩み相談</title>
    <link rel="stylesheet" href="{{ secure_asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{ secure_asset('css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{ secure_asset('css/slick.css')}}" >
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="{{ secure_asset('js/slick.js')}}"></script>
    <link rel="stylesheet" href="{{ secure_asset('css/style.css')}}">

      
    

    
</head>    

<body>
    <!--ヘッダ-->
    <header class="header">
        <div class="headerLogo" >
            <a href="{{url('/') }}" ><img src="/image/icon3.jpg" alt="TOP画像" class="example1 icon1"></a>
        </div>
        
        @if(Auth::user())
            <div>
                <!--アイコン画像-->
                <a href="{{url('/mypage') }}" ><img src="/img/prof/{{Auth::user()->prof_img}}" width="50" height="50" class="icon2"></a> <!-- "/image/user.jpg" -->
                <!--出品画像-->
                <!--<a href="{{url('/items_create') }}" class="box2">出品する</a>-->
            </div>
        @else
        <div>
            <!--アイコン画像-->
                <a href="{{url('/login') }}" class="box2">ログイン</a>
                <!--出品画像-->
                <!--<a href="{{url('/items_create') }}" class="box2">出品する</a>-->
            </div>
        @endif
            
    </header>
    
<div class="pc-view">
    
    <div class="card">
    
        <!--アイテム画像-->
        <div class='container '>
            <div class='single-item item-img'>
              <div class="item_size" style="background:url(/img/{{$item->user_id}}/{{$item->item_img1}}) center no-repeat;background-size:contain;"></div>
              
              @if($item->item_img2)
                <div class="item_size" style="background:url(/img/{{$item->user_id}}/{{$item->item_img2}}) center no-repeat;background-size:contain;"></div>
              @endif

              @if($item->item_img3)
                  <div class="item_size" style="background:url(/img/{{$item->user_id}}/{{$item->item_img3}}) center no-repeat;background-size:contain;"></div>
              @endif

            </div>
        </div>
        

    <!--<br> -->
        
        <!--<div class="img-list">-->
        <!--    <img img src="/img/{{$item->user_id}}/{{$item->item_img1}}" alt="アイテム画像1" class="item-img" >-->
        <!--</div>-->
    
        <!--アイテム名-->
        <div>
            <!--<p class="profile-title">悩んだ時の駆け込み寺</p>-->
            <p class="profile-title">{{$item->item_name}}</p>
        </div>
    
        <!-- item_id(表には出ていない) -->
        <div>
            <input type="hidden" id="item_id" value="{{$item->user_id}}">
        </div>
        
        <!--タグ ※一旦ダミー-->
        <div class="tab">
            <div class="box">
                <p>恋愛</p>
            </div>
            <div class="box">
                <p>失恋</p>
            </div>
            <div class="box">
                <p>浮気</p>
            </div>
            <div class="box">
                <p>片想い</p>
            </div>
            <div class="box">
                <p>家族</p>
            </div>
            <div class="box">
                <p>寂しい</p>
            </div>
        </div>
        
        <!--一言-->
        <div class="balloon1 child">
            <!--<p>はじめまして！</p>-->
            <p>{{$item->item_comment}}</p>
        </div>
    
        <!-- ユーザーアイコン, ユーザー名 ※一旦ユーザーIDのみ -->
        <div class ="service-user-info">
            
            <!-- user icon -->
            <!--<img src="/image/user.jpg" class="user-icon">-->
            <img src="/img/prof/{{$item->prof_img}}" class="user-icon">
            
            <!-- user icon -->
            <p class =name>{{$item->user_name}}</p>
            
            <img src="/image/tw.jpg" class="twitter">

            
        </div>
        <!--<div class ="service-user-info">-->
        <!--    <img src="/image/user.jpg" class="user-icon">-->
        <!--    <p class =name>saki</p>-->
        <!--</div>-->
        
        <!--お気に入り数と金額 ※一旦ダミーのみ-->
        <div class="service-price">
            
            <!--お気に入り数 ※一旦ダミーのみ-->
            <div>
                <div class="service-star">
                    <div>
                        <img src="/image/star.jpg" class="star-icon">
                        <img src="/image/star.jpg" class="star-icon">
                        <img src="/image/star.jpg" class="star-icon">
                        <img src="/image/star.jpg" class="star-icon">
                        <img src="/image/star.jpg" class="star-icon">
                    </div>
                    <div>
                        <p class="star-count">(55件)</p>
                    </div>
                    <div>
                        <img src="/image/heart2.jpg" class="heart-icon">
                    </div>    
                    <div>
                        <p class="heart-count">121</p>
                    </div>
                </div>
            </div>
            
            <!--料金-->
            <div class="service-price">
                <!--<p class="price">10分/1,000円</p>-->
                <p class="price2">{{$item->item_price}}円</p>
            </div>
            
        </div>
    
        <!--決済ボタン-->
        <div class="profile-button">
            <a href="{{url('/items_tran')."/".$item->id }}"><button class="buy-button">相談をはじめる</button></a>
        </div>
        <!--カバー画像-->
        <!--<div class="profile-header" style="background: url(/img/{{$item->user_id}}/{{$item->item_cov_img}}) center no-repeat;background-size:cover;">-->
            <!--<img src="/image/bts.jpg" alt="プロフィールヘッダー画像"class="profile-header-img" >-->
            <!--<img src="/img/{{$item->user_id}}/{{$item->item_cov_img}}" alt="プロフィールヘッダー画像"class="profile-header-img" >-->
        <!--</div>-->
    
        <!--出品ユーザー情報-->
        <!--<div class="item_block">-->
            <!--ユーザー画像 -->
        <!--    <div class="profile-img"> -->
                <!--<img src="/image/user.jpg" class="profile-icon">-->
        <!--        <img src="/img/prof/{{$item->prof_img}}" class="profile-icon">-->
        <!--    </div>-->
            
            <!--ユーザー情報詳細-->
        <!--    <div class="profile-detail">-->
                
                <!--ユーザー名 -->
        <!--        <div class ="profile-user-info">-->
                        <!--<p class =name2>saki</p>-->
        <!--                <p class =name2>{{$item->user_name}}</p>-->
        <!--        </div>-->
                
                <!--お気に入り数 ※一旦ダミー-->
        <!--        <div class="service-star2">-->
        <!--            <div>-->
        <!--                <img src="/image/star.jpg" class="star-icon">-->
        <!--                <img src="/image/star.jpg" class="star-icon">-->
        <!--                <img src="/image/star.jpg" class="star-icon">-->
        <!--                <img src="/image/star.jpg" class="star-icon">-->
        <!--                <img src="/image/star.jpg" class="star-icon">-->
        <!--            </div>-->
        <!--            <div>-->
        <!--                <p class="star-count">(55件)</p>-->
        <!--            </div>-->
        <!--            <div>-->
        <!--                <img src="/image/heart.jpg" class="heart-icon">-->
        <!--            </div>    -->
        <!--            <div>-->
        <!--                <p class="heart-count">121</p>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
            
            
            
            
            
            
            
            <!--アイテム画像３つ-->
            <!--<div class="img-list">-->
            <!--    <img img src="/img/{{$item->user_id}}/{{$item->item_img1}}" alt="アイテム画像1" class="item-img" >-->
            <!--    <img img src="/img/{{$item->user_id}}/{{$item->item_img2}}" alt="アイテム画像2" class="item-img" >-->
            <!--    <img img src="/img/{{$item->user_id}}/{{$item->item_img3}}" alt="アイテム画像3" class="item-img" >-->
            <!--</div>-->
            
            
            
            <!--アイテム説明-->
            <div class="profile-text">
                <!--<p>おはこんばんちわ！遅刻ギリギリでもう-->
                <!--        大変！前髪パーラーをつけながら外に出ち-->
                <!--        ゃった22歳大学生のサキです。<br>-->
    
                <!--        こんなドジな私ですが、過去にはめっちゃ-->
                <!--        メンヘラでした。でも、今は何とか人生-->
                <!--        エンジョイ勢で頑張って呼吸してます。-->
                <!--        嫌な事の特効薬は、人と話すこととお酒だ-->
                <!--        なと思いました。人生悩んだら是非こんな-->
                <!--        私とお話してみましょう！<br>-->
    
                <!--        Let’s everyday 酒クズ<br>-->
    
                <!--        最近の癒しは韓流見ながら長風呂すること-->
                <!--        です。風呂場だから泣いてもオッケーだね！<br>-->
                <!--        あはは-->
                <!--</p>-->
                <p>{{$item->item_description}}</p>
            </div>
            
            <!--アイテム料金-->
            <!--<div class="profile-price">-->
                    <!--<p class="price2">10分/1,000円</p>-->
            <!--        <p class="price2">{{$item->item_price}}円</p>-->
            <!--</div>-->
            
            
            
        </div>

    </div>
</div>    


<script>
        $(function(){
            console.log("test");
          $('.single-item').slick({
            accessibility: true,
            autoplay: true,
            autoplaySpeed: 100000,
            dots: true,
            fade: true,
          });
        });
        </script>




</body>
    
</html>    