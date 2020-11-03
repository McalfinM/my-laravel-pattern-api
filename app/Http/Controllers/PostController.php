<?php


namespace App\Http\Controllers;

use App\Service\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    protected $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->getMessageBag()->toArray()]);
        }
        $post = $this->postService->create($request);

        return response()->json(['post' => $post]);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->getMessageBag()->toArray()]);
        }
        $request->id = $id;
        $post = $this->postService->update($request, $id);
        return response()->json(['post' => $post]);
    }
    public function get_all()
    {
        $post = $this->postService->get_all();
        return response()->json(['post' => $post]);
    }
    public function get_by_id($id)
    {
        $post = $this->postService->get_by_id($id);
        return response()->json(['post' => $post]);
    }
    public function delete($id)
    {
        $post = $this->postService->delete($id);
        return response()->json(['post' => $post]);
    }
}
