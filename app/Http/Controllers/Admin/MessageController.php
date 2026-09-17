<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class MessageController extends Controller
{
    public function index()
    {
        return view('admin.messages.index', ['messages' => ContactMessage::latest()->paginate(20)]);
    }

    public function markRead(ContactMessage $message)
    {
        $message->update(['read' => true]);

        return back();
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();

        return back()->with('success', 'Message deleted.');
    }
}
