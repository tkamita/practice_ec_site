<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index() {
        $stocks = Stock::Paginate(6);
        return view('shop',compact('stocks'));
    }

    public function myCart() {
        $carts = Cart::all();
        return view('mycart', compact('carts'));
    }

    public function addMycart(Request $request) {
        $user_id = Auth::id();
        $stock_id = $request->stock_id;

        // stock_idとuser_idが同じレコードが存在しないか確認
        $cart_add_info = Cart::firstOrCreate(['stock_id' => $stock_id, 'user_id' => $user_id]);

        // 同じレコードがないか
        if ($cart_add_info -> wasRecentlyCreated) {
            $message = 'カートに追加しました';
        } else {
            $message = 'カートに登録済みです';
            //カートに同じ商品を複数入れたい時はここに記述する
            // +1させる処理
        }

        $carts = Cart::where('user_id', $user_id) -> get();

        return view('mycart', compact('carts', 'message'));
    }
}
