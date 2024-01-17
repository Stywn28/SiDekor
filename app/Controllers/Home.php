<?php

namespace App\Controllers;
use App\Models\DekorasiModel;

class Home extends BaseController
{
    // protected $dekorasi;
    // public function __construct() {
    //     $this->dekorasi = new DekorasiModel();
    // }
    public function index(): string
    {
        // $data['dekorasi'] = $this->dekorasi->limit(3)->findAll();
        return view('landpage');
    }

}
