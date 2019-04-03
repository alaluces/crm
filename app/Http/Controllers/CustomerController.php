<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Customer;


class CustomerController extends Controller
{
    public function index($id)
    {
      return view('customers-view', [
        'customer' => Customer::find($id),
        'accounts' => $this->getAccounts($id)       
      ]);
    }

    public function getAccounts($id)
    {
      $data = DB::table('accounts')
      ->join('customer_account_contact', 'customer_account_contact.account_id', '=', 'accounts.id')
      ->select('accounts.id as account_id',
      'customer_account_contact.customer_id as customer_id',
      'accounts.name',
      'accounts.description'

      )
      ->where('customer_account_contact.customer_id', '=', $id) 
      ->get();

      return $data;
    }


}
