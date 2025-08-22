@extends('master')

@section('title')
    Edit Note | Notes App
@endsection

@section('main-content')
    <div class="w-full">
        <div class="max-w-2xl mx-auto px-4 py-12">

          <div class="p-6 border border-gray-200 rounded-xl shadow bg-white">
            <form action="{{ route('notes.update', $note->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
              <div>
                <label class="block text-sm font-medium mb-1">Title</label>
                <input type="text" name="title" value="{{ old('title', $note->title) }}"
                       class="@error('title') is-invalid @enderror w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-black text-sm"
                       placeholder="Enter note title">
              </div>
              <div>
                <label class="block text-sm font-medium mb-1">Content</label>
                <textarea name="content" rows="6"
                          class="@error('content') is-invalid @enderror w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-black text-sm"
                          placeholder="Write your note here...">{{ old('content', $note->content) }}</textarea>
              </div>
              <div class="flex justify-end">
                <button type="submit"
                        class="px-4 py-2 bg-black text-white rounded-lg text-sm font-medium hover:bg-gray-800 transition shadow">
                  Update Note
                </button>
              </div>
            </form>
          </div>

        </div>
    </div>
@endsection