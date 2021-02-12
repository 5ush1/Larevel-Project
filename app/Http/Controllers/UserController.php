<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function about(): string
    {
        $about = "About";
        return view("user", ["about" => $about]);
    }

    public function contact(): string
    {
        $contact = "Contact";
        return view("user", ["contact" => $contact]);
    }
}
