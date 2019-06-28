<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryContoller extends Controller
{
    /**
     * Display a listing of the resource.
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->getTheValidationAttributes();

        $category = Category::create($attributes);

        session()->flash('success', $category->name . ' is saved..');

        return redirect()->route('categories.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $attributes = $this->getTheValidationAttributes();

        $category->update($attributes);

        session()->flash('success', $category->name . ' is updated..');

        return redirect()->route('categories.show', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category_name = $category->name;

        $category->delete();

        session()->flash('success', $category_name . 'is deleted..');

        return redirect('categories.index');
    }

    /**
     * return the validation attributes
     * @return array
     */
    private function getTheValidationAttributes() :array {

        $attributes = request()->validate([
                'name' => ['required', 'max:255']
            ]);

         return $attributes;
    }
}
