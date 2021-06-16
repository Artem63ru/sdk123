<?php

namespace App\Http\Controllers;

use App\Ref_opo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class PdfReportController extends Controller
{
    public function opo_pdf()
    {
        $data['title'] = 'Отчет о состоянии опасных производственных объектов по состоянию на';
        $data['opos'] = Ref_opo::orderby('idOPO')->get();
        $patch = 'report_opo' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.opo_pdf', $data)->setPaper('a4', 'landscape');
        return $pdf->download($patch);

    }
}
