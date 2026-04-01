<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $category = category::get();
        return view('category.index', compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
             'name' => 'required|min:3|max:255',
    ]);

    category::create($validated);

    return redirect()->route('category.index');
    }

    
    public function show(string $id)
    {
        //
    }

    
   public function edit(category $category)
    {
        return view('category.edit', compact('category'));
    }


    public function update(Request $request, category $category)
    {
         $validated = $request->validate([
            'name' => 'required|min:3|max:255',
    ]);

    $category->update($validated);

    return redirect()->route('category.index');
    }

    public function destroy(string $id)
    {
        $category = category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index');
    }
}