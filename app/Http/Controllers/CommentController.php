<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestComment;
use App\Models\Comment;
use App\Models\User;
use App\Models\Vehicle;
use App\Services\Bootster;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }
    public function index(Request $request)
    {
        $search = $request->search;
        $results = $this->comment->getCommentSearchIndex(search: $search ?? '');

        return view("pages.comments.paging", compact("results", "search"));
    }

    public function registerComment(FormRequestComment $request)
    {
        $vehicles = Vehicle::all();
        $users = User::all();

        if ($request->method() == "POST") {
            $data = $request->all();
            Comment::create($data);

            Bootster::success('Created', 'User "' . $users->find($data['userID'])->name . '" commented on vehicle "' . $vehicles->find($data['vehicleID'])->uniqueCode . '"!');

            return redirect()->route("comments.index");
        }

        return view('pages.comments.create', compact("vehicles", "users"));
    }

    public function updateComment(FormRequestComment $request, $id)
    {
        if ($request->method() == 'PUT') {
            $data = $request->all();

            $searchRegistry = Comment::find($id);
            $searchRegistry->update($data);

            Bootster::success('Updated', 'Comment id: ' . $searchRegistry->id . ' was successfully updated !');

            return redirect()->route('comments.index');
        }
        $results = Comment::where('id', '=', $id)->first();

        return view('pages.comments.update', compact('results'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $SearchRegistry = Comment::find($id);
        $SearchRegistry->delete();
        Bootster::error('Deleted', 'Comment id:' . $SearchRegistry["id"] . ' was deleted!');
        return response()->json(['success' => true]);
    }
}
