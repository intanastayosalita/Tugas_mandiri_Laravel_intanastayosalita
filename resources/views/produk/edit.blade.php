<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <!-- //bagian untuk mengedit produk  -->

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <label class="block font-medium text-sm text-gray-700">Nama Produk</label>
                                <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>

                            <div class="col-span-2">
                                <label class="block font-medium text-sm text-gray-700">Deskripsi</label>
                                <textarea name="deskripsi" rows="3" class="w-full border-gray-300 rounded-md shadow-sm" required>{{ $produk->deskripsi }}</textarea>
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700">Harga</label>
                                <input type="number" name="harga" value="{{ $produk->harga }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700">Stok</label>
                                <input type="number" name="stok" value="{{ $produk->stok }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700">Foto Produk</label>
                                <input type="file" name="nama_file" class="w-full border-gray-300 rounded-md shadow-sm">
                                <p class="text-xs text-gray-500 mt-1">File saat ini: {{ $produk->nama_file }}</p>
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700">Kategori</label>
                                <select name="category_id" class="w-full border-gray-300 rounded-md shadow-sm" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($category as $category)
                                        <option value="{{ $category->id }}" {{ $produk->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-blue font-bold py-2 px-4 rounded shadow">
                                Update Produk
                            </button>
                            <a href="{{ route('produk.index') }}" class="ml-2 text-gray-600">Batal</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

