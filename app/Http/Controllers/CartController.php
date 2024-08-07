<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $userId=Auth()->user()->id;
        $user = User::with('carts.book')->find($userId);
        return view('cart.index', ['user' => $user]);   
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId=Auth()->user()->id;
        $cart = new Cart;
        $cart->user_id=$userId;
        $cart->bookid=$request->bookid;
        $cart->qte = $request->quantity;
        $cart->save();
        return redirect()->to('/carts');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        if(!empty($id)){
            Cart::destroy($id);
            return back();
        }else{
            return back();
        }
    }
}
