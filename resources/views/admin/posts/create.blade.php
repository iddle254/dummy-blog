<x-admin-master>
    @section('content')
        <h1>create</h1> 
        <form method="post" action="{{route('post.store')}} " enctype="multipart/form-data">
            @csrf
          {{-- <div class="form-row"> --}}
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" class="form-control"  id="title" placeholder="Enter a title" aria-describedby="">
            </div>
            
          {{-- </div> --}}
          <div class="form-group">
            <label for="file">File</label>
            <input type="file" name="post_image" class="form-control-file" id="post_image">
          </div>

          <div class="form-group">
           <textarea name="body" id="body" cols="60" rows="10"></textarea>
          </div>
         
          
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>   
    @endsection
</x-admin-master>