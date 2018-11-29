<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\sender_deliveries;
use App\Models\sender_items;
use App\Models\sender_clients;
use App\Models\delivery_companies;
use App\Models\delivery_deposits;
use App\Models\delivery_requests;
use App\Models\statuses;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role_id = Auth::user()->role_id;
        $sender_deliveries = sender_deliveries::get()->count();
        $sender_items = sender_items::get()->count();
        $sender_clients = sender_clients::get()->count();
        $delivery_companies = delivery_companies::get()->count();
        $delivery_deposits = delivery_deposits::get()->count();
        $delivery_requests = delivery_requests::get()->count();
        $alldeliveryrequests = delivery_requests::get();
        $allsenderdeliveries = sender_deliveries::get();
        $statuses = statuses::get();

        switch ($role_id) {
            case 1:
                return view('Company/home',compact(
                    'sender_deliveries',
                    'sender_items',
                    'sender_clients',
                    'delivery_companies',
                    'delivery_deposits',
                    'delivery_requests',
                    'allsenderdeliveries',
                    'alldeliveryrequests',
                    'statuses'
                ));
                break;
            case 2:
            case 3:
            case 4:
            case 5:
                return view('Livreur/home',compact(
                    'delivery_companies',
                    'delivery_deposits',
                    'delivery_requests',
                    'alldeliveryrequests',
                    'sender_deliveries',
                    'sender_items',
                    'sender_clients',
                    'allsenderdeliveries',
                    'statuses'
                ));
                break;

            default:
                return view('home');
        }
    }
}
