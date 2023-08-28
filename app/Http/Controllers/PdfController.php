<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use App\Models\Category;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function categoryReport()
    {
        $categoris = Category::all(); 
    
        $mpdf = new \Mpdf\Mpdf();

        $mpdf->showWatermarkText = true;
        $mpdf->SetWatermarkText('PHP with Laravel Framework');


        $html = view('backend.categories.category_pdf', compact('categoris'))->render();

        $mpdf->WriteHTML($html);
        
        $mpdf->Output('category.pdf','D');
 
        
    }
}
