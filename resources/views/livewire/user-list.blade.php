<div class="p-6 bg-gray-100 dark:bg-gray-900 min-h-screen flex flex-col">
    <h2 class="text-3xl font-bold text-gray-700 dark:text-gray-100 text-center mb-8">
        Lista de Usuários
    </h2>

    <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
        <table class="min-w-full border-collapse border border-gray-300 dark:border-gray-700 rounded-lg">
            <thead class="bg-blue-500 dark:bg-blue-700">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-white border-b dark:border-gray-600">
                        Nome
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-white border-b dark:border-gray-600">
                        E-mail
                    </th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-white border-b dark:border-gray-600">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                        <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-100 border-b dark:border-gray-600">
                            {{ $user->name }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-100 border-b dark:border-gray-600">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4 text-center border-b dark:border-gray-600">
                            @if ($user->id === auth()->user()->id)
                                <button 
                                    wire:click="deleteAccount"
                                    class="px-4 py-2 bg-red-500 dark:bg-red-600 text-white rounded-lg hover:bg-red-600 dark:hover:bg-red-700 transition">
                                    Excluir Minha Conta
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6 flex justify-center">
        {{ $users->links() }}
    </div>
</div>
