<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ContentManagement;
use App\Models\ImageProduct;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCm;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\File;
use Ramsey\Uuid\Uuid;
use Intervention\Image\Laravel\Facades\Image;

class ProductController extends Controller
{
    public function show()
    {
        $products = Product::query()->with('category')->get();
        return view('product.product', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $categories = Category::query()->get();
        $content_management = ContentManagement::query()->get();
        return view('product.form_create', [
            'categories' => $categories,
            'content_management' => $content_management
        ]);
    }

    public function store(Request $request)
    {
        $data_input = [
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'slug' => Str::slug($request->name),
            'category' => $request->category,
            'content_management' => $request->content_management,
            'upload_image' => $request->file('upload_image'),
        ];
        Validator::make($data_input, [
            'name' => [
                'required', 'max:255',
                Rule::unique('products', 'name'),
            ],
            'code' => [
                'required', 'max:255',
                Rule::unique('products', 'code'),
            ],
            'description' => [
                'required',
            ],
            'category' => [
                'required', 'array'
            ],
            'content_management' => [
                'required', 'array'
            ],
            'slug' => [
                'required', 'max:255',
                Rule::unique('products', 'slug'),
            ],
            'upload_image' => [
                'required',
                File::types(['png', 'jpg', 'jpeg'])->max(10192)
            ]
        ])->validate();

        $current_user = auth()->id();
        $data_product = [
            'name' => $data_input['name'],
            'code' => $data_input['code'],
            'slug' => $data_input['slug'],
            'description' => $data_input['description'],
            'created_by' => $current_user,
            'updated_by' => $current_user,
        ];

        $extension = strtolower($data_input['upload_image']->getClientOriginalExtension());
        $filename = Uuid::uuid4() . '-' . Str::slug($data_input['name']) . '.' . $extension;
        $data_image_product = [
            'filename' => $filename,
            'path' => 'public/images/' . $filename,
            'url' => url("storage/images/" . $filename),
            'type' => $extension,
        ];
        $image = Image::read($data_input['upload_image'])->scale(width: 400);
        $data_product_category = [];
        $data_product_cm = [];
        try {
            DB::beginTransaction();
            $created_image = ImageProduct::query()->create($data_image_product);
            $data_product['image_id'] = $created_image->id;
            $created_product = Product::query()->create($data_product);
            foreach ($data_input['category'] as $category) {
                $timestamp = Carbon::now();
                $tmp_data_product_category = [
                    'product_id' => $created_product->id,
                    'category_id' => $category,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ];
                $data_product_category[] = $tmp_data_product_category;
            }
            foreach ($data_input['content_management'] as $cm) {
                $timestamp = Carbon::now();
                $tmp_data_product_cm = [
                    'product_id' => $created_product->id,
                    'content_management_id' => $cm,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ];
                $data_product_cm[] = $tmp_data_product_cm;
            }
            ProductCategory::query()->insert($data_product_category);
            ProductCm::query()->insert($data_product_cm);
            Storage::put($data_image_product['path'], (string) $image->encode());
            DB::commit();
        } catch (Exception $e) {
            return back()->withErrors(['errors' => $e->getMessage()]);
        }
        session()->flash('success_message', 'Product created successfully');
        return redirect()->route('product.show');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $product_category = ProductCategory::query()->where('product_id', $product->id)->get(['id'])->mapToDictionary(fn ($value) => [
            'id' => $value->id
        ])->all();
        $product_cm = ProductCm::query()->where('product_id', $product->id)->get(['id'])->mapToDictionary(fn ($value) => [
            'id' => $value->id
        ])->all();
        $categories = Category::query()->get();
        $content_management = ContentManagement::query()->get();
        return view('product.form_edit', [
            'product' => $product,
            'product_category' => $product_category,
            'product_cm' => $product_cm,
            'categories' => $categories,
            'content_management' => $content_management
        ]);
    }

    public function update(Request $request, $id)
    {
        $current_user = auth()->id();
        $product = Product::findOrFail($id);

        $data_input = [
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'slug' => Str::slug($request->name),
            'category' => $request->category,
            'content_management' => $request->content_management,
            'upload_image' => $request->file('upload_image'),
        ];
        $rules = [
            'name' => [
                'required', 'max:255',
                Rule::unique('products', 'name')->ignore($id),
            ],
            'code' => [
                'required', 'max:255',
                Rule::unique('products', 'code')->ignore($id),
            ],
            'description' => [
                'required',
            ],
            'category' => [
                'required', 'array'
            ],
            'content_management' => [
                'required', 'array'
            ],
            'slug' => [
                'required', 'max:255',
                Rule::unique('products', 'slug')->ignore($id),
            ],

        ];
        if ($data_input['upload_image']) {
            $rule['upload_image'] = [
                File::types(['png', 'jpg', 'jpeg'])->max(10192)
            ];
        }

        Validator::make($data_input, $rules)->validate();

        $current_user = auth()->id();
        $data_product = [
            'name' => $data_input['name'],
            'code' => $data_input['code'],
            'slug' => $data_input['slug'],
            'description' => $data_input['description'],
            'updated_by' => $current_user,
        ];

        $data_product_category = [];
        $data_product_cm = [];

        try {
            DB::beginTransaction();

            $product->fill($data_product);
            $product->save();

            $product_category = ProductCategory::query()->where('product_id', $product->id)->get();
            $product_cm = ProductCm::query()->where('product_id', $product->id)->get();
            foreach ($product_category as $pc) {
                $key = array_search($pc->product_id, $data_input['category']);
                if ($key !== false) {
                    unset($data_input['category'][$key]);
                } else {
                    $pc->delete();
                }
            }
            if ($data_input['category']) {
                foreach ($data_input['category'] as $category) {
                    $timestamp = Carbon::now();
                    $tmp_data_product_category = [
                        'product_id' => $product->id,
                        'category_id' => $category,
                        'created_at' => $timestamp,
                        'updated_at' => $timestamp,
                    ];
                    $data_product_category[] = $tmp_data_product_category;
                }
            }
            foreach ($product_cm as $cm) {
                $key = array_search($cm->product_id, $data_input['content_management']);
                if ($key !== false) {
                    unset($data_input['content_management'][$key]);
                } else {
                    $pc->delete();
                }
            }
            if ($data_input['content_management']) {
                foreach ($data_input['content_management'] as $data_cm) {
                    $timestamp = Carbon::now();
                    $tmp_data_product_cm = [
                        'product_id' => $product->id,
                        'content_management_id' => $data_cm,
                        'created_at' => $timestamp,
                        'updated_at' => $timestamp,
                    ];
                    $data_product_cm[] = $tmp_data_product_cm;
                }
            }

            if ($data_input['upload_image']) {
                $extension = strtolower($data_input['upload_image']->getClientOriginalExtension());
                $filename = Uuid::uuid4() . '-' . Str::slug($data_input['name']) . '.' . $extension;
                $data_image_product = [
                    'filename' => $filename,
                    'path' => 'public/images/' . $filename,
                    'url' => url("storage/images/" . $filename),
                    'type' => $extension,
                ];
                $imageScaled = Image::read($data_input['upload_image'])->scale(width: 400);
                $image = ImageProduct::query()->findOrFail($product->image_id);
                $old_image = $image->path;
                $image->fill($data_image_product);
                $image->save();
                Storage::put($data_image_product['path'], (string) $imageScaled->encode());
                Storage::delete($old_image);
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors(['errors' => $e->getMessage()]);
        }
        session()->flash('success_message', 'Product updated successfully');
        return redirect()->route('product.show');
    }

    public function destroy($id)
    {
        $product = Product::query()->where('id', $id)->firstOrFail();
        $image = ImageProduct::query()->where('id', $product->image_id)->firstOrFail();
        $path = $image->path;
        try {
            DB::beginTransaction();
            $product->delete();
            $image->delete();
            $delete = Storage::delete($path);
            if (!$delete) {
                throw new Exception('Delete Failed', 5);
            }
            DB::commit();
        } catch (Exception $e) {
            session()->flash('failed_message', $e->getMessage());
            return redirect()->route('product.show');
        }
        session()->flash('success_message', 'Delete Successfully');
        return redirect()->route('product.show');
    }
}
