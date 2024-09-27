<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Form_regular;
use App\Models\Form_ijazah;
use App\Models\Periode;
use App\Models\Notification;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class PaController extends Controller
{
    public function viewpa()
    {
        $user = Auth::user();
        $years = range(date('Y'), 2000);
        $months = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        // Fetch data from the periode table
        $periods = Periode::all(); // Adjust the model name if necessary

        return view('verifikator.pa', compact('user', 'years', 'months', 'periods'));
    }
    public function cetakPDF(Request $request)
    {
        // Get the selected category, periode, and year from the request
        $selectedCategory = $request->input('kategori'); // The category selected by the user
        $selectedPeriode = $request->input('periode'); // The periode selected by the user
        $selectedYear = $request->input('tahun'); // The year selected by the user

        // Determine which data to fetch based on the selected category
        if ($selectedCategory == 'pilihan_satu') {
            // Fetch data from Form_ijazah model based on selected periode and year
            $formData = Form_ijazah::where('periode', $selectedPeriode)
                ->whereYear('created_at', $selectedYear) // Filter by year
                ->whereIn('status', ['Ditolak', 'Pembuatan SK Berhasil']) // Include both statuses
                ->get(); // Adjust the column name if necessary
        } elseif ($selectedCategory == 'pilihan_dua') {
            // Fetch data from Form_regular model based on selected periode and year
            $formData = Form_regular::where('periode', $selectedPeriode)
                ->whereYear('created_at', $selectedYear) // Filter by year
                ->whereIn('status', ['Ditolak', 'Pembuatan SK Berhasil']) // Include both statuses
                ->get(); // Adjust the column name if necessary
        } else {
            // Handle case where no valid option is selected
            return redirect()->back()->with('error', 'Invalid category selected.');
        }

        // Prepare data for PDF
        $data = [
            'form_data' => $formData, // Pass the fetched data
            'kategori' => $selectedCategory // Optionally pass the selected category
        ];

        // Load a view to generate the PDF
        $pdf = Pdf::loadView('verifikator.pdf.export_pdf', $data);

        // Return the generated PDF as a download
        return $pdf->download('cetak_form.pdf');
    }
}
