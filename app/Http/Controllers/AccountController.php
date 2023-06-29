<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function index()
    {
        return Account::all();
    }


    public function create()
    {

    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}
