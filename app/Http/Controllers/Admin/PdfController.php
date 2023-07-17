<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generate_pdf($id)
    {
        $order_view = Order::findOrFail($id);
        $data = 'webjourney.dev';
        $pdf = Pdf::loadView('admin.pdf_section.pdf', compact('data', 'order_view'));
        return $pdf->stream('billing-invoice');
    }

    public function download_pdf()
    {
        $data = 'webjourney.dev';
        $pdf = Pdf::loadView('admin.pdf_section.pdf', compact('data'));
        // $pdf = Pdf::loadView('admin.pdf_section.pdf', compact('data'));
        return $pdf->download('billing-invoice.pdf');
    }
}
