<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(){
        return view('pages.partner.list');
    }
    public function addPartner()
    {
        return view('pages.partner.add');
    }
    public function listProject()
    {
        return view('pages.partner.list');
    }
}
