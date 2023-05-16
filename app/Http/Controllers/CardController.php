<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
    public function index()
    {
        
        $card = [];
        $products = [];

        error_log('lol');

        if(Session::has('card'))
        {
            $card = Session::get('card');
        }

        foreach ($card as $item)
        {
            error_log($item);
            $products[] = DB::table('products')->where('id', $item)->first();
        }

        return view('products.card', compact('products'));
    }

    public function add(string $id)
    {
        $card = [];
        
        if(!Session::has('card'))
        {
            Session::put('card', $card);
        }

        $card = Session::get('card');

        $card[] = $id;

        error_log($id);
        
        Session::put('card', $card);

        return redirect()->route('products.index')->with('success','Add to card successfully.');
    }

    public function destroy(Product $product)
    {
        // $product->delete();

        // error_log($product->id.$product->name);

        // return redirect()->route('products.index')
        //                ->with('success','product deleted successfully');
    }
}
