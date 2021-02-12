<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewCategoryRequest;
use App\Models\Categories;

class CategoryController extends Controller
{
    public function addNewCategory(NewCategoryRequest $request)
    {
        Categories::insert([
            'name' => $request->get('name'),
        ]);
    }

    public function showAddCategoryForm()
    {
        return view("newCategory");
    }
}
