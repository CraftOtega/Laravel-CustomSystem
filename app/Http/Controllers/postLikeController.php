<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Mail\postLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class postLikeController extends Controller
{
    


public function __construct()
{
    $this->middleware(['auth']);
}



/* 

you can actually achieve it this way

public function store($id){

$post = post::find($id);//theenin web.php it look like this

 Route::post('/posts/{id}/likes', [postLikeController::class, 'store'])->name('posts.likes');
}

OR 

you use route model binding(which is post)   in this case



in web.php  this must  {post}   correlative with model u want use
 Route::post('/posts/{post}/likes', [postLikeController::class, 'store'])->name('posts.likes');   



public function store(post $post, Request $request){



.........it contiues down

 */

public function store(post $post, Request $request){

//dd($post->likeBy($request->user()));


/* if post is already be liked by auth user 
    you will get to this if($post->likedBy($request->user())) because already be validated post index blade*/
if($post->likedBy($request->user())){


    return response(null, 409);// conflict http
}

    $post->likes()->create([  

       'user_id' => $request->user()->id,
    ]);
     //has this userwhere('user_id', $request->user()->id) like this before but the like has be 
    //deleted!$post->likes()->onlyTrashed()
    
     //sendmail if only user_id is = to the current authenticated id  // oronly send email if it has not be liked
    if(!$post->likes()->onlyTrashed()->where('user_id', $request->user()->id)->count()){
  //(auth()->user(), $post) signify the auth that person or user that like post and the post that was liked  
    Mail::to($post->user)->send(new postLiked(auth()->user(), $post));
 }

 


    return back();
}











public function destroy(post $post, Request $request){


$request->user()->likes()->where('post_id', $post->id)->delete();

return back();


}

 
}
