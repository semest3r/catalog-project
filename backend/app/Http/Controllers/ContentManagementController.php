<?php

namespace App\Http\Controllers;

use App\Models\ContentManagement;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ContentManagementController extends Controller
{
    public function show(){
        $content_management = ContentManagement::query()->get();
        return view('content_management.content_management', [
            'content_management' => $content_management
        ]);
    }
    public function create(){
        return view('content_management.form_create');
    }

    public function store(Request $request){
        $data = [
            'name' => $request->name,
            'code' => $request->code,
        ];

        Validator::make($data, [
            'name' => ['required', Rule::unique('content_management', 'name')],
            'code' => ['required', Rule::unique('content_management', 'code')],
        ])->validate();

        ContentManagement::query()->create($data);
        return redirect()->route('content_management.show');
    }

    public function edit($id){
        $content_management = ContentManagement::query()->findOrFail($id);
        return view('content_management.form_edit', [
            'content_management' => $content_management
        ]);
    }

    public function update(Request $request, $id){
        $content_management = ContentManagement::query()->findOrFail($id);
        $data = [
            'name' => $request->name,
            'code' => $request->code,
        ];
        Validator::make($data, [
            'name' => ['required', Rule::unique('content_management', 'name')->ignore($id)],
            'code' => ['required', Rule::unique('content_management', 'code')->ignore($id)],
        ])->validate();

        $content_management->fill($data);
        $content_management->save();

        return redirect()->route('content_management.show');
    }

    public function destroy($id){
        $content_management = ContentManagement::query()->findOrFail($id);
        try{
            $content_management->delete();
        }catch(Exception $e){
            session()->flash('failed_message', $e->getMessage());
            return back();
        }
        
        session()->flash('success_message', 'Delete Successfully');
        return redirect()->route('content_management.show');
    }
}
