<div>
    <h2 class="text-2xl font-bold text-gray-700 dark:text-gray-100 text-center mb-6">Login</h2>
    <form wire:submit.prevent="login" class="space-y-4">
        @csrf
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
        <button 
            type="submit" 
            class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-200"
        >
            Login
        </button>
    </form>
    @if (session()->has('success'))
        <p class="mt-4 text-sm text-green-500">{{ session('success') }}</p>
    @endif
    @if (session()->has('error'))
        <p class="mt-4 text-sm text-red-500">{{ session('error') }}</p>
    @endif

    <div class="mt-6 text-center">
        <p class="text-sm text-gray-600 dark:text-gray-300">Não tem uma conta?</p>
        <a 
            href="{{ route('register') }}" 
            class="text-blue-500 hover:underline font-semibold"
        >
            Registre-se aqui
        </a>
    </div>
</div>
