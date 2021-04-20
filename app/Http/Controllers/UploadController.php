<?php


namespace App\Http\Controllers;


use Symfony\Component\HttpFoundation\Request;

class UploadController
{
    function index(Request $req){
        return $req->file('file')->store('docs');
    }
}
