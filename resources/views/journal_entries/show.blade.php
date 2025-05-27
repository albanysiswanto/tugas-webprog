{{-- resources/views/journal_entries/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Jurnal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8"> {{-- Bisa dibuat lebih lebar dari form, misal max-w-4xl --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900 dark:text-gray-100">
                    {{-- Judul Jurnal --}}
                    <h3 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-3">
                        {{ $journalEntry->title }}
                    </h3>

                    {{-- Tanggal Entri --}}
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-6 border-b border-gray-200 dark:border-gray-700 pb-4">
                        Tanggal Entri:
                        <span class="font-medium">
                            {{ $journalEntry->entry_date instanceof \Carbon\Carbon ? $journalEntry->entry_date->isoFormat('dddd, D MMMM YYYY') : \Carbon\Carbon::parse($journalEntry->entry_date)->isoFormat('dddd, D MMMM YYYY') }}
                        </span>
                        <span class="mx-1">|</span>
                        Dibuat pada: {{ $journalEntry->created_at->isoFormat('D MMMM YYYY, HH:mm') }}
                    </p>

                    {{-- Isi Konten Jurnal --}}
                    {{-- Proselg (Tailwind Typography) bisa membantu styling konten dari user dengan lebih baik --}}
                    {{-- Untuk saat ini, kita gunakan styling dasar --}}
                    <div class="prose prose-slate dark:prose-invert max-w-none mb-8">
                        {!! nl2br(e($journalEntry->content)) !!}
                    </div>
                    {{-- Jika tidak menggunakan plugin typography, styling manual untuk paragraf di content:
                    <div class="text-gray-700 dark:text-gray-300 leading-relaxed mb-8 whitespace-pre-wrap">
                        {{ $journalEntry->content }}
                    </div>
                    --}}


                    {{-- Tombol Aksi --}}
                    <div class="flex flex-wrap items-center gap-3 border-t border-gray-200 dark:border-gray-700 pt-6">
                        <a href="{{ route('dashboard') }}"
                           class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 dark:focus:ring-offset-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                            Kembali ke Dashboard
                        </a>
                        <a href="{{ route('journal-entries.edit', $journalEntry->id) }}"
                           class="inline-flex items-center px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white shadow-sm rounded-md text-sm font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-400 dark:focus:ring-offset-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('journal-entries.destroy', $journalEntry->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus jurnal ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white shadow-sm rounded-md text-sm font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
