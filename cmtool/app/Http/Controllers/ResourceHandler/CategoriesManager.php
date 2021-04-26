<?php

namespace App\Http\Controllers\ResourceHandler;
use Facades\App\Helper\FieldChecker;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;

class CategoriesManager
{
    public function getCategories()
    {
        $categories = Category::simplePaginate(5);
        
        return $categories;
    }

    public function deleteCategory(int $categoryId)
    {
        try {
            $category = Category::where('category_id', $categoryId);
            $category->delete();

            return true;
        }

        catch (\Exception $e)
        {
            return false;
        }     
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
        if (FieldChecker::isNotBlankField($request->categoryName)) {
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
        else
            return false;
    }

    public function getCategoryForUpdate($categoryId)
    {
        $category = Category::all()
            ->where('category_id', '=', $categoryId)
            ->last();
        
        return $category;
    }

    public function getCategoryName($categoryId)
    {
        $category = DB::table('categories')
        ->select('category_name')
        ->where('category_id', '=', $categoryId)
        ->first();       
        
        return $category->category_name;
    }

    public function getCategoriesDropdownList()
    {
        $categoriesDropdownList = Category::all()
            ->pluck('category_name', 'category_id');
        
        return $categoriesDropdownList;
    }    
}
