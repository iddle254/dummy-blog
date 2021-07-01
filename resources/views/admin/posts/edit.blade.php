<x-admin-master>
    @section('content')
        <h1>Edit a post</h1> 
        <form method="post" action="{{route('post.update', $post->id)}} " enctype="multipart/form-data">
            @csrf
            @method('PATCH')
          {{-- <div class="form-row"> --}}
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" class="form-control"  id="title" placeholder="Enter a title" aria-describedby="" value="{{$post->title}}">
            </div>
            
          {{-- </div> --}}
          <div class="form-group">
              <div><img src="{{$post->post_image}} " alt="" height="100px"></div>
            <label for="file">File</label>
            <input type="file" name="post_image" class="form-control-file" id="post_image">
          </div>

          <div class="form-group">
           <textarea name="body" id="body" cols="60" rows="10">{{$post->body}} </textarea>
          </div>
         
          
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>   
    @endsection
</x-admin-master>