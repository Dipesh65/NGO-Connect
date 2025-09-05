<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class NgoController extends Controller
{
    public function showNgoDashboard()
    {
        return view("NGO.Dashboard.index");
    }
}