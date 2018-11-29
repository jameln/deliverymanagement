<?php

namespace App\Http\Controllers;

use App\Models\sender_items;
use Illuminate\Http\Request;
use App\Models\sender_companies;
use App\Http\Controllers\Controller;
use Exception;

class SenderItemsController extends Controller
{

    /**
     * Display a listing of the sender items.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $senderItemsObjects = sender_items::with('sendercompany')->paginate(25);

        return view('sender_items.index', compact('senderItemsObjects'));
    }

    /**
     * Show the form for creating a new sender items.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $senderCompanies = sender_companies::pluck('company_name','id')->all();
        
        return view('sender_items.create', compact('senderCompanies'));
    }

    /**
     * Store a new sender items in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            sender_items::create($data);

            return redirect()->route('sender_items.sender_items.index')
                             ->with('success_message', 'Sender Items was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified sender items.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $senderItems = sender_items::with('sendercompany')->findOrFail($id);

        return view('sender_items.show', compact('senderItems'));
    }

    /**
     * Show the form for editing the specified sender items.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $senderItems = sender_items::findOrFail($id);
        $senderCompanies = sender_companies::pluck('company_name','id')->all();

        return view('sender_items.edit', compact('senderItems','senderCompanies'));
    }

    /**
     * Update the specified sender items in the storage.
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
            
            $senderItems = sender_items::findOrFail($id);
            $senderItems->update($data);

            return redirect()->route('sender_items.sender_items.index')
                             ->with('success_message', 'Sender Items was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified sender items from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $senderItems = sender_items::findOrFail($id);
            $senderItems->delete();

            return redirect()->route('sender_items.sender_items.index')
                             ->with('success_message', 'Sender Items was successfully deleted!');

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
            'ref' => 'string|min:1|nullable',
            'description' => 'string|min:1|max:1000|nullable',
            'price' => 'string|min:1|nullable',
            'img' => 'string|min:1|nullable',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
