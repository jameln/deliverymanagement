<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\delivery_deposits;
use App\Models\delivery_companies;
use App\Http\Controllers\Controller;
use Exception;

class DeliveryDepositsController extends Controller
{

    /**
     * Display a listing of the delivery deposits.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $deliveryDepositsObjects = delivery_deposits::with('deliverycompany')->paginate(25);

        return view('delivery_deposits.index', compact('deliveryDepositsObjects'));
    }

    /**
     * Show the form for creating a new delivery deposits.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $deliveryCompanies = delivery_companies::pluck('company_name','id')->all();
        
        return view('delivery_deposits.create', compact('deliveryCompanies'));
    }

    /**
     * Store a new delivery deposits in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            delivery_deposits::create($data);

            return redirect()->route('delivery_deposits.delivery_deposits.index')
                             ->with('success_message', 'Delivery Deposits was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified delivery deposits.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $deliveryDeposits = delivery_deposits::with('deliverycompany')->findOrFail($id);

        return view('delivery_deposits.show', compact('deliveryDeposits'));
    }

    /**
     * Show the form for editing the specified delivery deposits.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $deliveryDeposits = delivery_deposits::findOrFail($id);
        $deliveryCompanies = delivery_companies::pluck('company_name','id')->all();

        return view('delivery_deposits.edit', compact('deliveryDeposits','deliveryCompanies'));
    }

    /**
     * Update the specified delivery deposits in the storage.
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
            
            $deliveryDeposits = delivery_deposits::findOrFail($id);
            $deliveryDeposits->update($data);

            return redirect()->route('delivery_deposits.delivery_deposits.index')
                             ->with('success_message', 'Delivery Deposits was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified delivery deposits from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $deliveryDeposits = delivery_deposits::findOrFail($id);
            $deliveryDeposits->delete();

            return redirect()->route('delivery_deposits.delivery_deposits.index')
                             ->with('success_message', 'Delivery Deposits was successfully deleted!');

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
            'name' => 'string|min:1|max:255|nullable',
            'country' => 'numeric|nullable',
            'county' => 'numeric|nullable',
            'city' => 'string|min:1|nullable',
            'state' => 'string|min:1|nullable',
            'address' => 'string|min:1|nullable',
            'lat' => 'string|min:1|nullable',
            'lng' => 'string|min:1|nullable',
            'phone' => 'string|min:1|nullable',
            'fax' => 'string|min:1|nullable',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
