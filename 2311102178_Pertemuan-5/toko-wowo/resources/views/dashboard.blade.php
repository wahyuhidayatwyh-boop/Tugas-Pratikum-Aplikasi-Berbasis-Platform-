<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-indigo-500 uppercase tracking-widest mb-0.5">Selamat datang, {{ Auth::user()->name }}! 👋</p>
                <h2 class="font-bold text-2xl text-gray-800">Dashboard</h2>
            </div>
            <a href="{{ route('products.index') }}" class="btn-primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
                Kelola Produk
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Hero Welcome Card --}}
            <div class="animate-fade-in-up relative overflow-hidden rounded-2xl shadow-lg"
                 style="background: linear-gradient(135deg, #1e1b4b 0%, #4338ca 60%, #7c3aed 100%)">
                <div class="relative z-10 p-8 sm:p-10">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
                        <div>
                            <h3 class="text-2xl sm:text-3xl font-extrabold text-white mb-2">
                                🛒 Toko Wowo
                            </h3>
                            <p class="text-indigo-200 text-base max-w-md">
                                Kelola produk, pantau stok, dan jaga kualitas toko Anda — semua dalam satu panel yang mudah digunakan.
                            </p>
                            <div class="mt-5 flex flex-wrap gap-3">
                                <a href="{{ route('products.index') }}"
                                   class="inline-flex items-center gap-2 px-5 py-2.5 bg-white text-indigo-700 text-sm font-bold rounded-xl shadow hover:shadow-md hover:bg-indigo-50 transition active:scale-95">
                                    📋 Lihat Semua Produk
                                </a>
                                <a href="{{ route('products.create') }}"
                                   class="inline-flex items-center gap-2 px-5 py-2.5 bg-white/15 text-white text-sm font-semibold rounded-xl border border-white/20 hover:bg-white/25 transition active:scale-95">
                                    ➕ Tambah Produk
                                </a>
                            </div>
                        </div>
                        <div class="text-7xl opacity-20 hidden sm:block select-none">🏪</div>
                    </div>
                </div>
                {{-- BG Decoration --}}
                <div class="absolute top-0 right-0 w-72 h-72 rounded-full bg-white/5 -translate-y-1/3 translate-x-1/3"></div>
                <div class="absolute bottom-0 left-20 w-48 h-48 rounded-full bg-purple-500/20 translate-y-1/2"></div>
            </div>

            {{-- Quick Info Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div class="stat-card animate-fade-in-up animate-delay-1" style="--tw-before-bg: #4f46e5;">
                    <div class="w-12 h-12 rounded-xl bg-indigo-100 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Total Produk</p>
                        <p class="text-3xl font-extrabold text-gray-800">{{ \App\Models\Product::count() }}</p>
                    </div>
                    <div class="absolute top-3 right-4 text-5xl opacity-5 font-black text-indigo-600">📦</div>
                </div>
                <div class="stat-card animate-fade-in-up animate-delay-2">
                    <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Total Stok</p>
                        <p class="text-3xl font-extrabold text-gray-800">{{ \App\Models\Product::sum('stock') }}</p>
                    </div>
                </div>
                <div class="stat-card animate-fade-in-up animate-delay-3">
                    <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Nilai Inventori</p>
                        <p class="text-2xl font-extrabold text-gray-800">
                            Rp {{ number_format(\App\Models\Product::selectRaw('SUM(price * stock) as val')->value('val') ?? 0, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
