<header class="w-full">
    <div class="max-w-2xl mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-xl font-semibold">Notes App</h1>
      @if (request()->routeIs('notes.create'))
          <a href="{{ route('notes.index') }}" 
            class="px-4 py-2 bg-black text-white rounded-lg text-sm font-medium hover:bg-gray-800 transition shadow">
            Back
          </a>
      @else
          <a href="{{ route('notes.create') }}" 
            class="px-4 py-2 bg-black text-white rounded-lg text-sm font-medium hover:bg-gray-800 transition shadow">
            + Add Note
          </a>
      @endif
    </div>
</header>