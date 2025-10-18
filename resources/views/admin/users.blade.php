<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center space-x-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manajemen Pengguna') }}
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
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Peran
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Terdaftar pada</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
    @foreach ($users as $user)
    <tr>
        <td class="px-6 py-4 whitespace-nowrap">
            {{ $user->name }}
            @if($user->id === auth()->id())
                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded ml-2">Anda</span>
            @endif
        </td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
        <td class="px-6 py-4 whitespace-nowrap">
            @foreach ($user->roles as $role)
                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">{{ $role->name }}</span>
            @endforeach
        </td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $user->created_at->format('M d, Y') }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
            
            <!-- Toggle Role - agar tidak mengganti diri sendiri -->
            @if($user->id !== auth()->id())
            <form action="{{ route('admin.users.toggle-role', $user) }}" method="POST" class="inline">
                @csrf
                @if ($user->hasRole('admin'))
                    <button type="submit" class="text-yellow-600 hover:text-yellow-900" 
                            onclick="return confirm('Jadikan {{ $user->name }} sebagai user biasa?')">
                        Jadikan User
                    </button>
                @else
                    <button type="submit" class="text-green-600 hover:text-green-900"
                            onclick="return confirm('Jadikan {{ $user->name }} sebagai admin?')">
                        Jadikan Admin
                    </button>
                @endif
            </form>
            @else
            <span class="text-gray-400">User Saat Ini</span>
            @endif

            
            @if($user->id !== auth()->id())
            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                @csrf @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-900"
                        onclick="return confirm('Hapus user {{ $user->name }}? Ini tidak dapat dibatalkan!')">
                    Hapus
                </button>
            </form>
            @endif

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
