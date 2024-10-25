<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Tool;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $user = User::with(['profile', 'skills', 'tools'])->findOrFail($id);

        $pdf = Pdf::loadView('manager.view', compact('user'));

        return $pdf->download('employee_profile.pdf');
    }
}
