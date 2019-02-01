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
        <div class="tool-box-child2">
            <p class="tool-box-name">チャット</p></a>
        </div>
        <div class="tool-box-child1">
            <a href="{{url('/call')."/".$item->id }}"><p class="tool-box-name">音声通話</p>
        </div>
        <div class="tool-box-child1">
            <!--<a href="{{url('/video') }}"><p class="tool-box-name">TV通話</p></a>-->
            <a href="{{url('/video')."/".$item->id }}"><p class="tool-box-name">TV通話</p></a>
        </div>
    </div>
    
    <!-- コンテンツ表示画面 -->
<div class="chat1">
    <div class="message-content">
        
        <!-- メッセージ表示部分 -->
        <div id ="output" class="message-box"></div> 
        <!--<input type="hidden" id="username" value="test"> valueをAuthに変えて、上に移動しました-->
    </div>
</div>


<div class="chat2">
    <div class="message-content2">
        <!-- テキスト入力 -->
        <div><textarea id="text" class="textarea-default"></textarea>    
    </div>
</div>
<div class="chat3">
    <!-- ボタン入力 -->
    <div>
        <button id="send" class="btn-chat">コメントする</button> 
    </div>
</div>

<!--/ コンテンツ表示画面 -->


<!-- 以下JavaScript領域 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- 以下Firebase -->


<script src="https://www.gstatic.com/firebasejs/5.5.2/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyAlyknmDWYfk3d3vTafRQH0CVwfuuxRclc",
    authDomain: "chattapp-18a42.firebaseapp.com",
    databaseURL: "https://chattapp-18a42.firebaseio.com",
    projectId: "chattapp-18a42",
    storageBucket: "chattapp-18a42.appspot.com",
    messagingSenderId: "370779077703"
  };
  firebase.initializeApp(config);

    

    //送信
    // let newPostRef = firebase.database().ref(); //リアルタイムに取ってくる
    let newPostRef = firebase.database().ref('room/item_'+$('#item_id').val()); //アイテムIDごとに部屋を作るテスト

    //名前の登録
    $("#send").on("click",function(){
        console.log($("#username").val(),datedemo(),$("#type").val());
        //送りたい変数名
        newPostRef.push({
            username:$("#username").val(), 
            text:$("#text").val()
        });
        $("#text").val(""); //②中身を空にする
    });

    //受信
    newPostRef.on("child_added",function(data){ //受け取り用の変数「date」
        const v = data.val( ); //設計の問題で、ここにいれる
        const k = data.key;
        let str =""; //let→ここから変数だよ
        str += '<dl class="chat-unique-message">';     //str→文字列 +=→足し算して結果を左辺に入れる
            
            str += '<dt class="chat-name-blk">';
            
            str += '<img src="/image/user.jpg" class="chat-icon">'
            str += '<div class="chat-user">' + v.username +'</div>';
            
            str += '</dt>';
            str += '<dd class="chat-text">' + v.text + '</dd>';
            
        str += '</dl>';
        $("#output").append(str); 
        $('#output').animate({scrollTop: $('#output')[0].scrollHeight}, 0);
        console.log(v);
    });

    //エンター操作
    $("#text").on("keydown",function(e){
        if(e.keyCode == 13){
            fire(); //二回同じ処理が出てきたら関数名を使って、functionを呼んであげる
        }
    });

    //エンター操作の中身
    function fire(){     
        newPostRef.push({
            username: $("#username").val(), //usernameからJSで「text」値を取っていれる
            text: $("#text").val()
        });
        $("#text").val("");
    }   //pushする関数

    function datedemo() {
        var today = new Date();
            today.getMinutes();
            today.getFullYear();
            today.getMonth() + 1;
            today.getDate();
            var week = ["日","月","火","水","木","金","土","日"];
            today.getDay(); //中で配列変数で用意する 
            const t = today.getFullYear() + "/" +  today.getMonth() + "/"+ today.getDate()  + "/" + week[today];
            return t;
    }

        

    // // if(e.keyCode == 13){
    //         newPostRef.push({
    //         username:$("#username").val(), //usernameからJSで「text」値を取っていれる
    //         text:$("#text").val()
    //     });
    //     $("#text").val("");
    //     }
    // });


</script>
    
    
    
    
</div>    
</body>
    
</html>   