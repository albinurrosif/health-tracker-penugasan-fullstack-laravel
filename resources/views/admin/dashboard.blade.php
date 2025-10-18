<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Total Users</h3>
                    <p class="text-3xl font-bold text-blue-600">{{ $totalUsers }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Total Health Records</h3>
                    <p class="text-3xl font-bold text-green-600">{{ $totalRecords }}</p>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="{{ route('admin.users') }}" class="bg-white p-6 rounded-lg shadow hover:bg-gray-50 block">
                    <h3 class="text-lg font-semibold">Manage Users</h3>
                    <p class="text-gray-600">View and manage all users</p>
                </a>
                <a href="{{ route('admin.health-records') }}" class="bg-white p-6 rounded-lg shadow hover:bg-gray-50 block">
                    <h3 class="text-lg font-semibold">All Health Records</h3>
                    <p class="text-gray-600">View all health records</p>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>