{{-- resources/views/journal_entries/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tulis Jurnal Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8"> {{-- Mengubah max-w-7xl menjadi max-w-3xl agar form tidak terlalu lebar --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('journal-entries.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul Jurnal</label>
                            <input type="text" name="title" id="title"
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-sky-500 dark:focus:border-sky-600 focus:ring-sky-500 dark:focus:ring-sky-600 rounded-md shadow-sm"
                                   value="{{ old('title') }}" required autofocus>
                            {{-- Tambahkan @error('title') ... @enderror jika ingin menampilkan validasi error --}}
                        </div>

                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Isi Jurnal</label>
                            <textarea name="content" id="content" rows="10"
                                      class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-sky-500 dark:focus:border-sky-600 focus:ring-sky-500 dark:focus:ring-sky-600 rounded-md shadow-sm"
                                      required>{{ old('content') }}</textarea>
                            {{-- Tambahkan @error('content') ... @enderror --}}
                        </div>

                        <div>
                            <label for="entry_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Entri</label>
                            <input type="date" name="entry_date" id="entry_date"
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-sky-500 dark:focus:border-sky-600 focus:ring-sky-500 dark:focus:ring-sky-600 rounded-md shadow-sm"
                                   value="{{ old('entry_date', date('Y-m-d')) }}" {{-- Default ke tanggal hari ini --}}
                                   required>
                            {{-- Tambahkan @error('entry_date') ... @enderror --}}
                        </div>

                        <div class="flex items-center justify-end space-x-4">
                            <a href="{{ route('dashboard') }}"
                               class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                                Kembali
                            </a>
                            <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                                Simpan Jurnal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
