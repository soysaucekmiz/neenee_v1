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
            <a href="{{url('/') }}" ><img src="/image/icon2.jpg" alt="TOP画像" class="example1 icon1"></a>
        </div>
        
        <div>
            <a href="{{url('/mypage') }}" ><img src="/image/user.jpg" width="50" height="50" class="icon2"></a>
            <a href="{{url('/items_create') }}" class="box2">出品する</a>
        </div>
            
    </header>
    
    <div class="pc-view">
    <div class="sales-header">
        <p class="sales-header-text">商品の出品/登録</p>
    </div>
    

    <div>
        <!-- バリデーションエラー用 -->
        @include('common.errors')

        <!-- アイテム登録フォーム -->
        <form action="{{url('/items/update')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
        
        <div class="prf">

            <!-- id -->
            <input type="hidden" name="id" value="{{$item->id}}" />
            
            <!-- item_name -->
            <div class="prf2">
                <label class="label" for="item_name">商品タイトル</label><br>
                <!--<input type="text" id="item_name" name="item_name">-->
                <textarea input type="text" id="item_name" name="item_name"  class="textarea-default">{{$item->item_name}}</textarea>
            </div>
        
        
            <!-- item_cov_img -->
            <!--<div class="prf2">-->
            <!--    <label class="label" for="item_cov_img">カバー写真</label><br>-->
                <!--<input type="text" id="item_cov_img" name="item_cov_img">-->
            <!--    <input type="file" id="item_cov_img" name="item_cov_img" value="{{$item->item_cov_img}}">-->
            <!--</div>-->
            
            <!-- item_img1 -->
            <div class="prf2">
                <label class="label" for="item_img1">イメージ写真1</label>
                <!--<input type="text" id="item_img1" name="item_img1">-->
                <input type="file" id="item_img1" name="item_img1" value="{{$item->item_img1}}">
            </div>
            
            <!-- item_img2 -->
            <div class="prf2">
                <label class="label" for="item_img2">イメージ写真2</label>
                <!--<input type="text" id="item_img2" name="item_img2">-->
                <input type="file" id="item_img2" name="item_img2" value="{{$item->item_img2}}">
            </div>

            
            <!-- item_img3 -->
            <div class="prf2">
                <label class="label" for="item_img3">イメージ写真3</label>
                <!--<input type="text" id="item_img3" name="item_img3">-->
                <input type="file" id="item_img3" name="item_img3" value="{{$item->item_img3}}">
            </div>
       
           <!-- item_description --> 
            <div class="prf2">
                <label class="label" for="item_description">商品説明</label><br>
                <textarea input type="text" id="item_description" name="item_description" class="textarea-default">{{$item->item_description}}</textarea>
            </div>
            
            <!-- item_comment --> 
            <div class="prf2">
                <label class="label" for="item_comment">ひとこと</label><br>
                <!--<input type="text" id="item_name" name="item_name">-->
                <textarea input type="text" id="item_comment" name="item_comment" class="textarea-default2">{{$item->item_comment}}</textarea>
            </div>
            
            <!-- item_price -->
            <div class="prf2">
                <label class="label" for="item_price">単価（円）</label>
                <textarea input type="text" id="item_price" name="item_price" class="textarea-default2">{{$item->item_price}}</textarea>
            </div>
            
            <br>
            <!-- button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button class="ok-button" type="submit" class="btn btn-default">
                        <i class="glyphicon glyphicon-plus"></i>更新
                    </button>
                    <a class="btn btn-link pull-right" href="{{ url('/items_list_sell') }}">
                        <i class="glyphicon glyphicon-backward"></i>Back
                    </a>
                </div>
            </div>
        </form>
    </div>
    </div>
</html>


<!--過去の栄光-->
<!--extends layout app, section content は削除-->
    <!-- <div>
        <a href="{{url('/items_create')}}">アイテム出品（登録）</a>
        <a href="{{url('/items_list_search')}}">アイテム一覧（検索）</a>
        <a href="{{url('/items_list_sell')}}">アイテム一覧（出品）</a>        
    </div> -->

    <div>
        <!-- バリデーションエラー用 -->
        @include('common.errors')

        <!-- アイテム登録フォーム -->
        <!--<form action="{{url('/items/update')}}" method="post">-->
    <!--    <form action="{{url('/items/update')}}" method="post" enctype="multipart/form-data">-->
    <!--        {{ csrf_field() }}-->
            
            <!-- id -->
    <!--        <input type="hidden" name="id" value="{{$item->id}}" />-->

            <!-- item_name -->
    <!--        <div class="form-group">-->
    <!--            <label for="item_name">アイテム名</label>-->
    <!--            <input type="text" id="item_name" name="item_name" value="{{$item->item_name}}">-->
    <!--        </div>-->

            <!-- item_comment -->
    <!--        <div class="form-group">-->
    <!--            <label for="item_comment">一言</label>-->
    <!--            <input type="text" id="item_comment" name="item_comment" value="{{$item->item_comment}}">-->
    <!--        </div>-->

            <!-- item_description -->
    <!--        <div class="form-group">-->
    <!--            <label for="item_description">アイテム説明</label>-->
    <!--            <input type="text" id="item_description" name="item_description" value="{{$item->item_description}}">-->
    <!--        </div>-->

            <!-- item_price -->
    <!--        <div class="form-group">-->
    <!--            <label for="item_price">単価（円）</label>-->
    <!--            <input type="text" id="item_price" name="item_price" value="{{$item->item_price}}">-->
    <!--        </div>-->

            <!-- item_cov_img -->
    <!--        <div class="form-group">-->
    <!--            <label for="item_cov_img">カバー写真</label>-->
                <!--<input type="text" id="item_cov_img" name="item_cov_img" value="{{$item->item_cov_img}}">-->
    <!--            <input type="file" id="item_cov_img" name="item_cov_img" value="{{$item->item_cov_img}}">-->
    <!--        </div>-->

            <!-- item_img1 -->
    <!--        <div class="form-group">-->
    <!--            <label for="item_img1">イメージ写真1</label>-->
                <!--<input type="text" id="item_img1" name="item_img1" value="{{$item->item_img1}}">-->
    <!--            <input type="file" id="item_img1" name="item_img1" value="{{$item->item_img1}}">-->
    <!--        </div>-->

            <!-- item_img2 -->
    <!--        <div class="form-group">-->
    <!--            <label for="item_img2">イメージ写真2</label>-->
                <!--<input type="text" id="item_img2" name="item_img2" value="{{$item->item_img2}}">-->
    <!--            <input type="file" id="item_img2" name="item_img2" value="{{$item->item_img2}}">-->
    <!--        </div>-->

            <!-- item_img3 -->
    <!--        <div class="form-group">-->
    <!--            <label for="item_img3">イメージ写真3</label>-->
                <!--<input type="text" id="item_img3" name="item_img3" value="{{$item->item_img3}}">-->
    <!--            <input type="file" id="item_img3" name="item_img3" value="{{$item->item_img3}}">-->
    <!--        </div>-->

            <!-- button -->
    <!--        <div class="form-group">-->
    <!--            <div class="col-sm-offset-3 col-sm-6">-->
    <!--                <button type="submit" class="btn btn-default">-->
    <!--                    <i class="glyphicon glyphicon-plus"></i>登録-->
    <!--                </button>-->
    <!--                <a class="btn btn-link pull-right" href="{{ url('/items_list_sell') }}">-->
    <!--                    <i class="glyphicon glyphicon-backward"></i>Back-->
    <!--                </a>-->
    <!--            </div>-->
    <!--        </div>-->

    <!--    </form>-->
    <!--</div>-->

<!--endsection は削除-->