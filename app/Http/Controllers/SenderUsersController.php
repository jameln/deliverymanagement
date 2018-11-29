<?php

namespace App\Http\Controllers;

use App\Models\sender_users;
use Illuminate\Http\Request;
use App\Models\sender_companies;
use App\Http\Controllers\Controller;
use Exception;

class SenderUsersController extends Controller
{

    /**
     * Display a listing of the sender users.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $senderUsersObjects = sender_users::with('sendercompany')->paginate(25);

        return view('sender_users.index', compact('senderUsersObjects'));
    }

    /**
     * Show the form for creating a new sender users.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $senderCompanies = sender_companies::pluck('company_name','id')->all();
        
        return view('sender_users.create', compact('senderCompanies'));
    }

    /**
     * Store a new sender users in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            sender_users::create($data);

            return redirect()->route('sender_users.sender_users.index')
                             ->with('success_message', 'Sender Users was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified sender users.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $senderUsers = sender_users::with('sendercompany')->findOrFail($id);

        return view('sender_users.show', compact('senderUsers'));
    }

    /**
     * Show the form for editing the specified sender users.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $senderUsers = sender_users::findOrFail($id);
        $senderCompanies = sender_companies::pluck('company_name','id')->all();

        return view('sender_users.edit', compact('senderUsers','senderCompanies'));
    }

    /**
     * Update the specified sender users in the storage.
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
            
            $senderUsers = sender_users::findOrFail($id);
            $senderUsers->update($data);

            return redirect()->route('sender_users.sender_users.index')
                             ->with('success_message', 'Sender Users was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified sender users from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $senderUsers = sender_users::findOrFail($id);
            $senderUsers->delete();

            return redirect()->route('sender_users.sender_users.index')
                             ->with('success_message', 'Sender Users was successfully deleted!');

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
            'phone' => 'string|min:1|nullable',
            'cin' => 'string|min:1|nullable',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
