<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $comment=Feedback::paginate(5);
        return view('admin.comment', compact('comment'));
    }
    public function ariza(Request $request)
    {
        Feedback::create([
            'fio' => $request->fio,
            'phone' => $request->phone,
            'email' => $request->email,
            'comment'=>$request->comment,
        ]);
        return back();
    }
    public function delete(int $id)
    {
        Feedback::findOrFail($id)->delete();
        return back();
    }
}
