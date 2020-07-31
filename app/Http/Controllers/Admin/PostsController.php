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
    
    public function create(Request $request) {
        return redirect('admin/posts/create');
    }
    
    public function index() {
        return view('posts.index');
    }
    
    public function review(Request $request) {

        $result = false;

        // バリデーション
        $request->validate([
            'post_id' => [
                'required',
                'exists:posts,id',
                function($attribute, $value, $fail) use($request) {

                    // ログインしてるかチェック
                    if(!auth()->check()) {

                        $fail('レビューするにはログインしてください。');
                        return;

                    }

                    // すでにレビュー投稿してるかチェック
                    $exists = \App\Review::where('user_id', $request->user()->id)
                        ->where('post_id', $request->post_id)
                        ->exists();

                    if($exists) {

                        $fail('すでにレビューは投稿済みです。');
                        return;

                    }

                }
            ],
            'stars' => 'required|integer|min:1|max:5',
            'comment' => 'required'
        ]);

        $review = new \App\Review();
        $review->post_id = $request->post_id;
        $review->user_id = $request->user()->id;
        $review->stars = $request->stars;
        $review->comment = $request->comment;
        $result = $review->save();
        return ['result' => $result];

    }
}
    



