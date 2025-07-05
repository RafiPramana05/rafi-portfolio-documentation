<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class AdminMessageController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();
        
        // Filter by status if provided
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }
        
        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('subject', 'like', '%' . $search . '%')
                  ->orWhere('message', 'like', '%' . $search . '%');
            });
        }
        
        $contacts = $query->orderBy('created_at', 'desc')->paginate(10);
        
        // Append query parameters to pagination links
        $contacts->appends($request->query());
        
        // Get statistics
        $stats = [
            'total' => Contact::count(),
            'unread' => Contact::unread()->count(),
            'read' => Contact::read()->count(),
            'replied' => Contact::replied()->count(),
        ];
        
        return view('admin.messages.index', compact('contacts', 'stats'));
    }
    
    public function show(Contact $contact)
    {
        // Mark as read if unread
        if ($contact->status === 'unread') {
            $contact->markAsRead();
        }
        
        return view('admin.messages.show', compact('contact'));
    }
    

    
    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();
            return redirect()->route('admin.messages.index')->with('success', 'Message deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete message. Please try again.');
        }
    }
    
    public function markAsRead(Contact $contact)
    {
        $contact->markAsRead();
        return response()->json(['success' => true, 'message' => 'Message marked as read']);
    }
    
    public function markAsUnread(Contact $contact)
    {
        $contact->update(['status' => 'unread']);
        return response()->json(['success' => true, 'message' => 'Message marked as unread']);
    }
    
    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:mark_read,mark_unread,delete',
            'messages' => 'required|array',
            'messages.*' => 'exists:contacts,id'
        ]);
        
        $contacts = Contact::whereIn('id', $request->messages);
        
        switch ($request->action) {
            case 'mark_read':
                $contacts->update(['status' => 'read']);
                $message = 'Messages marked as read';
                break;
            case 'mark_unread':
                $contacts->update(['status' => 'unread']);
                $message = 'Messages marked as unread';
                break;
            case 'delete':
                $contacts->delete();
                $message = 'Messages deleted successfully';
                break;
        }
        
        return redirect()->back()->with('success', $message);
    }
}
