<!DOCTYPE html>

<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neenee-お悩み相談</title>
    <link rel="stylesheet" href="{{ secure_asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{ secure_asset('css/style.css')}}">


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
            <a href="{{url('/') }}" ><img src="/image/icon5.png" alt="TOP画像" class="example1 icon1"></a>
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


            <!--タグ ※一旦ダミーのみ-->
            <div class="tag_box">
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
        </div>


        <!--一言-->
        <!--<div class="balloon1 child"><p>はじめまして！</p>-->
        <div class="balloon1 child"><p>{{$item->item_comment}}</p>
        </div>

        <!-- ユーザーアイコン, ユーザー名 ※一旦ユーザーIDのみ -->
        <div class ="service-user-info">

            <!-- user icon -->
            <!--<img src="/image/user.jpg" class="user-icon">-->
            <img src="/img/prof/{{$item->prof_img}}" class="user-icon">

            <!-- user icon -->
            <p class =name>{{$item->user_name}}</p>

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
            <!--<div class="">-->
                <!--<p class="price">10分/1,000円</p>-->
            <!--    <p class="price">{{$item->item_price}}円</p>-->
            <!--</div>-->
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
