<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\category;
class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(product $product)
    {
        $pro = $product->paginate(20);
        return view('backend.product.index',compact('pro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('backend.product.create',
        [
            'title'=>'New Product',
            'prods'=>category::all()
        ]
            
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'name'         => 'required|string|max:15',
            'category_id'  => 'required|integer'
        ]);

        $data['name'] = str_slug($data['name'],'-');
        $pr = Product::create($data);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        return view('backend.product.show',compact('product'),['title' => $product->name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        
        return view('backend.product.edit',compact('product'),['title' => 'edit' . $product->name,'prods'=>category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $data = $this->validate($request,[
            'name'         => 'required|string|max:15',
            'category_id'  => 'required|integer'
        ]);

        $data['name'] = str_slug($data['name'],'-');
         product::whereId($product->id)->update($data);
        

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        product::destroy($product->id);
        return redirect()->back();
    }
}
