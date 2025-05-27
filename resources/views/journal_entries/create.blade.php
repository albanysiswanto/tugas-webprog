{{-- resources/views/journal_entries/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tulis Jurnal Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>Formulir untuk membuat jurnal baru akan ada di sini.</p>
                    {{-- Nanti kita akan buat form lengkapnya di sini --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
