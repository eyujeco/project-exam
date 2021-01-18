<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Thread;
use App\Models\Content;
use App\Http\Requests\CreateThreadRequest;
use App\Http\Requests\CreateContentRequest;
use Auth;

class TemplateController extends Controller
{
    public function viewCreateThread () {
        return view('create-thread');
    }

    function viewThread ($slug) {
        try {
            $thread = Thread::where('slug','=',$slug)->first();
            return view('threadpage',compact('thread'));
        }
        catch(ModelNotFoundException $ex) {
            return redirect('/');
        }
        return view('threadpage');
    }

    public function postThread (Request $request) {
        $thread = new Thread;
        
        $thread->user_id = Auth::user()->id;
        $thread->threadtitle=$request->threadtitle;
        $thread->threaddetails=$request->threaddetails;
        $thread->save();
        return redirect('dashboard');
    }

    public function getEditThread ($id) {
        $thread = Thread::findOrFail($id);
        if ($thread) {
            return view('edit-thread',compact('thread'));
        }
    }

    public function saveEditThread (CreateThreadRequest $request) {
        try {
            $thread = Thread::findOrFail($request['thread_id']);
            if ($thread) {
                $thread->threadtitle=$request->threadtitle;
                $thread->threaddetails=$request->threaddetails;
                $thread->save();
                return redirect('dashboard');
            }
        }
        catch(ModelNotFoundException $ex) {
            return redirect('/');
        }
    }

    function deleteThread (Request $request) {
        $thread = Thread::where('id',"=", $request['thread_id']);
        if($thread) {
            $thread->delete();
            return redirect()->back();
        }
        else { return redirect('/'); }
    }

    public function saveContent (CreateContentRequest $request) {
        $thread = Thread::where('slug', '=', $request['slug'])->first();

        if($thread) {
            $content = new Content;
            $content->user_id = Auth::user()->id;
            $content->thread_id = $thread->id;
            $content->contentbody = $request['contentbody'];
            $content->save();
            return redirect()->back();
        }
        else { return redirect('/'); }
    }

    public function deleteContent (Request $request) {
        $content = Content::where('id',"=", $request['content_id']);
        if($content) {
            $content->delete();
            return redirect()->back();
        }
        else { return redirect('/'); }
    }







}
