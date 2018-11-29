<?php

namespace App\Http\Controllers;

use App\Models\currencies;
use Illuminate\Http\Request;
use App\Models\delivery_companies;
use App\Http\Controllers\Controller;
use Exception;

class DeliveryCompaniesController extends Controller
{

    /**
     * Display a listing of the delivery companies.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $deliveryCompaniesObjects = delivery_companies::with('currency')->paginate(25);

        return view('delivery_companies.index', compact('deliveryCompaniesObjects'));
    }

    /**
     * Show the form for creating a new delivery companies.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $currencies = currencies::pluck('name','id')->all();
        
        return view('delivery_companies.create', compact('currencies'));
    }

    /**
     * Store a new delivery companies in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            delivery_companies::create($data);

            return redirect()->route('delivery_companies.delivery_companies.index')
                             ->with('success_message', 'Delivery Companies was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified delivery companies.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $deliveryCompanies = delivery_companies::with('currency')->findOrFail($id);

        return view('delivery_companies.show', compact('deliveryCompanies'));
    }

    /**
     * Show the form for editing the specified delivery companies.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $deliveryCompanies = delivery_companies::findOrFail($id);
        $currencies = currencies::pluck('name','id')->all();

        return view('delivery_companies.edit', compact('deliveryCompanies','currencies'));
    }

    /**
     * Update the specified delivery companies in the storage.
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
            
            $deliveryCompanies = delivery_companies::findOrFail($id);
            $deliveryCompanies->update($data);

            return redirect()->route('delivery_companies.delivery_companies.index')
                             ->with('success_message', 'Delivery Companies was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified delivery companies from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $deliveryCompanies = delivery_companies::findOrFail($id);
            $deliveryCompanies->delete();

            return redirect()->route('delivery_companies.delivery_companies.index')
                             ->with('success_message', 'Delivery Companies was successfully deleted!');

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
            'company_name' => 'string|min:1|nullable',
            'tva' => 'string|min:1|nullable',
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
            'logo' => ['file','nullable'],
            'website' => 'string|min:1|nullable',
            'currencies_id' => 'nullable',
     
        ];
        
        $data = $request->validate($rules);
        if ($request->has('custom_delete_logo')) {
            $data['logo'] = null;
        }
        if ($request->hasFile('logo')) {
            $data['logo'] = $this->moveFile($request->file('logo'));
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
