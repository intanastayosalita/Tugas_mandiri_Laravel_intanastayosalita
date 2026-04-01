
@extends('layout.app')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <form action="{{ route('produk.store') }}" method="post" class="row g-3 mt-3" enctype="multipart/form-data">
        @csrf
        
        <!-- //untuk membuat sebuah produk dinamakan "create" -->

        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" rows="3"></textarea required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>
        <div class="col-md-6">
    <label class="form-label">Foto Produk</label>
    <input type="file" name="nama_file" class="form-control" accept="image/*" >
        </div>
        <div class="col-md-6">
            <label class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>
        <div class="mb-3">
    <label class="form-label">Kategori</label>
    <select name="category_id" class="form-control" required>
        <option value="">Pilih Kategori</option>
        @foreach ($category as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endforeach
    </select>
</div>
        <button type="submit" class="btn btn-primary mt-3">Tambah</button>
    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
