<?php

namespace App\Exports;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class CategoryExport implements FromView
{
    public function view(): View
    {
        return view('backend.categories.category_excel', [
            'categories' => Category::all()
        ]);
    }
}
