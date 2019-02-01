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
    <!--<header class="header"> -->
    <!--    <div class="logo-login">-->
    <!--        <div class="header-wrapper">-->
    <!--            <section>-->
    <!--                <a href="{{url('/') }}"><img src="/image/icon.jpg" alt="TOP画像" class="example1"></a>-->
    <!--            </section>-->
    <!--        </div>-->
    <!--    </div>-->
        
    <!--    <div class="sp-header-user-img">-->
    <!--        <a href="{{url('/mypage') }}"><img src="/image/user.jpg" width="50" height="50" class="icon2"></a>-->
    <!--        <a href="{{url('/items_create') }}"><div class="box2">出品する</div></a>-->
    <!--    </div>-->
            
    <!--</header>-->
    
    <header class="header">
        <div class="headerLogo" >
            <a href="{{url('/') }}" ><img src="/image/icon.jpg" alt="TOP画像" class="example1 icon1"></a>
        </div>
        
        <div>
            <a href="{{url('/mypage') }}" ><img src="/img/prof/{{Auth::user()->prof_img}}" width="50" height="50" class="icon2"></a> <!-- "/image/user.jpg" -->
            <a href="{{url('/items_create') }}" class="box2">出品する</a>
        </div>
            
    </header>
    
    
    
    <!--<header class="header" class="sp-header visible-sp">-->
    <!--    <div class="logo-login">-->
    <!--        <div class="header-wrapper">-->
    <!--            <section class="toplogo">-->
    <!--                <a href="index2.php"><img src="/image/icon.jpg" alt="TOP画像" class="example1 icon1"></a>-->
    <!--            </section>-->
    <!--        </div>-->

    <!--        <div class="sp-header-user-img">-->
    <!--        <a href="{{url('/') }}"><img src="/image/icon.jpg" alt="TOP画像" class="example1 icon1"></a>      -->
    <!--        </div>-->
    <!--        <div>-->
    <!--        <a class="" href=" ">ログアウト</a>-->
    <!--        ◯◯さん、こんにちは！-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</header>-->
    
    
    <!--<div>-->
    <!--    <div class="container">-->
    <!--        <div><a href="items_detail_search.blade.php"><img class="card-img" src="/image/user.jpg"></a></div>-->
    <!--        <div><h3>悩んだ時の駆け込み寺</h3></div>-->
    <!--        <div class="balloon1"><p>テキーラが飲みたい！</p></div>-->
    <!--    </div>    -->
        
    <!--</div>-->

    <div class="pc-view">
    @foreach ($items as $item)
    <!--アイテム カード-->
    <div class="card">
        <div class="service-img"> 
        <!--<a href="{{url('/items_detail_search') }}"><img src="/image/user.jpg" class="service-img"></a>-->
        <a href="{{url('/items_detail_search')."/".$item->id}}"><img src="/img/{{$item->user_id}}/{{$item->item_img1}}" class="service-img"></a>
        </div>

        <!--アイテム詳細-->
        <div class="service-detail">
            
            <!--アイテム名-->
            <!--<div><p class="service-title">悩んだ時の駆け込み寺</p>-->
            <!--</div>-->
            <div>
                <p class="service-title">{{$item->item_name}}</p>
            </div>
            
            <!-- ユーザーアイコン, ユーザー名 ※一旦ユーザーIDのみ -->
            <div>
                <!--<div class ="service-user-info">-->
                <!--    <img src="/image/user.jpg" class="user-icon">-->
                <!--    <p class =name>saki</p>-->
                <!--</div>-->
                
                <div class ="service-user-info">
                    
                    <!-- user icon -->
                    <!--<img src="/image/user.jpg" class="user-icon">-->
                    <img src="/img/prof/{{$item->prof_img}}" class="user-icon">
                    
                    <!-- user icon -->
                    <p class =name>{{$item->user_name}}</p>
                    
                </div>
            </div>
            
            <!--タグ ※一旦ダミーのみ-->
            <div>
                <div class="box">
                    <p>お悩み</p>
                </div>
                <div class="box">
                    <p>お悩み</p>
                </div>
                <div class="box">
                    <p>お悩み</p>
                </div>
                <div class="box">
                    <p>お悩み</p>
                </div>
                <div class="box">
                    <p>お悩み</p>
                </div>
                <div class="box">
                    <p>お悩み</p>
                </div>
            </div>
        </div>
        
        <!--アイテムステータス-->
        <div class ="service-status">
            
            <!--料金-->
            <div class="service-price">
                <!--<p class="price">10分/1,000円</p>-->
                <p class="price">{{$item->item_price}}円</p>
            </div>
            
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
                        <img src="/image/heart.jpg" class="heart-icon">
                    </div>    
                    <div>
                        <p class="heart-count">121</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!--一言-->
        <!--<div class="balloon1 child"><p>はじめまして！</p>-->
        <div class="balloon1 child"><p>{{$item->item_comment}}</p>
        </div>   
    </div>
    <!--アイテム カード-->
    @endforeach
    
    <div>
        {{ $items->links()}} 
    </div>
    
<!--    <section>-->
<!--        ここから下が商品一覧です-->
        
<!--    </section>-->
    

<!--<h1>Neenee テストページだよ</h1>-->
<!--<p>これはトップページです</p>-->
<!--<p>これが表示されたら、私は発狂するくらい嬉しいです</p>-->

<!--<a href="{{url('/new')}}">新規登録</a>-->

</div>
</body>

</html>