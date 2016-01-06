<?php

namespace FlairBooks\Http\Controllers;

use FlairBooks\Category;
use Illuminate\Http\Request;
use FlairBooks\Http\Requests;
use FlairBooks\Facades\Search;
use FlairBooks\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }

    public function getCategories($parent = null)
    {
        $categories = Category::whereParentId($parent)->paginate(20);
        $categoriesCls = 'active';

        return view('admin.categories.list', compact([
            'parent',
            'categories',
            'categoriesCls'
        ]));
    }

    public function searchCategories(Request $request)
    {
        $categoriesCls = 'active';
        $categories = Search::categories($request->get('search'));

        return view('admin.categories.list', compact([
            'categories',
            'categoriesCls'
        ]));
    }

    public function createCategory($parent = null)
    {
        $categoriesCls = 'active';

        return view('admin.categories.create', compact([
            'parent',
            'categoriesCls'
        ]));
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        $parent = $category->parent_id;
        $categoriesCls = 'active';

        return view('admin.categories.edit', compact([
            'category',
            'parent',
            'categoriesCls'
        ]));
    }

    public function saveCategory(Request $request, $parent = null)
    {
        $category = Category::create($request->all());
        if ($parent) {
        	$category->makeChildOf(Category::findOrFail($parent));
        }

        flash()->success('Created', 'Category has been created');

        return redirect("/admin/categories/{$parent}");
    }

    public function updateCategory($id, Request $request)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        flash()->success('Updated', 'Author has been updated');

        return redirect("/admin/categories/{$category->parent_id}");
    }

    public function deleteCategory($id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->back();
    }
}
