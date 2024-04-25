<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class postController extends Controller
{
    

public function __construct(){

  $this->middleware(['auth'])->only(['store', 'destroy']);

}





public function index(){

                    // eagle loading ->with(['user', 'likes'])
    $posts = post::Latest()->with(['user', 'likes'])->paginate(50);
    //dd($posts);

return view('posts.index', [ 

    'posts' => $posts

]);

}






public function store(Request $request){



    $request->validate([
        'body' => 'required|max:255',
   
       
     
      
    ]);

/*
return redirect()->route('dashboard');


post::create([
'user_id'=>auth()->id(),
'body' => $request->body,

]);


 OR

//auth()->user()->posts()->create([
     //it automatic filled user_id for us
'body' => $request->body,
]);
*/


/*OR 
//creating a post throught a user
$request->user()->posts()->create([
    //it automatic filled user_id for us
    'body' => $request->body,
    
]);

*/

//creating a post throught a user and when you creatin use method(posts()) not property(posts)
$request->user()->posts()->create($request->only('body'));


return back();


 }  





public function destroy(post $post){

/*
if(!$post->ownedBy(auth()->user())){


    dd('no');

} 
*/
//delete is method u define in postpolicy
$this->authorize('delete',$post);

$post->delete();
return back();

}








public function show(post $post){


return view('posts.show', [

'post' => $post

]);



}





}
