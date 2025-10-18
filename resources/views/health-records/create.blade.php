<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center space-x-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Data Rekam Medis') }}
            </h2>
            <a href="{{ route('health-records.index') }}" class="text-gray-600 hover:text-gray-900">
                Kembali ->
            </a>

        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('health-records.store') }}" method="POST"
                        class="space-y-6"enctype="multipart/form-data">
                        @csrf

                        <!-- Type Field -->
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700">Tipe
                                Pengukuran</label>
                            <select id="type" name="type" required
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                <option value="tekanan_darah">Tekanan Darah</option>
                                <option value="berat_badan">Berat Badan</option>
                                <option value="gula_darah">Gula Darah</option>
                            </select>
                        </div>

                        <!-- Value Field -->
                        <div>
                            <label for="value" class="block text-sm font-medium text-gray-700">Hasil
                                Pengukuran</label>
                            <input type="text" id="value" name="value" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>

                        <!-- Date Field -->
                        <div>
                            <label for="measurement_date" class="block text-sm font-medium text-gray-700">Tanggal
                                Pengukuran</label>
                            <input type="date" id="measurement_date" name="measurement_date" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>

                        <!-- Notes Field -->
                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-700">Catatan</label>
                            <textarea id="notes" name="notes" rows="3"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                        </div>

                        <!-- File Upload Field -->
                        <div>
                            <label for="file_upload" class="block text-sm font-medium text-gray-700">Upload File
                                (Opsional)</label>
                            <input type="file" id="file_upload" name="file_upload"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit"
                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
