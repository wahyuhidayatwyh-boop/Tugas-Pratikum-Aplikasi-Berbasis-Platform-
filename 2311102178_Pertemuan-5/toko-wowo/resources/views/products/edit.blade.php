<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('products.index') }}"
               class="w-9 h-9 rounded-xl bg-gray-100 hover:bg-amber-100 text-gray-500 hover:text-amber-600 flex items-center justify-center transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <div>
                <p class="text-xs font-semibold text-amber-500 uppercase tracking-widest mb-0.5">Edit Produk</p>
                <h2 class="font-bold text-2xl text-gray-800">{{ $product->name }}</h2>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="wowo-card overflow-hidden animate-scale-in">

                {{-- Card Header Gradient --}}
                <div class="px-8 py-6 relative overflow-hidden"
                     style="background: linear-gradient(135deg, #d97706, #f59e0b)">
                    <h3 class="text-white font-bold text-lg flex items-center gap-2">
                        <span>✏️</span> Edit Informasi Produk
                    </h3>
                    <p class="text-amber-100 text-sm mt-1">Perbarui data produk sesuai kebutuhan</p>
                    <div class="absolute -right-6 -top-6 w-28 h-28 rounded-full bg-white/10"></div>
                </div>

                <form action="{{ route('products.update', $product->id) }}" method="POST" class="p-8 space-y-5">
                    @csrf
                    @method('PUT')

                    {{-- Nama Produk --}}
                    <div>
                        <label for="name" class="wowo-label">
                            Nama Produk <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name"
                               value="{{ old('name', $product->name) }}"
                               class="wowo-input {{ $errors->has('name') ? 'error' : '' }}"
                               placeholder="Masukkan nama produk">
                        @error('name')
                            <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label for="description" class="wowo-label">
                            Deskripsi
                            <span class="text-xs font-normal text-gray-400 ml-1">(opsional)</span>
                        </label>
                        <textarea id="description" name="description" rows="3"
                                  class="wowo-input resize-none {{ $errors->has('description') ? 'error' : '' }}"
                                  placeholder="Deskripsi singkat...">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Harga & Stok --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="price" class="wowo-label">
                                Harga <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-3 text-sm text-gray-400 font-semibold pointer-events-none">Rp</span>
                                <input type="number" id="price" name="price"
                                       value="{{ old('price', $product->price) }}"
                                       class="wowo-input pl-10 {{ $errors->has('price') ? 'error' : '' }}"
                                       placeholder="0" min="0">
                            </div>
                            @error('price')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="stock" class="wowo-label">
                                Stok <span class="text-red-500">*</span>
                            </label>
                            <input type="number" id="stock" name="stock"
                                   value="{{ old('stock', $product->stock) }}"
                                   class="wowo-input {{ $errors->has('stock') ? 'error' : '' }}"
                                   placeholder="0" min="0">
                            @error('stock')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Timestamp Info --}}
                    <div class="flex items-center gap-2 text-xs text-gray-400 bg-gray-50 rounded-xl px-4 py-3 border border-gray-100">
                        <svg class="w-4 h-4 text-gray-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Dibuat: <span class="font-semibold text-gray-500">{{ $product->created_at->translatedFormat('d F Y, H:i') }} WIB</span>
                        &nbsp;·&nbsp;
                        Diperbarui: <span class="font-semibold text-gray-500">{{ $product->updated_at->translatedFormat('d F Y, H:i') }} WIB</span>
                    </div>

                    {{-- Actions --}}
                    <div class="pt-2 flex items-center justify-end gap-3 border-t border-gray-100">
                        <a href="{{ route('products.index') }}" class="btn-secondary">Batal</a>
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-5 py-2.5 bg-amber-500 hover:bg-amber-600 text-white text-sm font-bold rounded-xl shadow-md transition-all duration-150 active:scale-95">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Perbarui Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>