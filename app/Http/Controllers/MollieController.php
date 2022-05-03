<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Mollie\Laravel\Facades\Mollie;

class MollieController extends Controller
{

    public function  __construct() {
        Mollie::api()->setApiKey('test_aMQCVHrkKHhvfPsPgknekjdg3SSjpd'); // your mollie test api key
    }

    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function preparePayment()
    {

        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => 'EUR', // Type of currency you want to send
                'value' => '10.00', // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'description' => 'Order #12345',
            'redirectUrl' => route('payment.success'), // after the payment completion where you to redirect
            "metadata" => [
                "order_id" => "12345",
                "user_id"
            ],
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);
        //dd( $payment->id);

        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    /**
     * Page redirection after the successfull payment
     *
     * @return Response
     */
    public function paymentSuccess() {
        //echo 'payment has been received';
        //$payment = Mollie::api()->payments()->get($payment->id);
        dd( Mollie::api()->payments());
        Session::flash('payment_message', 'The payment went through');//put message in cart!!

        return redirect('cart');
    }
}
