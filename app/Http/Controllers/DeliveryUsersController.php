<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\delivery_users;
use App\Models\delivery_companies;
use App\Http\Controllers\Controller;
use Exception;

class DeliveryUsersController extends Controller
{

    /**
     * Display a listing of the delivery users.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $deliveryUsersObjects = delivery_users::with('deliverycompany')->paginate(25);

        return view('delivery_users.index', compact('deliveryUsersObjects'));
    }

    /**
     * Show the form for creating a new delivery users.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $deliveryCompanies = delivery_companies::pluck('company_name','id')->all();
        
        return view('delivery_users.create', compact('deliveryCompanies'));
    }

    /**
     * Store a new delivery users in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            delivery_users::create($data);

            return redirect()->route('delivery_users.delivery_users.index')
                             ->with('success_message', 'Delivery Users was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified delivery users.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $deliveryUsers = delivery_users::with('deliverycompany')->findOrFail($id);

        return view('delivery_users.show', compact('deliveryUsers'));
    }

    /**
     * Show the form for editing the specified delivery users.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $deliveryUsers = delivery_users::findOrFail($id);
        $deliveryCompanies = delivery_companies::pluck('company_name','id')->all();

        return view('delivery_users.edit', compact('deliveryUsers','deliveryCompanies'));
    }

    /**
     * Update the specified delivery users in the storage.
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
            
            $deliveryUsers = delivery_users::findOrFail($id);
            $deliveryUsers->update($data);

            return redirect()->route('delivery_users.delivery_users.index')
                             ->with('success_message', 'Delivery Users was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified delivery users from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $deliveryUsers = delivery_users::findOrFail($id);
            $deliveryUsers->delete();

            return redirect()->route('delivery_users.delivery_users.index')
                             ->with('success_message', 'Delivery Users was successfully deleted!');

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
