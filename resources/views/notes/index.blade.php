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
            @foreach ($notes as $note)
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="p-4 border border-gray-200 rounded-xl shadow hover:shadow-md transition flex flex-col justify-between">
                        <div>
                            <h2 class="text-lg font-semibold mb-2">{{ $note->title }}</h2>
                            <p class="text-sm text-gray-700 line-clamp-3">
                            {{ $note->content }}
                            </p>
                        </div>
                        <div class="flex justify-end space-x-2 mt-4">
                            <a href="note_edit.html" 
                            class="px-3 py-1 rounded-lg border border-gray-300 hover:border-black text-sm transition shadow">
                            Edit
                            </a>
                            <button 
                            class="px-3 py-1 rounded-lg border border-gray-300 hover:border-red-500 hover:text-red-500 text-sm transition shadow">
                            Delete
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
        </div>
    </div>
@endsection