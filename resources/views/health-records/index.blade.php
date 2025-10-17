<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Rekam Medis Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('health-records.create') }}" class="!bg-blue-500 text-white px-4 py-2 rounded">
                        Tambah Data Rekam Medis
                    </a>

                    <div class="mt-6 space-y-4">
                        @foreach ($healthRecords as $record)
                            <div class="border p-4 rounded">
                                <h3 class="font-bold">{{ ucfirst(str_replace('_', ' ', $record->type)) }}:
                                    {{ $record->value }}</h3>
                                <p class="text-gray-600">Tanggal: {{ $record->measurement_date }}</p>
                                <p class="mt-2">Keterangan:{{ $record->notes }}</p>
                                <span class="mt-2 space-x-2">
                                    <button><a href="{{ route('health-records.edit', $record) }}"
                                            class="!text-yellow-600">Ubah</a></button>
                                    <form action="{{ route('health-records.destroy', $record) }}" method="POST"
                                        class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600">Hapus</button>
                                    </form>
                            </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
