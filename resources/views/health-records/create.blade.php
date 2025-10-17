<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Rekam Medis') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('health-records.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="type">Tipe:</label>
                            <select id="type" name="type" required>
                                <option value="tekanan_darah">Tekanan Darah</option>
                                <option value="berat_badan">Berat Badan</option>
                                <option value="gula_darah">Gula Darah</option>
                            </select>
                        </div>

                        <div>
                            <label for="value">Hasil Pengukuran:</label>
                            <input type="text" id="value" name="value" required>
                        </div>

                        <div>
                            <label for="measurement_date">Tanggal:</label>
                            <input type="date" id="measurement_date" name="measurement_date" required>
                        </div>

                        <div>
                            <label for="notes">Catatan:</label>
                            <textarea id="notes" name="notes"></textarea>
                        </div>

                        <button type="submit">Simpan</button>
                    </form>
</x-app-layout>
