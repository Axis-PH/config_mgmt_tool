<?php

namespace App\Http\Controllers\ResourceHandler;

use App\Models\Category;

class CategoriesManager
{
    public function getCategories()
    {
        $categories = Category::all();
        
        return $categories;
    }

    public function deleteCategory(int $categoryId)
    {
        $category = Category::where('category_id', $categoryId);
        $category->delete();

        return true;
    }
}
