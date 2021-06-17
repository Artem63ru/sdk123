<?php

namespace App\Http\Controllers;

use App\Jas;
use App\Models\Ref_obj;
use App\Models\Rtn\Data_check_out;
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

    public function pdf_scena()
    {
        $data['title'] = 'Отчет о зафиксированных СДК ПБ ОПО сценариях возможных техногенных событий на опасных производственных объектах';
        $data['rows'] = Jas::orderby('id')->get();
        $patch = 'scena ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_scena', $data)->setPaper('a4', 'landscape');
        return $pdf->download($patch);

    }

    public function pdf_result_pk()
    {
        $data['title'] = 'Сведения о результатах проверок, проводимых при осуществлении производственного контроля, устранении нарушений по состоянию на';
        $data['rows'] = Data_check_out::orderby('id')->get();
        $patch = 'result_pk ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_result_pk', $data)->setPaper('a4', 'landscape');
        return $pdf->download($patch);

    }

    public function pdf_violations_report()
    {
        $data['title'] = 'Отчет о выяленных нарушениях на опасных производственных объектах за период с по';
        $data['rows'] = Data_check_out::orderby('id')->get();
        $patch = 'violations_report ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_violations_report', $data)->setPaper('a4', 'landscape');
        return $pdf->download($patch);

    }

     public function pdf_repair()
    {
        $data['title'] = 'Отчет "Анализ повторяемости несоответствий" по состоянию на по';
        $data['rows'] = Data_check_out::orderby('id')->get();
        $patch = 'repair_report ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_repair', $data)->setPaper('a4', 'landscape');
        return $pdf->download($patch);

    }

    public function pdf_event()
    {
        $data['title'] = 'Отчет "Анализ повторяемости несоответствий" по состоянию на по';
        $data['rows'] = Data_check_out::orderby('id')->get();
        $patch = 'event_report ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_event', $data)->setPaper('a4', 'landscape');
        return $pdf->download($patch);

    }
    public function pdf_elem()
    {
        $data['title'] = 'Отчет о состоянии элементов опасных производственных объектов по состоянию на';
        $data['rows'] = Ref_obj::where('InUse','=','1')->orderby('idObj')->get();
        $patch = 'status_elem' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_elem', $data)->setPaper('a4', 'landscape');
        return $pdf->download($patch);

    }
}
