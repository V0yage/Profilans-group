<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LinkController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['extern' => 'required']);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $link = Link::firstOrCreate(
            ['extern' => $request->extern],
            ['extern' => $request->extern, 'short' => uniqid()]
        );

        return response()->json(['data' => [
            'extern' => $link->extern,
            'short' => route('redirect', ['short' => $link->short])
        ]]);
    }

    public function redirect($short)
    {
        $link = Link::where('short', $short)->firstOrFail();
        return redirect($link->extern);
    }
}
