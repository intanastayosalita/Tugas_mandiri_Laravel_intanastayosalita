@extends('layout.app')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <!-- //tampilan produk beserta isi nya. -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="btn btn-success" href="{{ route('produk.create') }}">Tambah Produk</a>
                    <table class="table mt-3">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Harga</th>
            <th scope="col">Stok</th>
            <th scope="col">Gambar</th>
            <th scope="col">Kategori</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($produk as $no => $produk)
            <tr>
                <td>{{ $no + 1 }}</td>
                <td>{{ $produk->nama_produk }}</td>
                <td>{{ $produk->deskripsi }}</td>
                <td>{{ $produk->harga }}</td>
                <td>{{ $produk->stok }}</td>
                <td>{{ $produk->nama_file }}
                    <img src="{{ asset('images/' . $produk->nama_file) }}" style="width: 100px; height: auto; border-radius: 5px;">
                </td>
                <td>{{ $produk->category->name }}</td>
                <td>
                    <form action="{{ route('produk.destroy', $produk->id) }}" method="post">
                        <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"> Hapus </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
