<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRentedBooksRequest;
use App\Http\Requests\UpdateRentedBooksRequest;
use App\Models\RentedBooks;

class RentedBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRentedBooksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRentedBooksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RentedBooks  $rentedBooks
     * @return \Illuminate\Http\Response
     */
    public function show(RentedBooks $rentedBooks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RentedBooks  $rentedBooks
     * @return \Illuminate\Http\Response
     */
    public function edit(RentedBooks $rentedBooks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRentedBooksRequest  $request
     * @param  \App\Models\RentedBooks  $rentedBooks
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRentedBooksRequest $request, RentedBooks $rentedBooks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RentedBooks  $rentedBooks
     * @return \Illuminate\Http\Response
     */
    public function destroy(RentedBooks $rentedBooks)
    {
        //
    }
}
