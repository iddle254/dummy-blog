<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Facades\Session;

// use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = auth()->user()->posts()->paginate(4);
        // $posts = Post::all();
        return view('admin.posts.index', ['posts'=>$posts]);
    }

    public function show(Post $post)
    {
        // dd($post);
        return view('blog-post', ['post'=>$post]);
    }

    public function create()
    {
        $this->authorize('create', Post::class);
        return view('admin.posts.create');
    }

    public function store()
    {
        $this->authorize('create', Post::class);
        $inputs = request()->validate([
            'title'=>'required| min:8| max:255',
            'post_image'=> 'file',
            'body'=>'required'
        ]);

        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
        }
        // dd($request->post_image);
        auth()->user()->posts()->create($inputs);

        session()->flash('post-created-message', 'Post was created successfully');

        return redirect()->route('post.index');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        Session::flash('message', 'Post was deleted');
        return back();
    }

    public function edit(Post $post)
    {
        $this->authorize('view', $post);
        return view('admin.posts.edit', ['post'=>$post]);
    }

    public function update(Post $post)
    {
        $inputs = request()->validate([
            'title'=>'required| min:8| max:255',
            'post_image'=> 'file',
            'body'=>'required'
        ]);

        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }
        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        //add update authourization policy
        $this->authorize('update', $post);

        // auth()->user()->posts()->save($post);
        $post->save();

        session()->flash('post-updated-message', 'Post was updated successfully');

        return redirect()->route('post.index');

        // return back();
        // return view('admin.posts.edit', ['post'=>$post]);
    }
}
