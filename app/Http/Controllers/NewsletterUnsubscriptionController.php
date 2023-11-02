<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterUnsubscriptionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Newsletter $newsletter) 
    {
        try {
            $newsletter->unsubscribe($mail = request('email'));
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'email' => "Hay problemas para eliminar al correo {$mail}"
            ]);
        }

        return redirect('/')->with('success', 'Hemos borrado al akak de la lista!');
    }
}
