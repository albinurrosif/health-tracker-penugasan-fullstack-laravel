<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Data Rekam Medis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('health-records.update', $healthRecord->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="type">Tipe:</label>
                            <select id="type" name="type" required
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                <option value="tekanan_darah"
                                    {{ $healthRecord->type === 'tekanan_darah' ? 'selected' : '' }}>Tekanan Darah
                                </option>
                                <option value="berat_badan"
                                    {{ $healthRecord->type === 'berat_badan' ? 'selected' : '' }}>Berat Badan</option>
                                <option value="gula_darah" {{ $healthRecord->type === 'gula_darah' ? 'selected' : '' }}>
                                    Gula Darah</option>
                            </select>
                        </div>

                        <div>
                            <label for="value" class="block text-sm font-medium text-gray-700">Hasil
                                Pengukuran:</label>
                            <input type="text" id="value" name="value"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                value="{{ $healthRecord->value }}" required>
                        </div>

                        <div>
                            <label for="measurement_date">Tanggal:</label>
                            <input type="date" id="measurement_date" name="measurement_date"
                                value="{{ $healthRecord->measurement_date }}" required
                                class="mt-1
                                block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none
                                focus:ring-blue-500 focus:border-blue-500 sm:text-sm">

                        </div>

                        <div>
                            <label for="notes">Catatan:</label>

                            <textarea id="notes" name="notes" rows="3"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 sm:text-sm">{{ $healthRecord->notes }}</textarea>

                        </div>

                        <!-- File Upload Field -->
                        <div>
    <label for="file_upload" class="block text-sm font-medium text-gray-700">Upload File (Opsional)</label>
    <input type="file" id="file_upload" name="file_upload"
           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
    
    <!-- Tampilkan file saat ini -->
    @if($healthRecord->file_path)
    <div class="mt-2">
        <span class="text-sm text-gray-500">File saat ini: </span>
        <a href="{{ Storage::url($healthRecord->file_path) }}" target="_blank" 
           class="text-blue-600 hover:text-blue-800 text-sm">
            📎 {{ basename($healthRecord->file_path) }}
        </a>
    </div>
    @endif

                        <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md">Simpan</button>
                    </form>
</x-app-layout>
