<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request , Post $post) {
        // En este caso el likes, esta usando el modelo directamente
        // En la estructura de likes, tenemos un user_id y un post_id(ambos son modelos), laravel en automatica sabe que tiene que hacer
        $post->likes()->create([
            'user_id' => $request->user()->id,
            //        return $this->likes->contains('user_id', $user->id);

        ]);
        return back();
    }
    public function destroy(Request $request, Post $post) {
        $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }
}
