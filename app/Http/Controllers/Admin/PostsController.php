<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Post;
use Storage;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public function add() {
        return view('admin.posts.create');
    }
    
    //画像及びコメントアップロード
    public function upload(Request $request) {
        $validator = Validator::make($request->all(), [
            'file' => 'required|max:10240|mimes:jpeg,gif,png',
            'comment' => 'required|max:191'
        ]);
        
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }
        
        $file = $request->file('file');
        $path = Storage::disk('s3')->putFile('/', $file, 'public');
        
        Post::create([
            'image_file_name' => $path,
            'image_title' => $request->comment
            ]);
            
            return view('admin.posts.create');
    }
    
    public function index(){
        $posts = \App\Posts::all();
        
        $data = [
            'posts' => $posts,
        ];
        
        return view('welcome',$data);
    }
}

