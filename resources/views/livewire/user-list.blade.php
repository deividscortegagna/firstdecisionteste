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
                                    wire:click="openEditModal"
                                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                                    Editar
                                </button>
                                <button 
                                    wire:click="openConfirmationModal"
                                    class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
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

    @if ($showConfirmationModal)
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-md mx-auto text-center">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">
                Confirmar Exclusão
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">
                Tem certeza de que deseja excluir sua conta? Esta ação não pode ser desfeita.
            </p>
            <div class="flex justify-center space-x-4">
                <button 
                    wire:click="closeConfirmationModal"
                    class="px-4 py-2 bg-gray-500 dark:bg-gray-700 text-white rounded-lg hover:bg-gray-600 dark:hover:bg-gray-800 transition">
                    Cancelar
                </button>
                <button 
                    wire:click="confirmDeletion"
                    class="px-4 py-2 bg-red-500 dark:bg-red-600 text-white rounded-lg hover:bg-red-600 dark:hover:bg-red-700 transition">
                    Confirmar
                </button>
            </div>
        </div>
    </div>
    @endif

    @if ($showEditModal)
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-md mx-auto text-center">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">
                Editar Conta
            </h2>
            <form wire:submit.prevent="updateAccount">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nome</label>
                    <input 
                        type="text" 
                        id="name" 
                        wire:model="editForm.name" 
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white">
                    @error('editForm.name') 
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">E-mail</label>
                    <input 
                        type="email" 
                        id="email" 
                        wire:model="editForm.email" 
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white">
                    @error('editForm.email') 
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Senha Atual</label>
                    <input 
                        type="password" 
                        id="current_password" 
                        wire:model="editForm.current_password" 
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white">
                    @error('editForm.current_password') 
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="new_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nova Senha</label>
                    <input 
                        type="password" 
                        id="new_password" 
                        wire:model="editForm.new_password" 
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white">
                    @error('editForm.new_password') 
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-end space-x-4">
                    <button 
                        type="button" 
                        wire:click="closeEditModal"
                        class="px-4 py-2 bg-gray-500 dark:bg-gray-700 text-white rounded-lg hover:bg-gray-600 dark:hover:bg-gray-800 transition">
                        Cancelar
                    </button>
                    <button 
                        type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>
