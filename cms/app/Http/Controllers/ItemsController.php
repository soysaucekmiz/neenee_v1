<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Validator;
use Auth;
use App\User;
use DB;

class ItemsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Constructor（auth認証）
    |--------------------------------------------------------------------------
    */
    public function __construct(){
        $this->middleware('auth')->except(['showIndex', 'showDetail']); // テスト中;
    }

    /*
    |--------------------------------------------------------------------------
    | Create
    |--------------------------------------------------------------------------
    */

    // アイテム 作成 （画面）
    public function create(){
        return view('items_create');
    }

    // アイテム 作成 （処理）
    public function store(Request $request){
        // バリデーション
        $validator = Validator::make($request->all(),[
            'item_name' => 'required|max:25',
            'item_comment' => 'required|max:30',
            'item_description' => 'required|max:1000',
            'item_price' => 'required|max:11',
            'item_cov_img' => 'nullable|image', // テスト中
            'item_img1' => 'required|image', // テスト中
            'item_img2' => 'nullable|image', // テスト中
            'item_img3' => 'nullable|image', // テスト中
        ]);
        // バリデーションエラー
        if ($validator->fails()){
            return redirect('/items_create')
                ->withInput()
                ->withErrors($validator);
        }
        // Eloquent Model
        $items = new Item;
        $items->user_id = Auth::user()->id;
        $items->item_name = $request->item_name;
        $items->item_comment = $request->item_comment;
        $items->item_description = $request->item_description;
        $items->item_price = $request->item_price;
        
        // カバー画像 ※テスト中
        // $items->item_cov_img = $request->item_cov_img; // 後で消す
        $userId = Auth::user()->id; //userIdじゃなくてこのアイテムのIDが欲しい・・・
        // if (!file_exists(public_path()."/img/".$userId)) { // 一旦public_path()は放棄
            //mkdir(public_path()."/img/".$userId, 0777, TRUE);
        // }
        if (!file_exists("/home/neenee/www/img/".$userId)) {
            mkdir("/home/neenee/www/img/".$userId, 0777, TRUE); 
        }

        if ($request->hasFile('')){
            $itemcov_name = uniqid("itemcov_").".".$request->file('item_cov_img')->guessExtension();
            // $request->file('item_cov_img')->move(public_path()."/img/".$userId, $itemcov_name); // 一旦public_path()は放棄
            $request->file('item_cov_img')->move("/home/neenee/www/img/".$userId, $itemcov_name);
            $items->item_cov_img = $itemcov_name;
        }
        
        // アイテムイメージ1 ※テスト中
        // $items->item_img1 = $request->item_img1; // 後で消す
        $itemimg1_name = uniqid("itemimg1_").".".$request->file('item_img1')->guessExtension();
        // $request->file('item_img1')->move(public_path()."/img/".$userId, $itemimg1_name); // 一旦public_path()は放棄
        $request->file('item_img1')->move("/home/neenee/www/img/".$userId, $itemimg1_name);
        $items->item_img1 = $itemimg1_name;
        
        // アイテムイメージ2 ※テスト中
        if ($request->hasFile('')){
            // $items->item_img2 = $request->item_img2; // 後で消す
            $itemimg2_name = uniqid("itemimg2_").".".$request->file('item_img2')->guessExtension();
            // $request->file('item_img2')->move(public_path()."/img/".$userId, $itemimg2_name); // 一旦public_path()は放棄
            $request->file('item_img2')->move("/home/neenee/www/img/".$userId, $itemimg2_name);
            $items->item_img2 = $itemimg2_name;
        }
        
        // アイテムイメージ3 ※テスト中
        if ($request->hasFile('')){
            // $items->item_img3 = $request->item_img3; // 後で消す
            $itemimg3_name = uniqid("itemimg3_").".".$request->file('item_img3')->guessExtension();
            // $request->file('item_img3')->move(public_path()."/img/".$userId, $itemimg3_name); // 一旦public_path()は放棄
            $request->file('item_img3')->move("/home/neenee/www/img/".$userId, $itemimg3_name);
            $items->item_img3 = $itemimg3_name;
        }

        // 保存
        $items->save();
        // リダイレクト
        return redirect('items_list_sell');
    }


    /*
    |--------------------------------------------------------------------------
    | Read
    |--------------------------------------------------------------------------
    */

    // ※初期※ アイテム 一覧 検索 (画面)
    public function show(){
        // original
        $items = Item::orderBy('created_at', 'desc')->paginate(5);
        return view('items_list_search', [
            'items' => $items,
        ]);
    }
    
    // ※テスト中
    // アイテム 一覧 検索 (画面): ホーム
    public function showIndex(){
        
        // original
        // $items = Item::orderBy('created_at', 'desc')->paginate(5);
        // return view('index', [
        //     'items' => $items,
        // ]);
        
        // test2 ここが作業中だよ
        $items = DB::table('items')
            ->join('users','items.user_id','=','users.id')
            ->select('items.*', 'users.name as user_name', 'users.prof_img as prof_img')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
            //->get();
        return view('index', [
            'items' => $items,
        ]);
    }

    // アイテム 一覧 出品 (画面) 
    public function showSellingItems(){
        
        // original
        // $items = Item::where('user_id', Auth::user()->id)
        //     ->orderBy('created_at', 'desc')
        //     ->paginate(5);
        // return view('items_list_sell', [
        //     'items' => $items,
        // ]);
        
        // test2 ここが作業中だよ
        $items = DB::table('items')
            ->join('users','items.user_id','=','users.id')
            ->where('items.user_id', '=', Auth::user()->id)
            ->select('items.*', 'users.name as user_name', 'users.prof_img as prof_img')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
            //->get();
        return view('items_list_sell', [
            'items' => $items,
        ]);
    }
    
    // アイテム 詳細 検索 (画面)
    // public function showDetail($item_id){ // Request $requestか？
        // $items = Item::where('user_id', Auth::user()->id)->find($item_id);
    //     return view('items_detail_search',[
    //         'item' => $items
    //      ]);
    // }
    public function showDetail($item_id){
        
        // original
        // $items = Item::find($item_id);
        // return view('items_detail_search', [
        //     'item' => $items, 
        // ]);

        // test1
        // $items = Item::find($item_id); 
        // $profs = User::where('id', $items)->first(); // テスト中
        // return view('items_detail_search', [
        //     'item' => $items, 
        //     'prof' => $profs, // テスト中
        // ]);
        
        // test2
        $items = DB::table('items')
            ->join('users','items.user_id','=','users.id')
            // ->select('items.*', 'users.*')
            ->select('items.*', 'users.name as user_name', 'users.prof_img as prof_img')
            ->where('items.id','=',$item_id)
            ->first();
        return view('items_detail_search', [
            'item' => $items, 
        ]);
        
        // test3
        // $items = Item::find('items')
        //     ->join('users', 'items.user_id', '=', 'users.id')
        //     ->get();
        // return view('items_detail_search', [
        //     'item' => $items,
        // ]);
    }
    
    // アイテム 詳細 出品 (画面)
    public function showDetailSell($item_id){
        
        // original
        // $items = Item::where('user_id', Auth::user()->id)->find($item_id);
        // return view('items_detail_sell',[
        //     'item' => $items
        //  ]);
         
         // test2
         $items = DB::table('items')
            ->join('users','items.user_id','=','users.id')
            ->where('items.id','=',$item_id)
            // ->select('items.*', 'users.*')
            ->select('items.*', 'users.name as user_name', 'users.prof_img as prof_img')
            ->first();
        return view('items_detail_search', [
            'item' => $items, 
        ]);
    }
    
    // ※テスト中
    // アイテム 決済 (画面)
    public function showTran($item_id){ // Request $requestか？
        // $items = Item::where('user_id', Auth::user()->id)->find($item_id);
        
        // original
        // $items = Item::find($item_id); // 不要なAuthを削除
        // return view('items_tran', [
        //     'item' => $items
        // ]);
        
        // test2
        $items = DB::table('items')
            ->join('users','items.user_id','=','users.id')
            // ->select('items.*', 'users.*')
            ->select('items.*', 'users.name as user_name', 'users.prof_img as prof_img')
            ->where('items.id','=',$item_id)
            ->first();
        return view('items_tran', [
            'item' => $items, 
        ]);
        
    }
    
    // ※テスト中
    // アイテム 決済確認 (画面)
    public function showTranConfirm($item_id){ // Request $requestか？
        // $items = Item::where('user_id', Auth::user()->id)->find($item_id);
        
        // original
        // $items = Item::find($item_id); // 不要なAuthを削除
        // return view('items_tran_confirm', [
        //     'item' => $items
        // ]);
        
        // test2
        $items = DB::table('items')
            ->join('users','items.user_id','=','users.id')
            // ->select('items.*', 'users.*')
            ->select('items.*', 'users.name as user_name', 'users.prof_img as prof_img')
            ->where('items.id','=',$item_id)
            ->first();
        return view('items_tran_confirm', [
            'item' => $items, 
        ]);
    }
    
    // アイテム チャット（画面）
    public function showChat($item_id){
        $items = Item::find($item_id);
        return view('chat', [
            'item' => $items
        ]);
    }
    
    // アイテム 電話チャット（画面）
    public function showCall($item_id){
        $items = Item::find($item_id);
        return view('call', [
            'item' => $items
        ]);
    }
    
    
    // アイテム ビデオチャット（画面）
    public function showVideo($item_id){
        $items = Item::find($item_id);
        return view('video', [
            'item' => $items
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */

    // アイテム 編集 出品 (画面)
    public function edit($item_id){
        $items = Item::where('user_id', Auth::user()->id)->find($item_id);
        return view('items_edit', [
            'item' => $items
        ]);
    }

    // アイテム 編集 出品 (処理)
    public function update(Request $request){
        // バリデーション
        $validator = Validator::make($request->all(), [
            'id' => 'required',

            'item_name' => 'required|max:25',
            'item_comment' => 'required|max:30',
            'item_description' => 'required|max:1000',
            'item_price' => 'required|max:11',
            
            // 'item_cov_img' => 'required|max:255',
            // 'item_img1' => 'required|max:255',
            // 'item_img2' => 'required|max:255',
            // 'item_img3' => 'required|max:255',
            
            'item_cov_img' => 'nullable|image', // required -> nullable
            'item_img1' => 'nullable|image', // required -> nullable
            'item_img2' => 'nullable|image', // required -> nullable
            'item_img3' => 'nullable|image', // required -> nullable
            
        ]);
        // バリデーションエラー
        if ($validator->fails()){
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        // データ更新
        $items = Item::where('user_id', Auth::user()->id)->find($request->id);
        $items->item_name = $request->item_name;
        $items->item_comment = $request->item_comment;
        $items->item_description = $request->item_description;
        $items->item_price = $request->item_price;
        
        // カバー画像 ※テスト中
        // $items->item_cov_img = $request->item_cov_img; // 元のコード
        // public_path()."/img/"
        $userId = Auth::user()->id; //userIdじゃなくてこのアイテムのIDが欲しい・・・
        if ($request->file('item_cov_img')){
            $itemcov_name = uniqid("itemcov_").".".$request->file('item_cov_img')->guessExtension();
            // $request->file('item_cov_img')->move(public_path()."/img/".$userId, $itemcov_name); // 一旦public_path()は放棄
            $request->file('item_cov_img')->move("/home/neenee/www/img/".$userId, $itemcov_name);
            $items->item_cov_img = $itemcov_name;
        }
        
        // アイテムイメージ1 ※テスト中
        // $items->item_img1 = $request->item_img1; // 元のコード
        if ($request->file('item_img1')){
            $itemimg1_name = uniqid("itemimg1_").".".$request->file('item_img1')->guessExtension();
            //$request->file('item_img1')->move(public_path()."/img/".$userId, $itemimg1_name); // 一旦public_path()は放棄
            $request->file('item_img1')->move("/home/neenee/www/img/".$userId, $itemimg1_name);
            $items->item_img1 = $itemimg1_name;
        }
        
        // アイテムイメージ2 ※テスト中
        // $items->item_img2 = $request->item_img2; // 元のコード
        if ($request->file('item_img2')){
            $itemimg2_name = uniqid("itemimg2_").".".$request->file('item_img2')->guessExtension();
            // $request->file('item_img2')->move(public_path()."/img/".$userId, $itemimg2_name); // 一旦public_path()は放棄
            $request->file('item_img2')->move("/home/neenee/www/img/".$userId, $itemimg2_name);
            $items->item_img2 = $itemimg2_name;
        }
        
        // アイテムイメージ3 ※テスト中
        // $items->item_img3 = $request->item_img3; // 元のコード
        if ($request->file('item_img3')){
            $itemimg3_name = uniqid("itemimg3_").".".$request->file('item_img3')->guessExtension();
            // $request->file('item_img3')->move(public_path()."/img/".$userId, $itemimg3_name); // 一旦public_path()は放棄
            $request->file('item_img3')->move("/home/neenee/www/img/".$userId, $itemimg3_name);
            $items->item_img3 = $itemimg3_name;
        }
        
        // 保存
        $items->save();
        // リダイレクト
        return redirect('items_list_sell');
    }


    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */

    // アイテム 削除 出品 (delete) 
    public function destroy(Item $item){
        $item->delete();
        return redirect('items_list_sell');    
    }
    // 下記、user_idが一致するものだけ削除許可しようと思ったがうまくいかなかった
    // public function destroy(Request $request){
    //     $items = Item::where('user_id', Auth::user()->id)->find($request->id);
    //     $items->delete();
    //     return redirect('home');
    // }

}
