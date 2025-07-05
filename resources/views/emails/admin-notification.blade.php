<x-mail::message>
# New Contact Message Received

You have received a new contact message from your portfolio website.

**Contact Details:**
- **Name:** {{ $contact->name }}
- **Email:** {{ $contact->email }}
- **Subject:** {{ $contact->subject }}
- **Message:** {{ $contact->message }}
- **Received:** {{ $contact->created_at->format('F j, Y \a\t g:i A') }}

<x-mail::button :url="config('app.url') . '/admin/messages/' . $contact->id">
View and Reply to Message
</x-mail::button>

You can reply to this message directly from your admin panel.

Best regards,<br>
Portfolio System
</x-mail::message>
