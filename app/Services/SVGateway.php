<?php

namespace App\Services;

use Stripe\Stripe;
use App\Models\Room;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;

class SVGateway extends BaseService 
{
    public function getQuery()
    {
        return new Room();
    }

    public function getCheckOutSession($request, $id)
    {
        // 1- find the room base on id
        $room = $this->getQuery()
                    ->where('global_id', $id)
                    ->first();

        // 2- create checkout session
        Stripe::setApiKey(config('services.stripe.secret'));
        header('Content-Type: application/json');

        $protocol = $request->getScheme();  // 'http' or 'https'
        $host     = $request->getHost();    // 'example.com'
        
        $successUrl = $protocol . '://' . $host . '/checkout-success';
        $cancelUrl = $protocol . '://' . $host . '/checkout-cancel';

        $checkout_session = Session::create([
            'payment_method_types' => ['card'],
            'customer_email'       => $request->input('customer_email'),
            'success_url'          => $successUrl,
            'cancel_url'           => $cancelUrl,
            'client_reference_id'  => $id,
            'mode'                 => 'payment',
            'line_items'           => [[
                'price_data' => [
                    'currency'     => 'usd',
                    'product_data' => [
                        'name'        => $room->name,
                        'description' => "Fake description.",
                    ],
                    'unit_amount' => 100, // Amount in cents
                ],
                'quantity' => 1,
            ]]
        ]);

        // 3- create session as response
        return $checkout_session;
    }
}