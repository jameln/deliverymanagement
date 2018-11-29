<?php

namespace App\Http\Controllers;

use App\Models\currencies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class CurrenciesController extends Controller
{

    /**
     * Display a listing of the currencies.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $currencies = currencies::paginate(25);

        return view('currencies.index', compact('currencies'));
    }

    /**
     * Show the form for creating a new currency.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('currencies.create');
    }

    /**
     * Store a new currency in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            currencies::create($data);

            return redirect()->route('currencies.currency.index')
                             ->with('success_message', 'Currency was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified currency.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $currency = currencies::findOrFail($id);

        return view('currencies.show', compact('currency'));
    }

    /**
     * Show the form for editing the specified currency.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $currency = currencies::findOrFail($id);
        

        return view('currencies.edit', compact('currency'));
    }

    /**
     * Update the specified currency in the storage.
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
            
            $currency = currencies::findOrFail($id);
            $currency->update($data);

            return redirect()->route('currencies.currency.index')
                             ->with('success_message', 'Currency was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified currency from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $currency = currencies::findOrFail($id);
            $currency->delete();

            return redirect()->route('currencies.currency.index')
                             ->with('success_message', 'Currency was successfully deleted!');

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
            'name' => 'string|min:1|max:255|nullable',
            'symbol' => 'string|min:1|nullable',
            'vallue' => 'string|min:1|nullable',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
