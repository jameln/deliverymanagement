<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sender_categories;
use App\Http\Controllers\Controller;
use Exception;

class SenderCategoriesController extends Controller
{

    /**
     * Display a listing of the sender categories.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $senderCategories = sender_categories::paginate(25);

        return view('sender_categories.index', compact('senderCategories'));
    }

    /**
     * Show the form for creating a new sender category.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('sender_categories.create');
    }

    /**
     * Store a new sender category in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);
            
            sender_categories::create($data);

            return redirect()->route('sender_categories.sender_category.index')
                             ->with('success_message', 'Sender Category was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified sender category.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $senderCategory = sender_categories::findOrFail($id);

        return view('sender_categories.show', compact('senderCategory'));
    }

    /**
     * Show the form for editing the specified sender category.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $senderCategory = sender_categories::findOrFail($id);
        

        return view('sender_categories.edit', compact('senderCategory'));
    }

    /**
     * Update the specified sender category in the storage.
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
            
            $senderCategory = sender_categories::findOrFail($id);
            $senderCategory->update($data);

            return redirect()->route('sender_categories.sender_category.index')
                             ->with('success_message', 'Sender Category was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified sender category from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $senderCategory = sender_categories::findOrFail($id);
            $senderCategory->delete();

            return redirect()->route('sender_categories.sender_category.index')
                             ->with('success_message', 'Sender Category was successfully deleted!');

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
            'name' => 'string|min:1|max:255|nullable',

        ];

        $data = $request->validate($rules);


        return $data;
    }

}
