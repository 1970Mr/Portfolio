<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::paginate(5);
		return view('admin.message.message', compact('messages'));
    }

    public function store(MessageRequest $request)
    {
        $data = $request->except(['response', 'is_read']);
        Message::create($data);
		return to_route('admin.panel.contact.message')->with(['success' => 'پیام شما با موفقیت ارسال شد! بزودی به پیام شما پاسخ داده خواهد شد.']);
    }

    public function show(Message $message)
    {
		return view('admin.message.show', compact('message'));
    }

    public function sendResponse(Message $message, Request $request)
    {
        $data = $request->validate([
            'response' => 'required',
        ]);

        // Send response
        

        $message->update($data);
		return back()->with(['success' => 'پاسخ شما با موفقیت ارسال شد!']);
    }
}
