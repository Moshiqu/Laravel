<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookRequest;

class BookRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $books = BookRequest::all();

        return view('booksRequest.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('booksRequest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>['required','min:6','alpha_num'],
            'phone'=> ['required','integer','digits:8'],
            'email' => ['required','email:rfc,dns'],
            'item_name' => ['required','min:15','alpha_num'],
            'pickup_date' =>['required','date']
        ]);
        $bookrequest = new BookRequest([
            'name' => $request->get('name'),
            'phone'=> $request->get('phone'),
            'email'=> $request->get('email'),
            'item_name'=> $request->get('item_name'),
            'pickup_date'=> $request->get('pickup_date'),
        ]);

        $bookrequest->save();
        return redirect('/bookrequest')->with('success', 'Stock has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
