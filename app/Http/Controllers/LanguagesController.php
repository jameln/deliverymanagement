<?php

namespace App\Http\Controllers;

use App\Models\language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class LanguagesController extends Controller
{

    /**
     * Display a listing of the languages.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $languages = language::paginate(25);

        return view('languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new language.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('languages.create');
    }

    /**
     * Store a new language in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            language::create($data);

            return redirect()->route('languages.language.index')
                             ->with('success_message', 'Language was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified language.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $language = language::findOrFail($id);

        return view('languages.show', compact('language'));
    }

    /**
     * Show the form for editing the specified language.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $language = language::findOrFail($id);
        

        return view('languages.edit', compact('language'));
    }

    /**
     * Update the specified language in the storage.
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
            
            $language = language::findOrFail($id);
            $language->update($data);

            return redirect()->route('languages.language.index')
                             ->with('success_message', 'Language was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified language from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $language = language::findOrFail($id);
            $language->delete();

            return redirect()->route('languages.language.index')
                             ->with('success_message', 'Language was successfully deleted!');

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
            'slug' => 'string|min:1|nullable',
            'rtl' => 'string|min:1|nullable',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
