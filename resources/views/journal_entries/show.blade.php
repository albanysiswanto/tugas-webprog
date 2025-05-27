{{-- resources/views/journal_entries/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Jurnal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-bold mb-2">{{ $journalEntry->title }}</h3>
                    <p class="text-gray-600 mb-4">Tanggal: {{ $journalEntry->entry_date }}</p>
                    <div class="mb-6">{!! nl2br(e($journalEntry->content)) !!}</div>
                    <a href="{{ route('dashboard') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Kembali</a>
                    <a href="{{ route('journal_entries.edit', $journalEntry->id) }}" class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                    <form action="{{ route('journal_entries.destroy', $journalEntry->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus jurnal ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 