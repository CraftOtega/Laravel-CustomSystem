@extends('layouts.app')

@section('content')
    
  <div class="flex justify-center">
<div class="w-8/12 bg-white p-6 rounded-lg">




  <form action="{{ route('posts') }}" method="POST"  class="mb-4">
  @csrf
  
    <div class="mb-4">

      <label for="name" class="sr-only">body</label>
      <textarea cols="30" rows="4" name="body" id="body" placeholder="posts something "
       class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500
           
       @enderror"  ></textarea>

       @error('body')

       <div class="text-red-500 mt-2 text-sm">

          {{ $message }} 
       </div>
         
       @enderror
  </div>
   
  
  
  
  <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium ">Post</button>

  
  
  
  </form>

  
  

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
    
<p>there  are no posts</p>
@endif


</div>
  </div>

@endsection