<!DOCTYPE html>

<html lang="ja">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Neenee-お悩み相談</title>
        <link rel="stylesheet" href="{{ secure_asset('css/style.css')}}">
        <link rel="stylesheet" href="{{ secure_asset('css/reset.css')}}">
        
    </head>    

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
    <div class="sales-header">
        <p class="sales-header-text">出品した商品の一覧</p>
    </div>

    @foreach ($items as $item)
    <!--アイテム カード-->
    <div class="card">
        <div class="service-img"> 
        <!--<a href="{{url('/items_detail_search') }}"><img src="/image/user.jpg" class="service-img"></a>-->
        <a href="{{url('/items_detail_sell')."/".$item->id}}"><img src="/img/{{$item->user_id}}/{{$item->item_img1}}" class="service-img"></a>
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
                    
                    <!-- user name -->
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
        
        <!--※テスト中-->
        <!-- 本の更新ボタン -->
        <td>
            <form action="{{url('items_edit/'.$item->id)}}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">
                    <i class="glyphicon glyphicon-pencil"></i>編集
                </button>
            </form>
        </td>
        
        <!--本の削除ボタン-->
        <!--<td>-->
        <!--    <form action="{{url('items/delete/'.$item->id)}}" method="POST">-->
        <!--        {{ csrf_field() }}-->
        <!--        <button type="submit" class="btn btn-danger">-->
        <!--            <i class="glyphicon glyphicon-trash"></i>削除-->
        <!--        </button>-->
        <!--    </form>-->
        <!--</td>-->
        
    </div>
    <!--アイテム カード-->
    @endforeach

    <div>
        {{ $items->links()}}
    </div>


    <!--<div>-->
        <!-- エラー共通部品 -->
        <!-- @include('common.errors') -->
        
    <!--</div>-->

    <!--<div>-->
    <!--    <a href="{{url('/items_create')}}">アイテム出品（登録）</a>-->
    <!--    <a href="{{url('/items_list_search')}}">アイテム一覧（検索）</a>-->
    <!--    <a href="{{url('/items_list_sell')}}">アイテム一覧（出品）</a>-->
    <!--</div>-->

    <!--<div>-->
        <!-- アイテム一覧（検索） -->
    <!--    @if (count($items)>0)-->
    <!--        <div>-->
    <!--            <h1>アイテム一覧</h1>-->
    <!--        </div>-->
    <!--        <div>-->
    <!--            @foreach ($items as $item)-->
    <!--            <div>-->
    <!--                <div>{{$item->item_name}}</div>-->
    <!--                <div>{{$item->user_id}}</div>-->
    <!--                <div>{{$item->item_comment}}</div>-->
    <!--                <div>{{$item->item_description}}</div>-->
    <!--                <div>{{$item->item_price}}</div>-->
                    
                    <!--<div>{{$item->item_cov_img}}</div>-->
                    <!--<div>{{$item->item_img1}}</div>-->
                    <!--<div>{{$item->item_img2}}</div>-->
                    <!--<div>{{$item->item_img3}}</div>-->
                    
    <!--                <div><img src="/img/{{$item->user_id}}/{{$item->item_cov_img}}" alt="カバー画像登録なし"></div>-->
    <!--                <div><img src="/img/{{$item->user_id}}/{{$item->item_img1}}" alt="イメージ画像1登録なし"></div>-->
    <!--                <div><img src="/img/{{$item->user_id}}/{{$item->item_img2}}" alt="イメージ画像1登録なし"></div>-->
    <!--                <div><img src="/img/{{$item->user_id}}/{{$item->item_img3}}" alt="イメージ画像1登録なし"></div>-->

                    <!-- 本の更新ボタン -->
    <!--                <td>-->
    <!--                    <form action="{{url('items_edit/'.$item->id)}}" method="POST">-->
    <!--                        {{ csrf_field() }}-->
    <!--                        <button type="submit" class="btn btn-primary">-->
    <!--                            <i class="glyphicon glyphicon-pencil"></i>更新-->
    <!--                        </button>-->
    <!--                    </form>-->
    <!--                </td>-->
                    
                    <!-- 本の削除ボタン -->
    <!--                <td>-->
    <!--                    <form action="{{url('items/delete/'.$item->id)}}" method="POST">-->
    <!--                        {{ csrf_field() }}-->
    <!--                        <button type="submit" class="btn btn-danger">-->
    <!--                            <i class="glyphicon glyphicon-trash"></i>削除-->
    <!--                        </button>-->
    <!--                    </form>-->
    <!--                </td>-->

    <!--                <br>-->
    <!--            </div>-->
    <!--            @endforeach-->
    <!--        </div>-->
    <!--        <div>-->
    <!--            {{ $items->links()}}-->
    <!--        </div>-->
    <!--    @endif-->
    <!--</div>-->

</div>
</body>

</html>