<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-indigo-500 uppercase tracking-widest mb-0.5">Inventori</p>
                <h2 class="font-bold text-2xl text-gray-800">Manajemen Produk</h2>
            </div>
            <a href="{{ route('products.create') }}" id="btn-tambah-produk" class="btn-primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Produk
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Alert --}}
            @if (session('success'))
                <div id="alert-success"
                     class="animate-fade-in-up flex items-center gap-3 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl shadow-sm">
                    <div class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <span class="font-semibold text-sm">{{ session('success') }}</span>
                    <button onclick="document.getElementById('alert-success').remove()"
                            class="ml-auto text-emerald-500 hover:text-emerald-700 transition">✕</button>
                </div>
            @endif

            {{-- Stat Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div class="stat-card animate-fade-in-up">
                    <div class="w-11 h-11 rounded-xl bg-indigo-100 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Total Produk</p>
                        <p class="text-2xl font-extrabold text-gray-800">{{ $totalProducts }}</p>
                    </div>
                </div>
                <div class="stat-card animate-fade-in-up animate-delay-1">
                    <div class="w-11 h-11 rounded-xl bg-emerald-100 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Total Stok</p>
                        <p class="text-2xl font-extrabold text-gray-800">{{ $totalStock }}</p>
                    </div>
                </div>
                <div class="stat-card animate-fade-in-up animate-delay-2">
                    <div class="w-11 h-11 rounded-xl bg-amber-100 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Nilai Inventori</p>
                        <p class="text-xl font-extrabold text-gray-800">
                            Rp {{ number_format($totalValue, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Table Card --}}
            <div class="wowo-card animate-fade-in-up animate-delay-1 overflow-hidden">

                {{-- Toolbar --}}
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-6 py-4 border-b border-gray-100">
                    <div>
                        <h3 class="font-bold text-gray-800 text-base">Daftar Produk</h3>
                        <p class="text-xs text-gray-400 mt-0.5">Klik Edit untuk mengubah, atau Hapus untuk menghapus produk</p>
                    </div>
                    <div class="relative w-full sm:w-72 shrink-0">
                        <input type="text" id="searchInput" placeholder="Cari nama produk..."
                               class="w-full pl-10 pr-4 py-2.5 text-sm border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 outline-none transition">
                        <svg class="w-4 h-4 text-gray-400 absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>

                @if ($products->isEmpty())
                    <div class="flex flex-col items-center justify-center py-24 text-gray-300">
                        <svg class="w-20 h-20 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        <p class="text-lg font-semibold text-gray-400">Belum ada produk</p>
                        <p class="text-sm mt-1 text-gray-300">Tambahkan produk pertama Anda sekarang</p>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full wowo-table" id="productTable">
                            <thead>
                                <tr>
                                    <th class="w-12">No</th>
                                    <th>Nama Produk</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th class="text-center">Stok</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @foreach ($products as $index => $product)
                                    <tr class="product-row">
                                        <td class="text-gray-400 font-mono text-xs">
                                            {{ $products->firstItem() + $index }}
                                        </td>
                                        <td>
                                            <span class="font-semibold text-gray-800 product-name">{{ $product->name }}</span>
                                        </td>
                                        <td class="text-gray-500">
                                            <span class="block truncate max-w-[220px]" title="{{ $product->description }}">
                                                {{ $product->description ?? '—' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="font-bold text-indigo-600">
                                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            @if ($product->stock > 20)
                                                <span class="badge-green">{{ $product->stock }}</span>
                                            @elseif ($product->stock > 5)
                                                <span class="badge-yellow">{{ $product->stock }}</span>
                                            @else
                                                <span class="badge-red">{{ $product->stock }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('products.edit', $product->id) }}" class="btn-warning">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                    </svg>
                                                    Edit
                                                </a>
                                                <button type="button"
                                                        onclick="openDeleteModal({{ $product->id }}, '{{ addslashes($product->name) }}')"
                                                        class="btn-danger">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="px-6 py-4 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-3">
                        <p class="text-sm text-gray-400">
                            Menampilkan <span class="font-semibold text-gray-600">{{ $products->firstItem() }}–{{ $products->lastItem() }}</span>
                            dari <span class="font-semibold text-gray-600">{{ $products->total() }}</span> produk
                        </p>
                        {{ $products->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>

    {{-- Hidden Delete Form --}}
    <form id="deleteForm" action="" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>

    {{-- Delete Modal --}}
    <div id="deleteModal"
         class="fixed inset-0 z-50 hidden items-center justify-center p-4"
         style="background: rgba(15,23,42,0.55); backdrop-filter: blur(6px);">
        <div id="modalBox"
             class="bg-white rounded-3xl shadow-2xl w-full max-w-sm transform transition-all duration-250 scale-90 opacity-0">
            <div class="p-7 text-center">
                <div class="w-16 h-16 rounded-2xl bg-red-100 flex items-center justify-center mx-auto mb-5">
                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Hapus Produk?</h3>
                <p class="text-sm text-gray-500 mb-3">Anda akan menghapus produk:</p>
                <div id="modalProductName"
                     class="text-base font-bold text-gray-900 bg-gray-50 rounded-xl px-4 py-3 mb-5 border border-gray-200">
                </div>
                <p class="text-xs text-red-400 font-medium mb-6">⚠️ Tindakan ini <strong>tidak dapat</strong> dibatalkan.</p>
                <div class="flex gap-3">
                    <button onclick="closeDeleteModal()"
                            class="flex-1 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-bold rounded-xl transition">
                        Batal
                    </button>
                    <button onclick="confirmDelete()"
                            class="flex-1 py-2.5 bg-red-600 hover:bg-red-700 text-white text-sm font-bold rounded-xl shadow-md transition active:scale-95">
                        Ya, Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Search
        document.getElementById('searchInput').addEventListener('input', function () {
            const q = this.value.toLowerCase();
            document.querySelectorAll('#tableBody .product-row').forEach(row => {
                const name = row.querySelector('.product-name').textContent.toLowerCase();
                row.style.display = name.includes(q) ? '' : 'none';
            });
        });

        // Modal
        let deleteId = null;

        function openDeleteModal(id, name) {
            deleteId = id;
            document.getElementById('modalProductName').textContent = name;
            const modal = document.getElementById('deleteModal');
            const box   = document.getElementById('modalBox');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            requestAnimationFrame(() => {
                box.classList.remove('scale-90', 'opacity-0');
                box.classList.add('scale-100', 'opacity-100');
            });
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            const box   = document.getElementById('modalBox');
            box.classList.remove('scale-100', 'opacity-100');
            box.classList.add('scale-90', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                deleteId = null;
            }, 200);
        }

        function confirmDelete() {
            if (!deleteId) return;
            document.getElementById('deleteForm').action = `/products/${deleteId}`;
            document.getElementById('deleteForm').submit();
        }

        document.getElementById('deleteModal').addEventListener('click', e => {
            if (e.target === document.getElementById('deleteModal')) closeDeleteModal();
        });
    </script>
</x-app-layout>
