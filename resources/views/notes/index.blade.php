@extends('master')

@section('title')
    Notes App
@endsection

@section('main-content')
    <div class="w-full">
        <div class="max-w-2xl mx-auto px-4 py-12">
            @if($notes->isEmpty())
                <div class="p-4 border border-gray-200 rounded-xl shadow hover:shadow-md transition flex flex-col justify-between">
                    <div class="text-center py-12">
                        <p class="text-gray-500 text-lg font-medium">
                            Looks empty here! Start writing your first note.
                        </p>
                    </div>
                </div>
            @else
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach ($notes as $note)
                    <div class="p-4 border border-gray-200 rounded-xl shadow hover:shadow-md transition flex flex-col justify-between">
                        <div>
                            <h2 class="text-lg font-semibold mb-2">{{ $note->title }}</h2>
                            <p class="text-sm text-gray-700 line-clamp-3">
                            {{ $note->content }}
                            </p>
                        </div>
                        <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                            <div class="flex justify-end space-x-2 mt-4">
                                <a href="{{ route('notes.show', $note->id) }}" 
                                class="px-3 py-1 rounded-lg border border-gray-300 hover:border-black text-sm transition shadow">
                                Show
                                </a>
                                <a href="{{ route('notes.edit', $note->id) }}" 
                                class="px-3 py-1 rounded-lg border border-gray-300 hover:border-black text-sm transition shadow">
                                Edit
                                </a>
                                <button type="button" onclick="openDeleteModal({{ $note->id }}, '{{ addslashes($note->title) }}')" 
                                class="px-3 py-1 rounded-lg border border-gray-300 hover:border-red-500 hover:text-red-500 text-sm transition shadow">
                                Delete
                                </button>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
    <div id="deleteModal" class="fixed inset-0 backdrop-blur-sm z-[9999] hidden items-center justify-center">
      <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-sm text-center">
        <h2 class="text-lg font-semibold mb-2">Delete Note</h2>
        <p class="text-gray-600 text-sm mb-4">Are you sure you want to delete <span id="noteTitle" class="font-medium"></span>?</p>
        <form id="deleteForm" method="POST" class="flex justify-center gap-3">
          @csrf
          @method('DELETE')
          <button type="button" onclick="closeDeleteModal()" 
                  class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium hover:border-black transition shadow">
            Cancel
          </button>
          <button type="submit" 
                  class="px-4 py-2 rounded-lg border border-gray-300 hover:border-red-500 hover:text-red-500 text-sm transition shadow">
            Delete
          </button>
        </form>
      </div>
    </div>
@endsection

@push('addon-script')
  <script>
    function openDeleteModal(noteId, noteTitle) {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        const titleSpan = document.getElementById('noteTitle');

        form.action = '/notes/' + noteId;
        titleSpan.textContent = noteTitle;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
  </script>
@endpush