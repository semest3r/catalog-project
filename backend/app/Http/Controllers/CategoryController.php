<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GroupCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function show()
    {
        $categories = Category::query()->with('group_category')->get();
        return view('category.category', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $group_categories = GroupCategory::query()->get();

        return view('category.form_create', [
            'group_categories' => $group_categories
        ]);
    }

    public function store(Request $request)
    {
        $current_user = auth()->id();
        $data = [
            'name' => $request->name,
            'code' => $request->code,
            'slug' => Str::slug($request->name),
            'group_category_id' => $request->group_category,
            'created_by' => $current_user,
            'updated_by' => $current_user,
        ];

        Validator::make($data, [
            'name' => [
                'required', 'max:255',
                Rule::unique('categories', 'name'),
            ],
            'code' => [
                'required', 'max:255',
                Rule::unique('categories', 'code'),
            ],
            'slug' => [
                'required', 'max:255',
                Rule::unique('categories', 'slug'),
            ],
            'group_category_id' => ['required']
        ])->validate();

        Category::query()->create($data);
        return redirect()->route('category.show');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $group_categories = GroupCategory::query()->get();
        return view('category.form_edit', [
            'category' => $category,
            'group_categories' => $group_categories
        ]);
    }

    public function update(Request $request, $id)
    {
        $current_user = auth()->id();
        $category = Category::findOrFail($id);
        $data = [
            'name' => $request->name,
            'code' => $request->code,
            'slug' => Str::slug($request->name),
            'group_category_id' => $request->group_category,
            'updated_by' => $current_user,
        ];

        Validator::make($data, [
            'name' => [
                'required', 'max:255',
                Rule::unique('categories', 'name')->ignore($category->id, 'id'),
            ],
            'code' => [
                'required', 'max:255',
                Rule::unique('categories', 'code')->ignore($category->id, 'id'),
            ],
            'slug' => [
                'required', 'max:255',
                Rule::unique('categories', 'slug')->ignore($category->id, 'id'),
            ],
            'group_category_id' => ['required']
        ])->validate();

        $category->fill($data);
        $category->save();

        return redirect()->route('category.show');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        try {
            DB::beginTransaction();
            $category->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('failed_message', $e->getMessage());
            return redirect()->route('category.show');
        }
        session()->flash('success_message', 'Delete Successfully');
        return redirect()->route('category.show');
    }
}
