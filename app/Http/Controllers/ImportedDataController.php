<?php

namespace App\Http\Controllers;

use App\Models\Row;
use Illuminate\Http\Request;

class ImportedDataController extends Controller
{
    public function index(Request $request)
    {
        $list = Row::query()
            ->get()
            ->groupBy('date')
            ->toArray();

        return view('data', [
            'list' => $list
        ]);
    }
}
