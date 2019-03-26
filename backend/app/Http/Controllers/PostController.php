<?php

namespace App\Http\Controllers;


use App\Helpers\PostHelper;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JWTAuth;

class PostController extends BaseController
{
    protected $user;

    /**
     * @description Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return $this->sendResponse($posts->toArray(), 'Posts retrieved successfully.', Response::HTTP_ACCEPTED);
    }

    /**
     * @description Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        if (is_null($post)) {
            return $this->sendError('Sorry, post with id ' . $id . ' cannot be found.', null, Response::HTTP_NOT_FOUND);
        }
        $post->views_counter += 1;
        $post->save();
        return $this->sendResponse($post->toArray(), 'Post retrieved successfully.', Response::HTTP_CREATED);

    }

    /**
     * @description Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function store(Request $request){
        $this->user = JWTAuth::parseToken()->authenticate();
        $post = new Post();
        $post->title         = $request->title;
        $post->slug          = PostHelper::post_slug($post->title);
        //$post->content        = $request->content;
        $post->status        = 0;
        $post->views_counter = 0;
        $post->user_id       = $request->user_id;


        $validator = Validator::make($post, [
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
        ]);

        if($validator->fails())
            return $this->sendError('Validate error.', $validator->errors(), 401);
        if($post = Post::create($post))
            return $this->sendResponse($post->toArray(), 'Post created successfully.');
        else
            return $this->sendError('Sorry, post could not be added.', false, 500);

    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id){
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), Response::HTTP_BAD_REQUEST);
        }

        $post = Post::find($id);
        if (is_null($post)) {
            return $this->sendError(
                false,
                'Sorry, post with id ' . $id . ' cannot be found.',
                Response::HTTP_OK);
        }
        $post->name = $input['name'];
        $post->description = $input['description'];

        $post->save();
        return $this->sendResponse($post->toArray(), 'Post updated successfully.', Response::HTTP_OK);

    }

    /**
     * @description Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $post = Post::find($id);
        if (is_null($post)) {
            return $this->sendError('Post not found.', Response::HTTP_NOT_FOUND);
        }

        $post->delete();
        return $this->sendResponse($id, 'Tag deleted successfully.', Response::HTTP_ACCEPTED);
    }
}
