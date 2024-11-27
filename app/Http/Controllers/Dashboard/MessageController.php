<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages=Message::latest()->paginate(20);
        return view('admin.messages.index',compact('messages',));

    }


    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required',
            'email' => ['required', 'string',],
            'message' => ['required', 'string',],
        ]);
        if ($validator->fails()) {
            //            toastr()->error($validator->getMessageBag()->first(), 'form');
            //            return redirect()->route('Intmark.form');
            return response()->json([
                'error' => $validator->getMessageBag()->first()
            ]);
        }
        $Contact = Message::create($request->all());
    }

    public function destroy($id)
    {
        Message::destroy($id);
        toastr()->success('Message has been deleted successfully!', 'Message');
        return redirect()->route('messages.index');
    }
}
