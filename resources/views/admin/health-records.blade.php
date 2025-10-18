<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center space-x-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Semua Data Rekam Medis') }}
            </h2>
            <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-900">
                Kembali ->
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                          
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pengguna
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tipe
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Hasil Pengukuran
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Catatan
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($healthRecords as $record)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $record->user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap capitalize">
                                            {{ str_replace('_', ' ', $record->type) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $record->value }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $record->measurement_date }}</td>
                                        <td class="px-6 py-4">{{ $record->notes ?: '-' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('health-records.edit', $record) }}"
                                                class="text-indigo-600 hover:text-indigo-900 mr-3">Ubah</a>
                                            <form action="{{ route('health-records.destroy', $record) }}" method="POST"
                                                class="inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('Hapus Data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
