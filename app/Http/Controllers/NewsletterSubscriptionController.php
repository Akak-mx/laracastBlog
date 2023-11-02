<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterSubscriptionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate([
            'email' => ['required', 'email']
        ]);

        try {
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'email' => "We couldn't subscribed you to our newsletter, are you sure you give a valid email?"
            ]);
        }

        return redirect('/')->with('success', 'You are now subscribed to our newsletter!');
    }
}
