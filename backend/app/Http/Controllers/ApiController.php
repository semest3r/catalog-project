<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryCollection;
use App\Http\Resources\GroupCategoryCollection;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\ContentManagement;
use App\Models\GroupCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCm;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ApiController extends Controller
{
    public function getProducts(Request $request, $id)
    {
        $group_category = GroupCategory::query()->where('slug', $id)->first(['id']);
        if (!$group_category) {
            return response()->json(['data' => []], 200);
        }
        $query = Product::query()->with('image_product');
        if ($request->category) {
            $category = Category::query()->where([['group_category_id', $group_category->id], ['slug', $request->category]])->first(['id']);
            if (!$category) {
                return response()->json(['data' => []], 200);
            }
            $product_category = ProductCategory::query()->where('category_id', $category->id)->get()->mapToDictionary(fn ($value) => [
                'product_id' => $value->product_id
            ])->all();
            if (!$product_category) {
                return response()->json(['data' => []], 200);
            }
            $products = $query->whereIn('id', $product_category['product_id'])->simplePaginate(1);
        } else {
            $category = Category::query()->where('group_category_id', $group_category->id)->get(['id'])->mapToGroups(fn ($value) => [
                'id' => $value->id
            ]);
            $product_category = ProductCategory::query()->whereIn('category_id', $category['id'])->groupBy('product_id')->get(['product_id'])->mapToDictionary(fn ($value) => [
                'product_id' => $value->product_id
            ])->all();
            $products = $query->whereIn('id', $product_category['product_id'])->simplePaginate(1);
        }
        $data = new ProductCollection($products);
        return $data;
    }

    public function getCategories(Request $request, $id)
    {
        $group_category = GroupCategory::query()->where('slug', '=', $id)->first();
        if (!$group_category) return response()->json(['data' => []], 200);
        $categories = Category::query()->where('group_category_id', $group_category->id)->get();
        $data = new CategoryCollection($categories);
        return $data;
    }

    public function getGroupCategories(Request $request, $id)
    {
        $group_categories = GroupCategory::query()->get();
        if (!$group_categories) return response()->json(['data' => []], 200);
        $data = new GroupCategoryCollection($group_categories);
        return $data;
    }

    public function getExclusiveProducts()
    {
        $content_management = ContentManagement::query()->where('code', '1')->first();
        $product_cm = ProductCm::query()->where('content_management_id', $content_management->id)->get(['product_id'])->mapToDictionary(fn ($value) => [
            'product_id' => $value->product_id,
        ])->all();
        $query = Product::query()->with('image_product')->whereIn('id', $product_cm['product_id'])->get();
        $data = new ProductCollection($query);
        return $data;
    }

    public function createSubscriber(Request $request)
    {
        $validate = Validator::make($request->input(), [
            'email' => [
                'required', 'email',
                Rule::unique('subscribers', 'email')
            ],
        ]);
        if ($validate->fails()) {
            return response()->json(['errors_message' => $validate->errors()], 422);
        }
        Subscriber::query()->create([
            'email' => $request->email
        ]);
        return response()->json(['success_message' => 'Create Successfully'], 201);
    }

    public function getAllProducts(){
        $query = Product::query()->with('image_product');
        $products = $query->simplePaginate(1);
        $data = new ProductCollection($products);
        return $data;
    }
}
