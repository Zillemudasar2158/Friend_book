<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use App\Models\like;
use App\Events\PostCreated;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
    	$user = Auth::user()->load('posts');
    	return view('posts.index',compact('user'));
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'body'  => 'required|string',
        ]);

        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path(), $imageName);
        } 
        else{
            $imageName='';
        }

        $post= $request->user()->posts()->create([
            'title' => $request->title,
            'body'  => $request->body,
            'image' => $imageName
        ]);

        PostCreated::dispatch($post);

        return redirect()->route('posts')->with('success', 'Post created successfully!');

    }
    public function like($id)
    {
        $post = Post::findOrFail($id);
        $user = auth()->user();

        // Already liked?
        if (!$post->isLikedBy($user)) {
            $post->likes()->create([
                'user_id' => $user->id,
                'type' => 'like'
            ]);
        }

        return response()->json([
            'message' => 'Liked successfully',
            'likes_count' => $post->likes()->where('type', 'like')->count()
        ]);
    }

    public function unlike($id)
    {
        $post = Post::findOrFail($id);
        $user = auth()->user();

        // Remove like
        $post->likes()->where('user_id', $user->id)->delete();

        return response()->json([
            'message' => 'Unliked successfully',
            'likes_count' => $post->likes()->where('type', 'like')->count()
        ]);
    }

    public function allPosts()
    {
        $posts = Post::with(['user', 'likes'])->latest()->paginate(9);
        return view('posts.all', compact('posts'));
    }
    public function edit($id)
    {
        $post = Post::findOrfail($id);
        return view('posts.edit',compact('post'));
    }
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'body' => 'required|min:100',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->back()->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if (auth()->id() !== $post->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $post->delete();

        return response()->json(['success' => 'Post deleted successfully!']);
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.postshow', compact('post'));
    }

}
