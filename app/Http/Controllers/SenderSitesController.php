<?php

namespace App\Http\Controllers;

use App\Models\sender_sites;
use Illuminate\Http\Request;
use App\Models\sender_companies;
use App\Http\Controllers\Controller;
use Exception;

class SenderSitesController extends Controller
{

    /**
     * Display a listing of the sender sites.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $senderSitesObjects = sender_sites::with('sendercompany')->paginate(25);

        return view('sender_sites.index', compact('senderSitesObjects'));
    }

    /**
     * Show the form for creating a new sender sites.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $senderCompanies = sender_companies::pluck('company_name','id')->all();
        
        return view('sender_sites.create', compact('senderCompanies'));
    }

    /**
     * Store a new sender sites in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            sender_sites::create($data);

            return redirect()->route('sender_sites.sender_sites.index')
                             ->with('success_message', 'Sender Sites was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified sender sites.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $senderSites = sender_sites::with('sendercompany')->findOrFail($id);

        return view('sender_sites.show', compact('senderSites'));
    }

    /**
     * Show the form for editing the specified sender sites.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $senderSites = sender_sites::findOrFail($id);
        $senderCompanies = sender_companies::pluck('company_name','id')->all();

        return view('sender_sites.edit', compact('senderSites','senderCompanies'));
    }

    /**
     * Update the specified sender sites in the storage.
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
            
            $senderSites = sender_sites::findOrFail($id);
            $senderSites->update($data);

            return redirect()->route('sender_sites.sender_sites.index')
                             ->with('success_message', 'Sender Sites was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified sender sites from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $senderSites = sender_sites::findOrFail($id);
            $senderSites->delete();

            return redirect()->route('sender_sites.sender_sites.index')
                             ->with('success_message', 'Sender Sites was successfully deleted!');

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
            'country' => 'numeric|nullable',
            'county' => 'numeric|nullable',
            'city' => 'string|min:1|nullable',
            'state' => 'string|min:1|nullable',
            'address' => 'string|min:1|nullable',
            'lat' => 'string|min:1|nullable',
            'lng' => 'string|min:1|nullable',
            'phone' => 'string|min:1|nullable',
            'phone2' => 'string|min:1|nullable',
            'fax' => 'string|min:1|nullable',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
