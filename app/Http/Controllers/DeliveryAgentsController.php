<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\delivery_agents;
use App\Models\delivery_companies;
use App\Http\Controllers\Controller;
use Exception;

class DeliveryAgentsController extends Controller
{

    /**
     * Display a listing of the delivery agents.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $deliveryAgentsObjects = delivery_agents::with('deliverycompany')->paginate(25);

        return view('delivery_agents.index', compact('deliveryAgentsObjects'));
    }

    /**
     * Show the form for creating a new delivery agents.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $deliveryCompanies = delivery_companies::pluck('company_name','id')->all();
        
        return view('delivery_agents.create', compact('deliveryCompanies'));
    }

    /**
     * Store a new delivery agents in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            delivery_agents::create($data);

            return redirect()->route('delivery_agents.delivery_agents.index')
                             ->with('success_message', 'Delivery Agents was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified delivery agents.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $deliveryAgents = delivery_agents::with('deliverycompany')->findOrFail($id);

        return view('delivery_agents.show', compact('deliveryAgents'));
    }

    /**
     * Show the form for editing the specified delivery agents.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $deliveryAgents = delivery_agents::findOrFail($id);
        $deliveryCompanies = delivery_companies::pluck('company_name','id')->all();

        return view('delivery_agents.edit', compact('deliveryAgents','deliveryCompanies'));
    }

    /**
     * Update the specified delivery agents in the storage.
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
            
            $deliveryAgents = delivery_agents::findOrFail($id);
            $deliveryAgents->update($data);

            return redirect()->route('delivery_agents.delivery_agents.index')
                             ->with('success_message', 'Delivery Agents was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified delivery agents from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $deliveryAgents = delivery_agents::findOrFail($id);
            $deliveryAgents->delete();

            return redirect()->route('delivery_agents.delivery_agents.index')
                             ->with('success_message', 'Delivery Agents was successfully deleted!');

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
            'phone' => 'string|min:1|nullable',
            'cin' => 'string|min:1|nullable',
            'dln' => 'string|min:1|nullable',
            'photo' => ['file','nullable'],
     
        ];
        
        $data = $request->validate($rules);
        if ($request->has('custom_delete_photo')) {
            $data['photo'] = null;
        }
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->moveFile($request->file('photo'));
        }

        return $data;
    }
  
    /**
     * Moves the attached file to the server.
     *
     * @param Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return string
     */
    protected function moveFile($file)
    {
        if (!$file->isValid()) {
            return '';
        }
        
        $path = config('codegenerator.files_upload_path', 'uploads');
        $saved = $file->store('public/' . $path, config('filesystems.default'));

        return substr($saved, 7);
    }
}
