<?php

namespace App\Http\Controllers;

use App\Models\currencies;
use Illuminate\Http\Request;
use App\Models\sender_companies;
use App\Models\sender_categories;
use App\Http\Controllers\Controller;
use Exception;

class SenderCompaniesController extends Controller
{

    /**
     * Display a listing of the sender companies.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $senderCompaniesObjects = sender_companies::with('currency','sendercategory')->paginate(25);

        return view('sender_companies.index', compact('senderCompaniesObjects'));
    }

    /**
     * Show the form for creating a new sender companies.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $currencies = currencies::pluck('name','id')->all();
$senderCategories = sender_categories::pluck('name','id')->all();
        
        return view('sender_companies.create', compact('currencies','senderCategories'));
    }

    /**
     * Store a new sender companies in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            sender_companies::create($data);

            return redirect()->route('sender_companies.sender_companies.index')
                             ->with('success_message', 'Sender Companies was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified sender companies.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $senderCompanies = sender_companies::with('currency','sendercategory')->findOrFail($id);

        return view('sender_companies.show', compact('senderCompanies'));
    }

    /**
     * Show the form for editing the specified sender companies.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $senderCompanies = sender_companies::findOrFail($id);
        $currencies = currencies::pluck('name','id')->all();
$senderCategories = sender_categories::pluck('name','id')->all();

        return view('sender_companies.edit', compact('senderCompanies','currencies','senderCategories'));
    }

    /**
     * Update the specified sender companies in the storage.
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
            
            $senderCompanies = sender_companies::findOrFail($id);
            $senderCompanies->update($data);

            return redirect()->route('sender_companies.sender_companies.index')
                             ->with('success_message', 'Sender Companies was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified sender companies from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $senderCompanies = sender_companies::findOrFail($id);
            $senderCompanies->delete();

            return redirect()->route('sender_companies.sender_companies.index')
                             ->with('success_message', 'Sender Companies was successfully deleted!');

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
            'city' => 'string|min:1|nullable',
            'state' => 'string|min:1|nullable',
            'adress' => 'string|min:1|nullable',
            'lat' => 'string|min:1|nullable',
            'lng' => 'string|min:1|nullable',
            'phone' => 'string|min:1|nullable',
            'phone2' => 'string|min:1|nullable',
            'fax' => 'string|min:1|nullable',
            'logo' => ['file','nullable'],
            'website' => 'string|min:1|nullable',
            'currencies_id' => 'nullable',
            'sender_category_id' => 'nullable',
     
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
