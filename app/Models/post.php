<?php

namespace App\Models;

use App\Models\like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post extends Model
{
    use HasFactory;




    protected $fillable = [
        'user_id',
        'body',
        
    ];

    //check if the user id  is within this particular model / it return ( true or false) statement or if a user already //liked  a post and is return  true or false 
public function likedBy(user $user){

    //it check if user id ($user->id) is within a like for this particular model
return $this->likes->contains('user_id', $user->id);

}




  //check if it is owned by particular user / it return ( true or false) statement
  /*
  public function ownedBy(user $user){


    return $user->id===$this->user_id;
    
    }

*/

//one post belong to a particular user
public function user(){

return $this->belongsTo(User::class);

}

// a post have many likes
public function likes(){


return $this->hasMany(like::class);

}

 

}
 