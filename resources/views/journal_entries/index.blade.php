{{-- resources/views/journal_entries/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Jurnal Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('success'))
                        <div class="mb-4 font-medium text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('journal_entries.create') }}" class="mb-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tulis Jurnal Baru</a>

                    @if($journalEntries->isEmpty())
                        <p>Belum ada jurnal.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-3"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($journalEntries as $entry)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $entry->title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $entry->entry_date }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('journal_entries.show', $entry->id) }}" class="text-blue-600 hover:underline">Lihat</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 