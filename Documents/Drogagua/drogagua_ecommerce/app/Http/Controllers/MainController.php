<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categories;

class MainController extends Controller
{
    public function index(){
        $produits = Produit::all();
        $categories = Categories::where('is_online', 1)->get();

        //dd($produits);

        return view('shop.index', compact('produits','categories'));
    }

    public function produit(Request $request){
        $produit = Produit::find($request->id);
        $categories = Categories::where('is_online', 1)->get();

        return view('shop.produit', compact('produit','categories'));
    }

    public function theCategories(Request $request){
        $categories = Categories::where('is_online', 1)->get();
        $produits = Produit::where('categorie_id',$request->id)->get();
        return view('shop.categories',compact('produits','categories'));
    }
}
