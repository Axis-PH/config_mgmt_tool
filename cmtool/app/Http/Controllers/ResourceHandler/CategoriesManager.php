<?php

namespace App\Http\Controllers\ResourceHandler;
use Facades\App\Helper\FieldChecker;
use Illuminate\Http\Request;
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

    public function addCategory($request)
    {
        return $this->saveCategory(new Category, $request);
    }

    public function updateCategory(int $categoryId, Request $request)
    {
        return $this->saveCategory(Category::find($categoryId), $request);
    }

    private function saveCategory(Category $category, Request $request)
    {
        if (!FieldChecker::isValidName($request->categoryName))
            return false;

        try {        
            $category->category_name = $request->categoryName;
            $category->save();
            return true;
        }

        catch (\Exception $e)
        {
            return false;
        }     
    }

    public function getCategoryForUpdate($categoryId)
    {
        $category = Category::all()
            ->where('category_id', '=', $categoryId)
            ->last();
        
        return $category;
    }
}
