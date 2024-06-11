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
</x-app-layout>
