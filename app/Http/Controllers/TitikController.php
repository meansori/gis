<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TitikModel;

class TitikController extends Controller
{
    protected $TitikModel;
    public function __construct()
    {
        
        $this->TitikModel = new TitikModel();
    }

    public function index(){
        return view('welcome');
    }

    public function titik(){
        $results = $this->TitikModel->allData();
        return json_encode($results);
    }
}
