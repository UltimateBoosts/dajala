<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    //
    public function sendEmail(Request $request)
    {
        $receivers = ["info@dajalacerrosycordilleras.com"];
        Mail::to($receivers)->send(new ContactEmail($request));
        return redirect('contacto')->with('success', 'Enviado satisfactoriamente');
    }
}
