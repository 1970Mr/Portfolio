<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MessageRequest;
use App\Mail\SendResponseEmail;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        $this->sendResponseMail($message, $request);

        $message->update($data);
		return back()->with(['success' => 'پاسخ شما با موفقیت ارسال شد!']);
    }

    private function sendResponseMail($message, $request)
    {
        try {
            Mail::to($message->email)->send(new SendResponseEmail('پاسخ پیام شما', $request->response));
        } catch (\Exception $e) {
            return back()->with(['error' => 'پاسخ شما با موفقیت ارسال نشد!']);
        }
    }
}
