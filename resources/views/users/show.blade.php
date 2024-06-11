<x-app-layout>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">Texto</th>
                    <th class="px-6 py-3">Usuario</th>
                    <th class="px-6 py-3">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($twits as $twit)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $twit->texto }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $twit->user->email }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $twit->created_at }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg mt-4">
        <form class="max-w-sm mx-auto mt-4" action="{{ route('users.show', ['user' => $user->email]) }}" method="POST">
            @csrf
            <div class="mx-auto mt-4">
                <button type="submit" name="seguir" value="1" class="bg-green-500 text-white px-4 py-2 rounded-md mr-2">Seguir</button>
                <button type="submit" name="no_seguir" value="1" class="bg-red-500 text-white px-4 py-2 rounded-md">Dejar de seguir</button>
            </div>
        </form>
    </div>
</x-app-layout>
