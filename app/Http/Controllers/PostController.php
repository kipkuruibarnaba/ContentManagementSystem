<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use App\Images;
use Image;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::paginate(5);
       return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        if ($categories->count() == 0){
           return redirect()->back()->with('error', 'Create Categories fast before creating posts!');
        }
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'title'=> 'required',
                'featured'=>'required|image',
                'content'=>'required',
                'category_id'=>'required'
            ]);
            $featured=$request->file('featured');
            $featuredNewName=time().$featured->getClientOriginalName();
            $featured->move(public_path('/uploads/posts'), $featuredNewName);
            $data=([
                'title'=> $request->input('title'),
                'content'=>$request->input('content'),
                'category_id'=>$request->input('category_id'),
                'featured'=> 'uploads/posts/'.$featuredNewName,
                'slug'=>str_slug($request->input('title'))
            ]);
            $postData=Post::create($data);
            return redirect()->back()->with('success', 'Post Saved Successfully!');
        }catch (Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd('edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd(update);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Post=Post::find($id);
        $Post->delete();
        return redirect()->route('posts')->with('success' , 'Post Trashed!');
    }
    public function trashed()
    {
        $posts=Post::onlyTrashed()->get();
        return view('admin.posts.trash',compact('posts'));
    }
}
