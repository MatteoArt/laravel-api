<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Type;

class TypeController extends Controller
{
    public function index() {
        $types = Type::all();

        return view('admin.types.index', [
            'types' => $types
        ]);
    }

    public function show($id) {
        $type = Type::findOrFail($id);

        return view('admin.types.show', [
            'type' => $type
        ]);

    }
}
