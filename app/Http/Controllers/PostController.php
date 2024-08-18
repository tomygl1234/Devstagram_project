<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['show', 'index']);
    }
    public function index(User $user){
        $posts = Post::where('user_id', $user->id)->latest()->paginate(20);

        return view('dashboard',[
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function create(){
        return view('posts.create'); 
    }
    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'required',
        ]);

        // Post::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'image' => $request->image,
        //     'user_id' => auth()->user()->id
        // ]);

        //Otra forma
        // $post = new Post;
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->image = $request->image->store('posts','public');
        // $post->user_id = auth()->user()->id;
        // $post->save();

        //Esta es más al estilo de laravel
        $request->user()->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'user_id' => auth()->user()->id
        ]);


        return redirect()->route('posts.index', auth()->user())->with('success','Post created successfully');
    }
    public function show(User $user, Post $post, Like $like) {
        return view('posts.show', [
            'post' => $post,
            'user' => $user,
            'like' => $like
        ]);

    }
    public function destroy(Post $post){
        $this->authorize('delete', $post);
            $post->delete();
        // DELETE IMAGE
        $image_path = public_path('uploads/' . $post->image);
        if(File::exists($image_path)){
            unlink($image_path);
        }
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
