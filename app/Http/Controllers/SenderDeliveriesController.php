<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sender_companies;
use App\Models\sender_deliveries;
use App\Models\delivery_companies;
use App\Http\Controllers\Controller;
use Exception;

class SenderDeliveriesController extends Controller
{

    /**
     * Display a listing of the sender deliveries.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $senderDeliveriesObjects = sender_deliveries::with('deliverycompany','sendercompany')->paginate(25);

        return view('sender_deliveries.index', compact('senderDeliveriesObjects'));
    }

    /**
     * Show the form for creating a new sender deliveries.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $deliveryCompanies = delivery_companies::pluck('company_name','id')->all();
        $senderCompanies = sender_companies::pluck('company_name','id')->all();
        
        return view('sender_deliveries.create', compact('deliveryCompanies','senderCompanies'));
    }

    /**
     * Store a new sender deliveries in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            sender_deliveries::create($data);

            return redirect()->route('sender_deliveries.sender_deliveries.index')
                             ->with('success_message', 'Sender Deliveries was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified sender deliveries.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $senderDeliveries = sender_deliveries::with('deliverycompany','sendercompany')->findOrFail($id);

        return view('sender_deliveries.show', compact('senderDeliveries'));
    }

    /**
     * Show the form for editing the specified sender deliveries.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $senderDeliveries = sender_deliveries::findOrFail($id);
        $deliveryCompanies = delivery_companies::pluck('company_name','id')->all();
        $senderCompanies = sender_companies::pluck('company_name','id')->all();

        return view('sender_deliveries.edit', compact('senderDeliveries','deliveryCompanies','senderCompanies'));
    }

    /**
     * Update the specified sender deliveries in the storage.
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
            
            $senderDeliveries = sender_deliveries::findOrFail($id);
            $senderDeliveries->update($data);

            return redirect()->route('sender_deliveries.sender_deliveries.index')
                             ->with('success_message', 'Sender Deliveries was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Update the specified sender deliveries in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function updatestatus($id, Request $request)
    {
            
            $data = $this->getData($request);
            
            $senderDeliveries = sender_deliveries::findOrFail($id);
            $senderDeliveries->update($data);
            return array('success'=>true); 
    }

    /**
     * Remove the specified sender deliveries from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $senderDeliveries = sender_deliveries::findOrFail($id);
            $senderDeliveries->delete();

            return redirect()->route('sender_deliveries.sender_deliveries.index')
                             ->with('success_message', 'Sender Deliveries was successfully deleted!');

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
            'delivery_company_id' => 'nullable',
            'sender_company_id' => 'nullable',
            'status' => 'string|min:1|nullable',
            'note' => 'string|min:1|max:1000|nullable',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
