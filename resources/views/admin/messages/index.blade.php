@extends('admin.layouts.app')

@section('title', 'Messages')

@section('content')
<div class="p-6">
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold gradient-text">Messages</h1>
            <p class="text-gray-400 mt-2">Manage visitor messages and send replies</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.messages.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-sync mr-2"></i>
                Refresh
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="glass rounded-2xl p-6 text-center hover:scale-105 transition-transform duration-300">
            <div class="text-3xl font-bold text-blue-400">{{ $stats['total'] }}</div>
            <div class="text-gray-300 mt-2">Total Messages</div>
            <div class="text-sm text-gray-500 mt-1">
                <i class="fas fa-envelope mr-1"></i>
                All time
            </div>
        </div>
        <div class="glass rounded-2xl p-6 text-center hover:scale-105 transition-transform duration-300">
            <div class="text-3xl font-bold text-red-400">{{ $stats['unread'] }}</div>
            <div class="text-gray-300 mt-2">Unread</div>
            <div class="text-sm text-gray-500 mt-1">
                <i class="fas fa-exclamation-circle mr-1"></i>
                Need attention
            </div>
        </div>
        <div class="glass rounded-2xl p-6 text-center hover:scale-105 transition-transform duration-300">
            <div class="text-3xl font-bold text-yellow-400">{{ $stats['read'] }}</div>
            <div class="text-gray-300 mt-2">Read</div>
            <div class="text-sm text-gray-500 mt-1">
                <i class="fas fa-eye mr-1"></i>
                Viewed
            </div>
        </div>
        <div class="glass rounded-2xl p-6 text-center hover:scale-105 transition-transform duration-300">
            <div class="text-3xl font-bold text-green-400">{{ $stats['replied'] }}</div>
            <div class="text-gray-300 mt-2">Replied</div>
            <div class="text-sm text-gray-500 mt-1">
                <i class="fas fa-reply mr-1"></i>
                Completed
            </div>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="glass rounded-2xl p-6 mb-8">
        <form method="GET" action="{{ route('admin.messages.index') }}" id="filterForm" class="flex flex-wrap gap-4">
            <div class="flex-1 min-w-80">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Search messages..."
                       class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <select name="status" id="statusFilter" class="px-4 py-2 bg-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="all" {{ request('status', 'all') == 'all' ? 'selected' : '' }}>All Status</option>
                    <option value="unread" {{ request('status') == 'unread' ? 'selected' : '' }}>Unread</option>
                    <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Read</option>
                    
                </select>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-search mr-2"></i>
                Search
            </button>
        </form>
    </div>

    <!-- Bulk Actions -->
    <div class="glass rounded-2xl p-4 mb-8 hidden" id="bulkActions">
        <div class="flex items-center gap-4">
            <span class="text-sm text-gray-300">
                <i class="fas fa-check-square mr-2 text-blue-400"></i>
                <span id="selectedCount">0</span> messages selected
            </span>

            <form method="POST" action="{{ route('admin.messages.bulk-action') }}" id="bulkActionForm" class="flex items-center gap-3">
                @csrf
                <select name="action" class="px-4 py-2 bg-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Action</option>
                    <option value="mark_read">Mark as Read</option>
                    <option value="mark_unread">Mark as Unread</option>
                </select>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-check mr-2"></i>
                    Apply
                </button>
            </form>

            <button type="button" onclick="confirmBulkDelete()" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                <i class="fas fa-trash mr-2"></i>
                Delete Selected
            </button>

            <button type="button" onclick="clearSelection()" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
                <i class="fas fa-times mr-2"></i>
                Cancel
            </button>
        </div>
    </div>

    <!-- Messages List -->
    <div class="glass rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-800">
                    <tr>
                        <th class="px-6 py-4 text-left">
                            <input type="checkbox" id="selectAll" class="rounded">
                        </th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-left">From</th>
                        <th class="px-6 py-4 text-left">Subject</th>
                        <th class="px-6 py-4 text-left">Date</th>
                        <th class="px-6 py-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($contacts as $contact)
                    <tr class="hover:bg-gray-800 transition-colors {{ $contact->status === 'unread' ? 'bg-gray-800/30' : '' }}">
                        <td class="px-6 py-4">
                            <input type="checkbox" name="messages[]" value="{{ $contact->id }}" class="message-checkbox rounded">
                        </td>
                        <td class="px-6 py-4">
                            @if($contact->status === 'unread')
                                <span class="status-badge status-unread inline-flex items-center px-3 py-2 rounded-full text-sm text-red-100">
                                    <i class="fas fa-exclamation-circle mr-2"></i>
                                    <span class="whitespace-nowrap">Unread</span>
                                </span>
                            @elseif($contact->status === 'read')
                                <span class="status-badge status-read inline-flex items-center px-3 py-2 rounded-full text-sm text-yellow-100">
                                    <i class="fas fa-eye mr-2"></i>
                                    <span class="whitespace-nowrap">Read</span>
                                </span>
                            @elseif($contact->status === 'replied')
                                <span class="status-badge status-replied inline-flex items-center px-3 py-2 rounded-full text-sm text-green-100">
                                    <i class="fas fa-check-circle mr-2"></i>
                                    <span class="whitespace-nowrap">Replied</span>
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold mr-3">
                                    {{ strtoupper(substr($contact->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="font-medium text-white">{{ $contact->name }}</div>
                                    <div class="text-sm text-gray-400">{{ $contact->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-white font-medium">{{ $contact->subject }}</div>
                            <div class="text-sm text-gray-400 mt-1">
                                {{ Str::limit($contact->message, 50) }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-white">{{ $contact->created_at->format('M d, Y') }}</div>
                            <div class="text-sm text-gray-400">{{ $contact->created_at->format('H:i') }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-3">
                                <a href="{{ route('admin.messages.show', $contact) }}"
                                   class="action-btn text-blue-400 hover:text-blue-300 hover:bg-blue-900/20 p-2 rounded-lg transition-all duration-200"
                                   title="View Message">
                                    <i class="fas fa-eye text-sm"></i>
                                </a>

                                @if($contact->status === 'unread')
                                <button onclick="markAsRead({{ $contact->id }})"
                                        class="action-btn text-yellow-400 hover:text-yellow-300 hover:bg-yellow-900/20 p-2 rounded-lg transition-all duration-200"
                                        title="Mark as Read">
                                    <i class="fas fa-check text-sm"></i>
                                </button>
                                @endif
                                <button onclick="deleteMessage({{ $contact->id }})"
                                        class="action-btn text-red-400 hover:text-red-300 hover:bg-red-900/20 p-2 rounded-lg transition-all duration-200"
                                        title="Delete">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                            <div class="text-6xl mb-4">
                                <i class="fas fa-inbox"></i>
                            </div>
                            <div class="text-xl mb-2">No messages found</div>
                            <div class="text-sm">Messages from visitors will appear here</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if($contacts->hasPages())
    <div class="mt-8 flex justify-center">
        {{ $contacts->links() }}
    </div>
    @endif
</div>





<script>
// Status filter auto-submit
document.getElementById('statusFilter').addEventListener('change', function() {
    document.getElementById('filterForm').submit();
});

// Bulk selection
document.getElementById('selectAll').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.message-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
    updateBulkActions();
});

document.querySelectorAll('.message-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', updateBulkActions);
});

function updateBulkActions() {
    const selectedCheckboxes = document.querySelectorAll('.message-checkbox:checked');
    const bulkActions = document.getElementById('bulkActions');
    const selectedCount = document.getElementById('selectedCount');

    if (selectedCheckboxes.length > 0) {
        bulkActions.classList.remove('hidden');
        selectedCount.textContent = selectedCheckboxes.length;

        // Add hidden inputs for selected messages
        const form = bulkActions.querySelector('form');
        const existingInputs = form.querySelectorAll('input[name="messages[]"]');
        existingInputs.forEach(input => input.remove());

        selectedCheckboxes.forEach(checkbox => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'messages[]';
            input.value = checkbox.value;
            form.appendChild(input);
        });
    } else {
        bulkActions.classList.add('hidden');
    }
}

function clearSelection() {
    document.querySelectorAll('.message-checkbox').forEach(checkbox => {
        checkbox.checked = false;
    });
    document.getElementById('selectAll').checked = false;
    updateBulkActions();
}

// Bulk delete functions
function confirmBulkDelete() {
    const selectedCheckboxes = document.querySelectorAll('.message-checkbox:checked');
    if (selectedCheckboxes.length === 0) {
        showToast('Please select at least one message to delete.', 'error');
        return;
    }

    const messageCount = selectedCheckboxes.length;
    const messageText = messageCount === 1 ? 'message' : 'messages';

    showConfirmation({
        title: 'Delete Messages',
        message: `Are you sure you want to delete ${messageCount} selected ${messageText}? This action cannot be undone.`,
        confirmText: `Delete ${messageCount} ${messageText}`,
        cancelText: 'Cancel',
        type: 'danger',
        onConfirm: () => {
            executeBulkDelete();
        }
    });
}

function executeBulkDelete() {
    const selectedCheckboxes = document.querySelectorAll('.message-checkbox:checked');

    // Create form for bulk delete
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '{{ route("admin.messages.bulk-action") }}';

    // Add CSRF token
    const csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '_token';
    csrfInput.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    form.appendChild(csrfInput);

    // Add action
    const actionInput = document.createElement('input');
    actionInput.type = 'hidden';
    actionInput.name = 'action';
    actionInput.value = 'delete';
    form.appendChild(actionInput);

    // Add selected message IDs
    selectedCheckboxes.forEach(checkbox => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'messages[]';
        input.value = checkbox.value;
        form.appendChild(input);
    });

    document.body.appendChild(form);

    // Show loading state and submit
    showToast('Deleting messages...', 'info');
    form.submit();
}





// Mark as read
async function markAsRead(contactId) {
    try {
        const response = await fetch(`/admin/messages/${contactId}/mark-read`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        });

        if (response.ok) {
            location.reload();
        }
    } catch (error) {
        console.error('Error:', error);
    }
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
    });
}


</script>

<style>
/* Enhanced status badge styling */
.status-badge {
    transition: all 0.3s ease;
    backdrop-filter: blur(8px);
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

/* Action button enhancements */
.action-btn {
    transition: all 0.2s ease;
    border-radius: 0.5rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 32px;
    min-height: 32px;
}

.action-btn:hover {
    transform: translateY(-1px) scale(1.05);
}

.action-btn i {
    pointer-events: none;
}
</style>
@endsection
