<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Post;
use App\PostImage;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPost($id)
    {
        $response = array();

        $post = Post::find($id);
        $postImage = PostImage::where('post_id', $post->id)->first();

        $response['post'] = $post;
        $response['post_image'] = $postImage;
        $response['success'] = true;
    }

    public function createPost(PostCreateRequest $request)
    {
        $response = array();

        $post = Post::create($request->all());
        $postImage = null;
        if (!is_null($request->image)) {
            // decode the image
            $image = base64_decode($request->image);

            // move the image to the desired path with desired name and extension
            file_put_contents(public_path() . '/posts/' . $post->school_id . '/' . $post->id . '.' . $request->image_type, $image);

            $postImage = PostImage::create([
                'post_id' => $post->id,
                'image_link' => $post->school_id . '/' . $post->id . '.' . $request->image_type
            ]);
        }

        $response['post'] = $post;
        if ($postImage != null) {
            $response['post_image'] = $postImage;
        }

        $response['success'] = true;
        return response()->json($response);
    }
}
