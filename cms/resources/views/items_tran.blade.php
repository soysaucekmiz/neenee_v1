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
    <!--<div class="sales-header">-->
    <!--    <p class="sales-header-text">お支払い方法の選択</p>-->
    <!--</div>-->
    
    <!--アイテム情報-->
    
    <div class="card">
        
        <!--アイテムイメージ画像1-->
        <div class="service-img2">
            <!--<a href="profile2.php?id=a"><img src="/image/user.jpg" class="service-img"></a>-->
            <a href="/items_detail_search/{{$item->id}}"><img src="/img/{{$item->user_id}}/{{$item->item_img1}}" class="service-img"></a>
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
        
        
       <!--ユーザーアイコン, ユーザー名 ※一旦ダミーとユーザーID--> 
        <div class ="service-user-info">
                    <!-- user icon -->
                    <!--<img src="/image/user.jpg" class="user-icon">-->
                    <img src="/img/prof/{{$item->prof_img}}" class="user-icon">
                    
                    <!-- user name -->
                    <!--<p class =name>saki</p>-->
                    <p class =name>{{$item->user_name}}</p>
                </div>
        <!--お気に入り数 ※一旦ダミー-->
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
    </div>
    
    <!--アイテム料金-->
    <!--<div class="sales-price">-->
    <div class="card">
        <div class="tran-price">
            <p class="tran-price-1">お支払い金額</p>
            
            <!--<p class="price4">10分/1,000円</p>-->
            <p class="tran-price2">{{$item->item_price}}円</p>
        </div>
    </div>
    
        
    
<!--</div>-->

<!--お支払い方法-->
<div>
    <div class="sales-header3">
        <p class="sales-header-text">お支払い方法</p>
    </div>
    
    <div class="sales-way">
        <label class="sales-way-button">
            <input type="radio" name="first" value="msg" class="sales-way-radio">クレジットカード
            <textarea id="msg" style="display:none" name="msg"></textarea>
        </label>
    </div>

    <div class="sales-way">
        <label class="sales-way-button">
            <input type="radio" name="first" value="msg" class="sales-way-radio">携帯キャリア
            
            <textarea id="msg" style="display:none" name="msg"></textarea>
        </label>
    </div>

    <div class="sales-way">
        <label class="sales-way-button">
            <input type="radio" name="first" value="msg" class="sales-way-radio">コンビニ払い
            <textarea id="msg" style="display:none" name="msg"></textarea>
        </label>
    </div>

    <div class="sales-way">
        <label class="sales-way-button">
            <input type="radio" name="first" value="msg" class="sales-way-radio">BitCash
            <textarea id="msg" style="display:none" name="msg"></textarea>
        </label>
    </div>

    <div class="sales-way">
        <label class="sales-way-button">
            <input type="radio" name="first" value="msg" class="sales-way-radio">銀行振込
            <textarea id="msg" style="display:none" name="msg"></textarea>
        </label>
    </div>

</div>

<div class="profile-button">
    <a href="{{url('/items_tran_confirm')."/".$item->id }}"><button class="buy-button3">確認する</button></a>
</div>    
    
</div>    
</body>
    
</html>   