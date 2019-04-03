<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Customer;
use Auth;


class ViciController extends Controller
{
    public function parse(Request $request)
    {
        $queryString = parse_url($request->getRequestUri());
        parse_str($queryString['query'], $queryArray);

        $agent         = $queryArray['user'];
        $custPhone     = $queryArray['phone_number'];
        $custFirstName = $queryArray['first_name'];
        $custLastName  = $queryArray['last_name'];
        $custGender    = $queryArray['gender'];
        $custBirthDate = $queryArray['date_of_birth'];

        //check if same username
        if (strtolower($agent) != strtolower(Auth::user()->name)) {          
          return redirect("/crm/")->with(['message' => "Error: CRM user name does not match Vicidial user name", 'alert-type' => 'error']);           
        }
      
        //check if phone number exists, if not, create record based on the info
        //if exists, retrieve the record
        $customer = Customer::firstOrCreate(
            ['id' => $custPhone],
            [
              'first_name' => $custFirstName,
              'last_name' => $custLastName,
              'gender' => $custGender              
            ]
        ); 

        return redirect("/crm/customers/$custPhone");   

    }
}