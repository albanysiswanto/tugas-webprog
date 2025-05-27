<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Jurnal Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Outer card container - ini sudah memiliki dark mode dari Breeze --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- Inner content area - ini yang perlu kita sesuaikan --}}
                <div class="p-6 text-gray-900 dark:text-gray-100 border-b border-gray-200 dark:border-gray-700">

                    <div class="mb-6 text-right">
                        <a href="{{ route('journal-entries.create') }}" {{-- Pastikan route ini sudah ada --}}
                           class="bg-sky-500 hover:bg-sky-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-150 ease-in-out">
                            + Tulis Jurnal Baru
                        </a>
                    </div>

                    @if ($journalEntries->count() > 0)
                        <div class="space-y-6">
                            @foreach ($journalEntries as $entry)
                                {{-- Setiap kartu entri jurnal --}}
                                <article class="p-6 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg shadow hover:shadow-md transition-shadow duration-200">
                                    <div class="flex justify-between items-center mb-3 text-gray-500 dark:text-gray-400">
                                        <span class="bg-sky-100 dark:bg-sky-900 text-sky-800 dark:text-sky-200 text-xs font-medium px-2.5 py-0.5 rounded">
                                            {{ \Carbon\Carbon::parse($entry->entry_date)->isoFormat('dddd, D MMMM YYYY') }}
                                        </span>
                                    </div>
                                    <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-100">
                                        <a href="{{ route('journal-entries.show', $entry->id) }}">{{ Str::limit($entry->title, 60) }}</a> {{-- Pastikan route ini sudah ada --}}
                                    </h3>
                                    <p class="mb-5 font-light text-gray-600 dark:text-gray-400">
                                        {{ Str::limit(strip_tags($entry->content), 150) }}
                                    </p>
                                    <div class="flex justify-between items-center">
                                        <a href="{{ route('journal-entries.show', $entry->id) }}" {{-- Pastikan route ini sudah ada --}}
                                           class="inline-flex items-center font-medium text-sky-600 dark:text-sky-400 hover:text-sky-800 dark:hover:text-sky-200">
                                            Baca selengkapnya
                                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        </a>
                                        <div class="flex space-x-2">
                                            <a href="{{ route('journal-entries.edit', $entry->id) }}" class="text-yellow-500 dark:text-yellow-400 hover:text-yellow-700 dark:hover:text-yellow-300">Edit</a> {{-- Pastikan route ini sudah ada --}}
                                            <form action="{{ route('journal-entries.destroy', $entry->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus jurnal ini?');"> {{-- Pastikan route ini sudah ada --}}
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <div class="mt-8">
                            {{ $journalEntries->links() }} {{-- Pagination links juga seharusnya sudah mendukung dark mode jika kamu menggunakan default Breeze styling untuk pagination --}}
                        </div>
                    @else
                        <p class="text-gray-700 dark:text-gray-300">
                            Kamu belum memiliki satupun catatan jurnal.
                            <a href="{{ route('journal-entries.create') }}" {{-- Pastikan route ini sudah ada --}}
                               class="text-sky-600 dark:text-sky-400 hover:underline">Mulai tulis sekarang!</a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
