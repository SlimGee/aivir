<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function update(Request $request)
    {
        $data = $request->validate([
            'value' => 'string',
        ]);

        if (is_null(auth()->user()->status)) {
            auth()->user()->status()->create($data);
        } else {
            auth()->user()->status->update($data);
        }

        return back(fallback: route('app.root'));
    }
}
