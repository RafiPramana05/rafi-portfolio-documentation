@extends('admin.layouts.app')

@section('title', 'Message Details')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold gradient-text">Message Details</h1>
            <p class="text-gray-400 mt-2">View and reply to visitor message</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.messages.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Messages
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Message Content -->
        <div class="lg:col-span-2">
            <div class="glass rounded-2xl p-8">
                <!-- Message Header -->
                <div class="flex justify-between items-start mb-6">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold mr-4">
                            {{ strtoupper(substr($contact->name, 0, 1)) }}
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-white">{{ $contact->name }}</h2>
                            <p class="text-gray-400">{{ $contact->email }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        @if($contact->status === 'unread')
                            <span class="status-badge status-unread inline-flex items-center px-4 py-2 rounded-full text-sm text-red-100">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                <span class="whitespace-nowrap">Unread</span>
                            </span>
                        @elseif($contact->status === 'read')
                            <span class="status-badge status-read inline-flex items-center px-4 py-2 rounded-full text-sm text-yellow-100">
                                <i class="fas fa-eye mr-2"></i>
                                <span class="whitespace-nowrap">Read</span>
                            </span>
                        @elseif($contact->status === 'replied')
                            <span class="status-badge status-replied inline-flex items-center px-4 py-2 rounded-full text-sm text-green-100">
                                <i class="fas fa-check-circle mr-2"></i>
                                <span class="whitespace-nowrap">Replied</span>
                            </span>
                        @endif
                        <div class="text-sm text-gray-400 mt-2">
                            {{ $contact->created_at->format('M d, Y \a\t H:i') }}
                        </div>
                    </div>
                </div>

                <!-- Subject -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-blue-400 mb-2">Subject:</h3>
                    <p class="text-white text-lg">{{ $contact->subject }}</p>
                </div>

                <!-- Message Content -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-blue-400 mb-4">Message:</h3>
                    <div class="bg-gray-800 rounded-lg p-6 border-l-4 border-blue-500">
                        <p class="text-gray-300 leading-relaxed whitespace-pre-line">{{ $contact->message }}</p>
                    </div>
                </div>

                <!-- Reply Instructions -->
                <div class="border-t border-gray-700 pt-8">
                    <div class="bg-blue-900 bg-opacity-30 rounded-lg p-6 border-l-4 border-blue-500">
                        <h3 class="text-lg font-semibold text-blue-400 mb-4">
                            <i class="fas fa-envelope mr-2"></i>
                            Reply to This Message
                        </h3>
                        <p class="text-gray-300 mb-4">
                            To reply to this message, click the "Open in Gmail" button in the sidebar to open Gmail in your browser.
                            This will create a new email with the visitor's email address automatically filled in.
                        </p>
                        <div class="bg-gray-800 rounded-lg p-4 border border-gray-600">
                            <p class="text-sm text-gray-400 mb-2">
                                <i class="fas fa-info-circle mr-2"></i>
                                Quick Email Details:
                            </p>
                            <p class="text-gray-300">
                                <strong>To:</strong> {{ $contact->email }}<br>
                                <strong>Subject:</strong> Re: {{ $contact->subject }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Quick Actions -->
            <div class="glass rounded-2xl p-6 mb-6">
                <h3 class="text-lg font-semibold text-blue-400 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    @if($contact->status === 'unread')
                    <button onclick="markAsRead({{ $contact->id }})"
                            class="w-full px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition-colors">
                        <i class="fas fa-check mr-2"></i>
                        Mark as Read
                    </button>
                    @endif

                    <a href="javascript:void(0)" onclick="openGmailCompose('{{ $contact->email }}', 'Re: {{ $contact->subject }}', `Original message from {{ $contact->name }}:\n\n{{ $contact->message }}\n\n---\nSent: {{ $contact->created_at->format('M d, Y \a\t H:i') }}`)"
                       class="w-full px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors inline-block text-center">
                        <i class="fas fa-envelope mr-2"></i>
                        Open in Gmail
                    </a>

                    <button onclick="copyToClipboard('{{ $contact->email }}')"
                            class="w-full px-4 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition-colors">
                        <i class="fas fa-copy mr-2"></i>
                        Copy Email Address
                    </button>

                    <button onclick="deleteMessage({{ $contact->id }})"
                            class="w-full px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                        <i class="fas fa-trash mr-2"></i>
                        Delete Message
                    </button>
                </div>
            </div>

            <!-- Message Info -->
            <div class="glass rounded-2xl p-6">
                <h3 class="text-lg font-semibold text-blue-400 mb-4">Message Information</h3>
                <div class="space-y-4">
                    <div>
                        <div class="text-sm text-gray-400">Received</div>
                        <div class="text-white">{{ $contact->created_at->format('M d, Y') }}</div>
                        <div class="text-sm text-gray-400">{{ $contact->created_at->format('H:i') }}</div>
                    </div>

                    <div>
                        <div class="text-sm text-gray-400">Time ago</div>
                        <div class="text-white">{{ $contact->created_at->diffForHumans() }}</div>
                    </div>

                    @if($contact->status === 'replied')
                    <div>
                        <div class="text-sm text-gray-400">Replied</div>
                        <div class="text-white">{{ $contact->replied_at->format('M d, Y') }}</div>
                        <div class="text-sm text-gray-400">{{ $contact->replied_at->format('H:i') }}</div>
                    </div>
                    @endif

                    <div>
                        <div class="text-sm text-gray-400">Word count</div>
                        <div class="text-white">{{ str_word_count($contact->message) }} words</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
// Mark as read/unread
async function markAsRead(contactId) {
    try {
        showToast('Marking message as read...', 'info');
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (!csrfToken) {
            showToast('CSRF token not found. Please refresh the page.', 'error');
            return;
        }
        
        const response = await fetch(`/admin/messages/${contactId}/mark-read`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        });
        
        if (response.ok) {
            const result = await response.json();
            showToast(result.message || 'Message marked as read successfully!', 'success');
            setTimeout(() => {
                location.reload();
            }, 1000);
        } else {
            showToast('Failed to mark message as read. Please try again.', 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        showToast('An error occurred. Please try again.', 'error');
    }
}





// Copy to clipboard
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        showToast('Email address copied to clipboard!', 'success');
    }).catch(function() {
        showToast('Failed to copy email address.', 'error');
    });
}

// Delete message with confirmation
function deleteMessage(contactId) {
    showConfirmation({
        title: 'Delete Message',
        message: 'Are you sure you want to delete this message? This action cannot be undone.',
        confirmText: 'Delete Message',
        cancelText: 'Cancel',
        type: 'danger',
        onConfirm: () => {
            executeDelete(contactId);
        }
    });
}

function executeDelete(contactId) {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = `/admin/messages/${contactId}`;
    form.innerHTML = `
        @csrf
        @method('DELETE')
    `;
    document.body.appendChild(form);
    
    showToast('Deleting message...', 'info');
    form.submit();
}

// Open Gmail compose window
function openGmailCompose(email, subject, body) {
    const gmailUrl = `https://mail.google.com/mail/u/0/?view=cm&fs=1&to=${encodeURIComponent(email)}&su=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;

    // Open Gmail in a new tab
    window.open(gmailUrl, '_blank');

    // Show confirmation message
    showToast('Gmail opened in new tab. You can now compose your reply.', 'success');
}
</script>

<style>
/* Enhanced status badge styling */
.status-badge {
    transition: all 0.3s ease;
    backdrop-filter: blur(8px);
    font-weight: 600;
}

.status-badge:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
}

.status-badge i {
    font-size: 0.875rem;
    display: inline-flex;
    align-items: center;
}

.status-badge span {
    font-weight: 600;
    letter-spacing: 0.025em;
}

/* Ensure proper icon spacing */
.fa-exclamation-circle,
.fa-eye,
.fa-check-circle {
    width: 14px;
    height: 14px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

/* Status-specific enhancements */
.status-unread {
    background: linear-gradient(135deg, rgba(153, 27, 27, 0.9), rgba(127, 29, 29, 0.8));
    border: 1px solid rgba(239, 68, 68, 0.3);
    box-shadow: 0 2px 8px rgba(239, 68, 68, 0.2);
}

.status-read {
    background: linear-gradient(135deg, rgba(146, 64, 14, 0.9), rgba(120, 53, 15, 0.8));
    border: 1px solid rgba(245, 158, 11, 0.3);
    box-shadow: 0 2px 8px rgba(245, 158, 11, 0.2);
}

.status-replied {
    background: linear-gradient(135deg, rgba(20, 83, 45, 0.9), rgba(22, 101, 52, 0.8));
    border: 1px solid rgba(34, 197, 94, 0.3);
    box-shadow: 0 2px 8px rgba(34, 197, 94, 0.2);
}
</style>
@endsection
