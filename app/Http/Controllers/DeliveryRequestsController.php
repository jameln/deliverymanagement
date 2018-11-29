<?php

namespace App\Http\Controllers;

use App\Models\statuses;
use App\Models\currencies;
use Illuminate\Http\Request;
use App\Models\sender_sites;
use App\Models\sender_clients;
use App\Models\sender_companies;
use App\Models\delivery_requests;
use App\Models\delivery_companies;
use App\Http\Controllers\Controller;
use App\Models\sender_client_addresses;
use Exception;

class DeliveryRequestsController extends Controller
{

    /**
     * Display a listing of the delivery requests.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $deliveryRequestsObjects = delivery_requests::with('sendercompany','sendersite','senderclient','senderclientaddress','deliverycompany','currency','statuses')->paginate(25);

        return view('delivery_requests.index', compact('deliveryRequestsObjects'));
    }

    /**
     * Show the form for creating a new delivery requests.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $senderCompanies = sender_companies::pluck('company_name','id')->all();
        $senderSites = sender_sites::pluck('name','id')->all();
        $senderClients = sender_clients::pluck('name','id')->all();
        $senderClientAddresses = sender_client_addresses::pluck('name','id')->all();
        $deliveryCompanies = delivery_companies::pluck('company_name','id')->all();
        $currencies = currencies::pluck('name','id')->all();
        $statuses = statuses::pluck('label','id')->all();
        $id = delivery_requests::orderBy('id', 'DESC')->first();
        $ref = 'CD0'.(string)($id['id']+1);
        $status = statuses::all();
        return view('delivery_requests.create', compact('senderCompanies','senderSites','senderClients','senderClientAddresses','deliveryCompanies','currencies','statuses','status','ref'));
    }

    /**
     * Store a new delivery requests in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            delivery_requests::create($data);

            return redirect()->route('delivery_requests.delivery_requests.index')
                             ->with('success_message', 'Delivery Requests was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified delivery requests.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $deliveryRequests = delivery_requests::with('sendercompany','sendersite','senderclient','senderclientaddress','deliverycompany','currency','statuses')->findOrFail($id);
        $statuses = statuses::all();
        return view('delivery_requests.show', compact('deliveryRequests','statuses'));
    }

    /**
     * Show the form for editing the specified delivery requests.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $deliveryRequests = delivery_requests::findOrFail($id);
        $senderCompanies = sender_companies::pluck('company_name','id')->all();
        $senderSites = sender_sites::pluck('name','id')->all();
        $senderClients = sender_clients::pluck('name','id')->all();
        $senderClientAddresses = sender_client_addresses::pluck('name','id')->all();
        $deliveryCompanies = delivery_companies::pluck('company_name','id')->all();
        $currencies = currencies::pluck('name','id')->all();
        $statuses = statuses::pluck('label','id')->all();

        return view('delivery_requests.edit', compact('deliveryRequests','senderCompanies','senderSites','senderClients','senderClientAddresses','deliveryCompanies','currencies','statuses'));
    }
    /**
     * Display the specified delivery requests.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function print($id)
    {
        $deliveryRequests = delivery_requests::with('sendercompany','sendersite','senderclient','senderclientaddress','deliverycompany','currency')->findOrFail($id);

        return view('delivery_requests.print', compact('deliveryRequests'));
    }

    /**
     * Update the specified delivery requests in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $deliveryRequests = delivery_requests::findOrFail($id);
            $deliveryRequests->update($data);

            return redirect()->route('delivery_requests.delivery_requests.index')
                             ->with('success_message', 'Delivery Requests was successfully updated!');
            
        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }
    /**
     * Update the specified delivery requests in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function setstatus($id, Request $request)
    {
        try {
            $data = $this->getData($request);
            $deliveryRequests = delivery_requests::findOrFail($id);
            $deliveryRequests->update($data);
            return array('success'=>true);

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }
    /**
     * Remove the specified delivery requests from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $deliveryRequests = delivery_requests::findOrFail($id);
            $deliveryRequests->delete();

            return redirect()->route('delivery_requests.delivery_requests.index')
                             ->with('success_message', 'Delivery Requests was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'ref' => 'string|min:1|nullable',
            'sender_company_id' => 'nullable',
            'sender_site_id' => 'nullable',
            'sender_client_id' => 'nullable',
            'sender_client_address_id' => 'nullable',
            'delivery_company_id' => 'nullable',
            'pricedelivery_price' => 'string|min:1|nullable',
            'total_to_pay' => 'numeric|nullable',
            'currencies_id' => 'nullable',
            'statuses_id' => 'nullable',
            'description' => 'string|min:1|max:1000|nullable',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
