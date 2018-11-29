<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sender_clients;
use App\Models\sender_companies;
use App\Http\Controllers\Controller;
use Exception;

class SenderClientsController extends Controller
{

    /**
     * Display a listing of the sender clients.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $senderClientsObjects = sender_clients::with('sendercompany')->paginate(25);

        return view('sender_clients.index', compact('senderClientsObjects'));
    }

    /**
     * Show the form for creating a new sender clients.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $senderCompanies = sender_companies::pluck('company_name','id')->all();
        
        return view('sender_clients.create', compact('senderCompanies'));
    }

    /**
     * Store a new sender clients in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            sender_clients::create($data);

            return redirect()->route('sender_clients.sender_clients.index')
                             ->with('success_message', 'Sender Clients was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified sender clients.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $senderClients = sender_clients::with('sendercompany')->findOrFail($id);

        return view('sender_clients.show', compact('senderClients'));
    }

    /**
     * Show the form for editing the specified sender clients.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $senderClients = sender_clients::findOrFail($id);
        $senderCompanies = sender_companies::pluck('company_name','id')->all();

        return view('sender_clients.edit', compact('senderClients','senderCompanies'));
    }

    /**
     * Update the specified sender clients in the storage.
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
            
            $senderClients = sender_clients::findOrFail($id);
            $senderClients->update($data);

            return redirect()->route('sender_clients.sender_clients.index')
                             ->with('success_message', 'Sender Clients was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified sender clients from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $senderClients = sender_clients::findOrFail($id);
            $senderClients->delete();

            return redirect()->route('sender_clients.sender_clients.index')
                             ->with('success_message', 'Sender Clients was successfully deleted!');

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
            'sender_company_id' => 'nullable',
            'name' => 'string|min:1|max:255|nullable',
            'last_name' => 'string|min:1|nullable',
            'email' => 'nullable',
            'phone' => 'string|min:1|nullable',
            'phone2' => 'string|min:1|nullable',
            'cin' => 'string|min:1|nullable',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
