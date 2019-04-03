<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Appointment;
use App\Treatment;
use App\AppointmentTreatment;
use App\Http\Controllers\AppointmentController;

class ReportController extends Controller
{
    public function index($date = null)
    {
      $ac = new AppointmentController;

      if (is_null($date)) {$date = date("Y-m-d");}      
      $custom_waiting   = $ac->getAppointments(['Waiting'], $date);
      $custom_done = $ac->getAppointments(['Done', 'Cancelled'], $date);
      $today_done = $ac->getAppointments(['Done', 'Cancelled'], date("Y-m-d"));
      $today_ongoing   = $ac->getAppointments(['On-Going'], date("Y-m-d"));

      return view('reports-view', [
        'custom_waiting' => $custom_waiting,
        'custom_done' => $custom_done,
        'today_done' => $today_done,
        'today_ongoing' => $today_ongoing,
        'appt_date' => $date
      ]);
    }



}
