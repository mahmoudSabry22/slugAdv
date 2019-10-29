<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;

use Illuminate\Support\Str;
class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(category $category)
    {
        $cat = $category->paginate(20);
        return view('backend.category.index',compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create',['title'=>'New Category']);
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
            'slag'  => 'required|string'
        ]);

         $data['slag'] = str_slug($data['slag'],'-');
         $pr = Category::create($data);

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        return view('backend.category.show',compact('category'),['title' => $category->name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        
        return view('backend.category.edit',compact('category'),['title' => 'edit' . $category->name]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $data = $this->validate($request,[
            'name'         => 'required|string|max:15',
            'slag'  => 'required|string'
        ]);

         $data['slag'] = str_slug($data['slag'],'-');
         Category::whereId($category->id)->update($data);
        

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        category::destroy($category->id);
        return redirect()->back();
    }
}
