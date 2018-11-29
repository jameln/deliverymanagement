<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sender_clients;
use App\Http\Controllers\Controller;
use App\Models\sender_client_addresses;
use Exception;

class SenderClientAddressesController extends Controller
{

    /**
     * Display a listing of the sender client addresses.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $senderClientAddressesObjects = sender_client_addresses::with('senderclient')->paginate(25);

        return view('sender_client_addresses.index', compact('senderClientAddressesObjects'));
    }

    /**
     * Show the form for creating a new sender client addresses.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $senderClients = sender_clients::pluck('name','id')->all();
        
        return view('sender_client_addresses.create', compact('senderClients'));
    }

    /**
     * Store a new sender client addresses in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            sender_client_addresses::create($data);

            return redirect()->route('sender_client_addresses.sender_client_addresses.index')
                             ->with('success_message', 'Sender Client Addresses was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified sender client addresses.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $senderClientAddresses = sender_client_addresses::with('senderclient')->findOrFail($id);

        return view('sender_client_addresses.show', compact('senderClientAddresses'));
    }

    /**
     * Show the form for editing the specified sender client addresses.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $senderClientAddresses = sender_client_addresses::findOrFail($id);
        $senderClients = sender_clients::pluck('name','id')->all();

        return view('sender_client_addresses.edit', compact('senderClientAddresses','senderClients'));
    }

    /**
     * Update the specified sender client addresses in the storage.
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
            
            $senderClientAddresses = sender_client_addresses::findOrFail($id);
            $senderClientAddresses->update($data);

            return redirect()->route('sender_client_addresses.sender_client_addresses.index')
                             ->with('success_message', 'Sender Client Addresses was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified sender client addresses from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $senderClientAddresses = sender_client_addresses::findOrFail($id);
            $senderClientAddresses->delete();

            return redirect()->route('sender_client_addresses.sender_client_addresses.index')
                             ->with('success_message', 'Sender Client Addresses was successfully deleted!');

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
            'sender_client_id' => 'nullable',
            'name' => 'string|min:1|max:255|nullable',
            'country' => 'numeric|nullable',
            'county' => 'numeric|nullable',
            'city' => 'string|min:1|nullable',
            'state' => 'string|min:1|nullable',
            'address' => 'string|min:1|nullable',
            'lat' => 'string|min:1|nullable',
            'lng' => 'string|min:1|nullable',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
