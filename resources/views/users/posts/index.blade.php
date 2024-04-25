
@extends('layouts.app')

@section('content')
    
  <div class="flex justify-center">
<div class="w-8/12">


    <div class="p-6">  
      
        <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
        <p>Posted {{ $posts->count() }}{{ Str::plural('post', $posts->count()) }} and 
            received {{ $user->receivedLikes->count() }} likes</p>

 

    </div>




<div class=" bg-white p-6 rounded-lg">




@if ($posts->count())
    @foreach ($posts as $post)

        

<div class="mb-4">
  <a href="{{ route('users.posts', $post->user) }}" class="font-bold">made by {{ $post->user->name }} </a>on
  <span class="text-gray-600 text-sm"> {{ $post->updated_at->diffForHumans() }} </span>




<p class="mb-2">{{  $post->body }}</p>






@can('delete', $post)
    
<div>
  <form action="{{ route('posts.destroy', $post) }}" method="post" class="mr-1" >
@csrf
@method('delete')
<button type="submit" class="text-blue-500">Delete</button>
</form>
</div>

@endcan







<div class="flex items-center">
@auth
      @if (!$post->likedBy(auth()->user()))
    
  <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1" >
    @csrf
    <button type="submit" class="text-blue-500">like</button>
    </form>

@else
    


  <div class="flex items-center">
    <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1" >
  @csrf
  @method('delete')
  <button type="submit" class="text-blue-500">unlike</button>
   </form>

      @endif
@endauth




    <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>


</div>
</div>

    @endforeach


    {{ $posts->links() }}
@else





    
<p>{{ $user->name }} does not have any posts</p>







@endif


</div>
  </div>

  </div>








@endsection
































