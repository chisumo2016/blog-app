<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\category;
use App\Model\user\tag;
use App\Model\user\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = post::all();
        return view('admin.post.show',compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags = tag::all();
        $categories = category::all();
        return view('admin.post.post', compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
          $this->validate($request,[
             'title' => 'required',
             'subtitle' => 'required',
             'slug' => 'required',
             'body' => 'required',
             'image' => 'required',
          ]);

        //Upload the Image
        if($request->hasFile('image')) {
            $imageName = $request->image->store('public');

            // Connect to data
            $post = new Post;

            //Save the image  DB
            $post->image = $imageName;


            $post->title = $request->title;
            $post->subtitle = $request->subtitle;
            $post->slug = $request->slug;
            $post->body = $request->body;
            $post->status = $request->status;

            $post->save();
            //Relation given between tags , category and post
            $post->tags()->sync($request->tags);
            $post->categories()->sync($request->categories);


            return redirect(route('post.index'));
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
        //
        $tags = tag::all();
        $categories = category::all();
        $post = post::with('tags', 'categories')->where('id',$id)->first();
        return view('admin.post.edit',compact('post','tags','categories'));
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
        //return $request->all();
        //Validation
        $this->validate($request,[
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'required',
        ]);

        //Upload the Image
        if($request->hasFile('image')){
            $imageName = $request->image->store('public');
        }

        // Save to data
        $post = post::find($id);

        $post->image =$imageName;


        $post->title    = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug     = $request->slug;
        $post->body     = $request->body;
        $post->status   = $request->status;

        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

        $post->save();
        return redirect( route('post.index'));
        // return $request->all();  //Testing purpose
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        post::where('id', $id)->delete();
        return redirect()->back();
    }
}
