<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
    	$posts = Post::all();
        return view('index', compact('posts'));
    }
    public function store(Request $request)
    {
    	$this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'tags' => 'required',
        ]);
    	$input = $request->all();
    	$post = Post::create($input);
    	$post->tag($request->tags);
        return back()->with('success','Post added to database.');
    }
}