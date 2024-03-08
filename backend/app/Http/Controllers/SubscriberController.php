<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show()
    {
        $subscribers = Subscriber::query()->get();
        return view('subscriber.subscriber', [
            'subscribers' => $subscribers
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subscriber.form_create');
    }


    /**
     * Create the resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'email' => $request->email
        ];
        Validator::make($data, [
            'email' => ['required', 'email'],
        ])->validate();
        Subscriber::query()->create($data);
        return redirect()->route('subscriber.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subscriber = Subscriber::query()->findOrFail($id);
        return view('subscriber.form_edit', [
            'subscriber' => $subscriber
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $subscriber = Subscriber::query()->findOrFail($id);
        $data = [
            'status' => $request->unsubscribe === "subscribe"
        ];
        Validator::make($data, [
            'status' => ['required']
        ])->validate();

        $subscriber->fill($data);
        $subscriber->save();
        return redirect()->route('subscriber.show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subscriber = Subscriber::query()->findOrFail($id);
        $subscriber->delete();
        return redirect()->route('subscriber.show');
    }
}
