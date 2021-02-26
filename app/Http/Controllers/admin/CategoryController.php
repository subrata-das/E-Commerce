<?php

namespace App\Http\Controllers\admin;

use App\category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::user()->id;
        $result=category::find($id);
        
        return view('admin.category.index')->with('categories',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_category=category::get_parent_category();

        return view('admin.category.create')
                ->with('parent_category', $parent_category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'desc' => ['required'],
        ]);
        $validatedData['created_by']=Auth::user()->id;
        category::store($validatedData);
        Session::flash('message', 'Category created Successfull...'); 
        Session::flash('alert', 'alert-success'); 
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=category::fetch($id);
        $parent_category=category::get_parent_category();
        
        return view('admin.category.edit')
                ->with('category', $category)
                ->with('parent_category', $parent_category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'desc' => ['required'],
        ]);

        $category=category::fetch($id);
        $result=category::upToDate($category,$validatedData);
        if($result>0){
            Session::flash('message', 'Category Updated Successfull...'); 
            Session::flash('alert', 'alert-success'); 
            return redirect()->route('category.index');
        }else {
            Session::flash('message', 'Category updated Successfull...'); 
            Session::flash('alert', 'alert-danger'); 
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }
}
