<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showadmindashboard(){
        return view("Admin.Dashboard.index");
    }
}
