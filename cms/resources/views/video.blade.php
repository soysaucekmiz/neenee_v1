<!DOCTYPE html>
<html>
<head lang="ja">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neenee-お悩み相談</title>
    
    <link rel="stylesheet" href="{{ secure_asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ secure_asset('css/style2.css')}}">
    <link rel="stylesheet" href="{{ secure_asset('css/reset.css')}}">

    
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.webrtc.ecl.ntt.com/skyway-latest.js"></script>
    <script src="{{ secure_asset('/js/script.js') }}"></script>
</head>

<body>
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
    <!--アイテム情報-->
    <div>
        <p>アイテム名：{{$item->item_name}}</p>
        <p>出品者（ID）：{{$item->user_id}}</p>
        <input type="hidden" id="username" value="{{Auth::user()->name}}">
        <input type="hidden" id="item_id" value="{{$item->id}}">
        <input type="hidden" id="item_url" value="{{url('/items_detail_search')."/".$item->id}}">
    </div>
    
    <!--連絡方法-->
    <div class="tool-box">
        <div class="tool-box-child1">
            <a href="{{url('/chat')."/".$item->id }}"><p class="tool-box-name">チャット</p></a>
        </div>
        <div class="tool-box-child1">
            <a href="{{url('/call')."/".$item->id }}"><p class="tool-box-name">音声通話</p></a>
        </div>
        <div class="tool-box-child2">
            <p class="tool-box-name">TV通話</p>
        </div>
    </div>


<div class="videosContainer">
    <video id="myStream" autoplay muted="true" class="test"></video>
</div>


<div class="myControllerContainer">
    <!--<p>Your id: <span id="my-id">...</span></p>-->
    <br>
    <div class="select">
        <label for="audioSource">音声選択: </label><br>
        <select id="audioSource"></select>
    </div>
    <br>
    <div class="select">
        <label for="videoSource">カメラ選択: </label><br>
        <select id="videoSource"></select>
    </div>
    <br>
    <form id="make-call">
        <!--<input type="text" placeholder="Join room..." id="join-room"><br>-->
        <input type="hidden" value="neenee_video_{{$item->id}}" id="join-room"><br>
        <button class="ok-button" type="submit">通話を開始する</button>
    </form>
    <div id="end-call">
        <!--<p>Currently in room <span id="room-id">...</span></p>-->
        <button class="ok-button">通話をやめる</button>
    </div>

</div>

</div>
</body>
</html>