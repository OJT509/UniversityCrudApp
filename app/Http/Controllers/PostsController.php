<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view ('posts/index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts/createpost');
    }

    /**
     * For this section I followed a short tutorial on how to search and then tweaked it slighty to match my design. 
     * 
    * YouTube. (2018). Search Data - CRUD with Laravel [Part 5]. 
    * Retrieved from https://www.youtube.com/watch?v=KWnmOBkHzUo&fbclid=IwAR1I_Dupkycae2yrhIaHGSqpja6deGZZEChSYN1JEI5VsDZV957feF-yZhY
    */
    public function search(Request $request)
    {
        $search = $request->get('search');
        $posts = Post::orderBy('created_at', 'desc')->where('title', 'like', '%'.$search.'%')
                                                    ->orWhere('text', 'like', '%'.$search.'%')->paginate(5);                                               
        return view('home', ['posts' => $posts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the user enters a title and comment before trying to submit -- createpost.blade.php
        $this->validate($request, [
            'title' => 'required',
            'comment' => 'required',
            'cover_image' => 'image|nullable|max:1999',
        ]);

        //To handle upload of the file
        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        $post = new Post;
        $post->title = $request->input('title');
        $post->text = $request->input('comment');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Returns the post from the ID within the database to be displayed on the screen to the user
        $post = Post::find($id);
        return view('posts/show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        //Ensures no random user cannot directly use /edit URL to edit a post
        //that does not belong to them.
        if(auth()->user()->id !==$post->user_id){
            return redirect('/home')->with('error', 'Not Authorised');
        }
        return view('posts/update')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'comment' => 'required'
        ]);

        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->text = $request->input('comment');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        if($post->cover_image != 'noimage.jpg'){
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        return redirect('/home');
    }
}
