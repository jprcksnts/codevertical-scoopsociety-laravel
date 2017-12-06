<?php

namespace App\Http\Controllers;

use App\Post;
use App\UserDetail;
use Illuminate\Http\Request;use Illuminate\Support\Facades\DB;

class TimelineController extends Controller
{
    public function getInitialTimeline($user_id){
        $limit = 20;
        $response = array();

        $user_detail = UserDetail::where('user_id', $user_id)->first();
        $posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->leftJoin('post_images', 'posts.id', '=', 'post_images.post_id')
            ->select('posts.*', 'users.username', 'post_images.image_link')
            ->where('posts.school_id', $user_detail->school_id)
            ->offset(0)
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();

        $response['posts'] = $posts;
        $response['success'] = true;
        return response()->json($response);
    }

    public function getOldTimelinePosts($user_id, $post_id){
        $limit = 20;

        $response = array();

        $user_detail = UserDetail::where('user_id', $user_id)->first();
        $posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->leftJoin('post_images', 'posts.id', '=', 'post_images.post_id')
            ->select('posts.*', 'users.username', 'post_images.image_link')
            ->where('posts.id', '<', $post_id)
            ->where('posts.school_id', $user_detail->school_id)
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();

        $response['posts'] = $posts;
        $response['success'] = true;
        return response()->json($response);
    }

    public function getNewTimelinePosts($user_id, $post_id){
        $response = array();

        $user_detail = UserDetail::where('user_id', $user_id)->first();
        $posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->leftJoin('post_images', 'posts.id', '=', 'post_images.post_id')
            ->select('posts.*', 'users.username', 'post_images.image_link')
            ->where('posts.id', '>', $post_id)
            ->where('posts.school_id', $user_detail->school_id)
            ->orderBy('created_at', 'asc')
            ->get();

        $response['posts'] = $posts;
        $response['success'] = true;
        return response()->json($response);
    }
}
