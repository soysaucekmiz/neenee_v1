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
    <!--ヘッダ-->
    <header class="header">　
        <div class="headerLogo" >
            <a href="{{url('/') }}" ><img src="/image/icon.jpg" alt="TOP画像" class="example1 icon1"></a>
        </div>
        
        <div>
            <a href="{{url('/mypage') }}" ><img src="/image/user.jpg" width="50" height="50" class="icon2"></a>
            <a href="{{url('/items_create') }}" class="box2">出品する</a>
        </div>
            
    </header>
    
    <div class="pc-view">
        <!--支払い情報-->
        <div class="sales-header">
        <p class="sales-header-text">お支払い方法の確定</p>
        </div>
        
        <!--アイテム情報-->
        <div>
        <div class="sales-card">
        
            <!--アイテムカバー画像-->
            <div class="service-img2"> 
                <!--<a href="profile2.php?id=a">-->
                <!--    <img src="/image/user.jpg" class="service-img">-->
                <!--</a> <-確認画面でCVR下げないようリンクは削除します -->
                <img src="/img/{{$item->user_id}}/{{$item->item_img1}}" class="service-img">
            </div>

            <!--アイテム詳細-->
            <div class="service-detail">
            
            <!--アイテム名-->
            <div>
                <!--<p class="service-title">悩んだ時の駆け込み寺</p>-->
                <p class="service-title">{{$item->item_name}}</p>
            </div>
            <!--出品者のアイコン、ユーザー名 ※一旦ダミー画像、ユーザーID-->
            <div>
                <div class ="service-user-info">
                    
                    <!-- user icon -->
                    <!--<img src="/image/user.jpg" class="user-icon">-->
                    <img src="/img/prof/{{$item->prof_img}}" class="user-icon">
                    
                    <!-- user name -->
                    <!--<p class =name>saki</p>-->
                    <!--<p class =name>{{$item->user_id}}</p>-->
                    <p class =name>{{$item->user_name}}</p>
                    
                </div>
            </div>
            
            <!--タグ ※一旦ダミー-->
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
                    <img src="/image/heart.jpg" class="heart-icon">
                </div>    
                <div>
                    <p class="heart-count">121</p>
                </div>
            </div>
        </div>
    </div>
    <!--</div> -->
    
    <!--料金-->
    <div class="sales-price">
        <p class="price3">お支払い金額</p>
        <!--<p class="price4">10分/1,000円</p>-->
        <p class="price4">{{$item->item_price}}円</p>
    </div>
</div> 

<div class="sales-header">
    <p class="sales-header-text">お支払い方法</p>
</div>
<div >
    <p class="sales-confirm-way">クレジットカード</p>
</div>
<div class="sales-confirm-attention">
    <div>
        <P class="attention">ご注意</p>
    </div>
    <ul class="order-attention2">
        
        <li>お振り込み完了後に出品者の都合でキャンセルになった場合は、
            ご指定の口座に返金いたします。
            （振込手数料は返金できかねますのでご了承ください）</li>
        <li>お振り込み完了後に出品者の都合でキャンセルになった場合は、
        ご指定の口座に返金いたします。
        （振込手数料は返金できかねますのでご了承ください）</li>    
        <li>お振り込み完了後に出品者の都合でキャンセルになった場合は、
            ご指定の口座に返金いたします。
            （振込手数料は返金できかねますのでご了承ください）</li>    
    </ul>
</div>
<div class="profile-button">
    <a href="{{url('/chat')."/".$item->id }}"><button class="buy-button">確定する</button></a>
</div>
    
    
    
    
   </div> 
    
    </body>
    
</html>   