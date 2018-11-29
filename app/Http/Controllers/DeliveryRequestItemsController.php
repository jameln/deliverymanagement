<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\delivery_requests;
use App\Http\Controllers\Controller;
use App\Models\delivery_request_items;
use Exception;

class DeliveryRequestItemsController extends Controller
{

    /**
     * Display a listing of the delivery request items.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $deliveryRequestItemsObjects = delivery_request_items::with('deliveryrequest')->paginate(25);

        return view('delivery_request_items.index', compact('deliveryRequestItemsObjects'));
    }

    /**
     * Show the form for creating a new delivery request items.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $deliveryRequests = delivery_requests::pluck('ref','id')->all();
        
        return view('delivery_request_items.create', compact('deliveryRequests'));
    }

    /**
     * Store a new delivery request items in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            delivery_request_items::create($data);

            return redirect()->route('delivery_request_items.delivery_request_items.index')
                             ->with('success_message', 'Delivery Request Items was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified delivery request items.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $deliveryRequestItems = delivery_request_items::with('deliveryrequest')->findOrFail($id);

        return view('delivery_request_items.show', compact('deliveryRequestItems'));
    }

    /**
     * Show the form for editing the specified delivery request items.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $deliveryRequestItems = delivery_request_items::findOrFail($id);
        $deliveryRequests = delivery_requests::pluck('ref','id')->all();

        return view('delivery_request_items.edit', compact('deliveryRequestItems','deliveryRequests'));
    }

    /**
     * Update the specified delivery request items in the storage.
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
            
            $deliveryRequestItems = delivery_request_items::findOrFail($id);
            $deliveryRequestItems->update($data);

            return redirect()->route('delivery_request_items.delivery_request_items.index')
                             ->with('success_message', 'Delivery Request Items was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified delivery request items from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $deliveryRequestItems = delivery_request_items::findOrFail($id);
            $deliveryRequestItems->delete();

            return redirect()->route('delivery_request_items.delivery_request_items.index')
                             ->with('success_message', 'Delivery Request Items was successfully deleted!');

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
            'delivery_request_id' => 'nullable',
            'ref' => 'string|min:1|nullable',
            'description' => 'string|min:1|max:1000|nullable',
            'qty' => 'string|min:1|nullable',
            'price' => 'string|min:1|nullable',
            'total' => 'numeric|nullable',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
