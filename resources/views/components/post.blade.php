@props(['post' => $post])


<!-- i didnot use this component -->
<div>
   

 

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









</div>