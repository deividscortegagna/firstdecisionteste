<div>
    <h2 class="text-2xl font-bold text-gray-700 dark:text-gray-100 text-center mb-6">Cadastro</h2>
    <form wire:submit.prevent="register" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome</label>
            <input 
                type="text" 
                wire:model="name" 
                class="w-full px-4 py-2 border rounded-lg bg-white dark:bg-white text-gray-900 dark:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Digite seu nome"
            >
            @error('name') 
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
            <input 
                type="email" 
                wire:model="email" 
                class="w-full px-4 py-2 border rounded-lg bg-white dark:bg-white text-gray-900 dark:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Digite seu email"
            >
            @error('email') 
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Senha</label>
            <input 
                type="password" 
                wire:model="password" 
                class="w-full px-4 py-2 border rounded-lg bg-white dark:bg-white text-gray-900 dark:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Digite sua senha"
            >
            @error('password') 
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirme sua senha</label>
            <input 
                type="password" 
                wire:model="password_confirmation" 
                class="w-full px-4 py-2 border rounded-lg bg-white dark:bg-white text-gray-900 dark:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Confirme sua senha"
            >
            @error('password_confirmation') 
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <button 
            type="submit" 
            class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-200"
        >
            Cadastrar
        </button>
    </form>
    @if (session()->has('success'))
        <p class="mt-4 text-sm text-green-500">{{ session('success') }}</p>
    @endif

    <div class="mt-6 text-center">
        <p class="text-sm text-gray-600 dark:text-gray-300">Já tem uma conta?</p>
        <a 
            href="{{ route('login') }}" 
            class="inline-block mt-2 text-blue-500 hover:underline font-semibold"
        >
            Voltar para o Login
        </a>
    </div>
</div>
