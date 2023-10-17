<?php

namespace App\Http\Controllers;

use App\Services\ExelFileManager;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class DownloadController extends Controller
{
    public function index(Request $request)
    {
        return view('download');
    }

    public function download(Request $request)
    {
        $validated = $this->validate(
            $request,
            [
                'file' => 'required|mimes:xlsx,xls,csv',
            ],
            [
                'file.required' => 'Необходимо выбрать файл',
                'file.mimes' => 'Загружаемый файл должен быть типа одного из следующих типов: csv, xls, xlsx'
            ]
        );

        $fastExel = new FastExcel();
        $collection = $fastExel->import($validated['file']);

        resolve(ExelFileManager::class, [
            'collection' => $collection
        ])->saveCollection();

        return redirect(route('imported_data'));
    }
}
