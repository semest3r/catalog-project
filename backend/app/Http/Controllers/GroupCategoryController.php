<?php

namespace App\Http\Controllers;

use App\Models\GroupCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class GroupCategoryController extends Controller
{
    public function show()
    {
        $group_categories = GroupCategory::query()->get();
        return view('group_category.group_category', [
            'group_categories' => $group_categories
        ]);
    }

    public function create()
    {
        return view('group_category.form_create');
    }

    public function store(Request $request)
    {
        $current_user = auth()->id();
        $data = [
            'name' => $request->name,
            'code' => $request->code,
            'slug' => Str::slug($request->name),
            'created_by' => $current_user,
            'updated_by' => $current_user,
        ];

        Validator::make($data, [
            'name' => [
                'required', 'max:255',
                Rule::unique('group_categories', 'name'),
            ],
            'code' => [
                'required', 'max:255',
                Rule::unique('group_categories', 'code'),
            ],
            'slug' => [
                'required', 'max:255',
                Rule::unique('group_categories', 'slug'),
            ],
        ])->validate();

        GroupCategory::query()->create($data);
        return redirect()->route('group_category.show');
    }

    public function edit($id)
    {
        $group_category = GroupCategory::findOrFail($id);
        return view('group_category.form_edit', [
            'group_category' => $group_category
        ]);
    }

    public function update(Request $request, $id)
    {
        $current_user = auth()->id();
        $group_category = GroupCategory::findOrFail($id);
        $data = [
            'name' => $request->name,
            'code' => $request->code,
            'slug' => Str::slug($request->name),
            'updated_by' => $current_user,
        ];

        Validator::make($data, [
            'name' => [
                'required', 'max:255',
                Rule::unique('group_categories', 'name')->ignore($group_category->id, 'id'),
            ],
            'code' => [
                'required', 'max:255',
                Rule::unique('group_categories', 'code')->ignore($group_category->id, 'id'),
            ],
            'slug' => [
                'required', 'max:255',
                Rule::unique('group_categories', 'slug')->ignore($group_category->id, 'id'),
            ],
        ])->validate();

        $group_category->fill($data);
        $group_category->save();

        return redirect()->route('group_category.show');
    }

    public function destroy($id)
    {
        $group_category = GroupCategory::findOrFail($id);

        try {
            DB::beginTransaction();
            $group_category->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('failed_message', $e->getMessage());
            return redirect()->route('group_category.show');
        }
        session()->flash('success_message', 'Delete Successfully');
        return redirect()->route('group_category.show');
    }
}
