@extends('master')

@section('title')
    Show Note | Notes App
@endsection

@section('main-content')
    <div class="w-full">
        <div class="max-w-2xl mx-auto px-4 py-12">
          <div class="p-6 border border-gray-200 rounded-xl shadow bg-white space-y-4">
            <h2 class="text-2xl font-semibold">{{ $note->title }}</h2>
            <p class="text-sm text-gray-700 leading-relaxed">
              {{ $note->content }}
            </p>
            <div class="flex justify-end space-x-2 pt-4">
              <a href="{{ route('notes.edit', $note->id) }}" 
                 class="px-4 py-2 border border-gray-300 rounded-lg text-sm hover:border-black transition shadow">
                 Edit
              </a>
              <button 
                 class="px-4 py-2 border border-gray-300 rounded-lg text-sm hover:border-red-500 hover:text-red-500 transition shadow">
                 Delete
              </button>
            </div>
          </div>
        </div>
    </div>
@endsection