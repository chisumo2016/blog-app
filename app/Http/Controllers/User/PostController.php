<?php

namespace App\Http\Controllers\User;

use App\Model\user\like;
use App\Model\user\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //

    public  function  post(post $post)
    {
        return view('user.post', compact('post'));
    }


    public function getAllPosts()
    {
        return $posts = post::with('likes')->where('status',1)->orderBy('created_at', 'DESC')->paginate(5);
        //return $posts = post::where('status',1)->orderBy('created_at', 'DESC')->paginate(5);

    }


    /**
     * @param Request $request
     * @return string
     */
    public function  SaveLike(request $request)
    {
        //Checked the user  == will get the value 1

        $likecheck  = like::where(['user_id'=>Auth::id(),'post_id'=>$request->id])->first();

        if($likecheck){
             //If it has value
            like::where(['user_id'=>Auth::id(),'post_id'=>$request->id])->delete();

            return 'deleted';
        }else{

            $like = new like;
            $like->user_id = Auth::id();
            $like->post_id = $request->id;

            $like->save();
        }
    }
}
