<?php

namespace Osoobe\CRM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LeadController extends Controller
{


    public function index(Request $request) {
        return view('obcrm::lead.index');
    }


}
