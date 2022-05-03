<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Support\Facades\Auth;
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
        $currentCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($currentCart); //nieuw model cart vullen
        $amount = number_format( $cart->totalPrice, 2);
      //  dd(strval($amount));
        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => 'EUR', // Type of currency you want to send
                'value' =>  strval($amount), // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'description' => 'Payment to BV Bing & Olufson ',
            'redirectUrl' => route('payment.success'), // after the payment completion where you to redirect
            "metadata" => [
                "order_id" => "12345"
            ],
        ]);
        //dd( $payment->status);

        $payment = Mollie::api()->payments()->get($payment->id);
        if($payment->id != null && $payment->status == 'paid'){
            /** new order  **/
            $order = new Order();
            $user = Auth::user();
            $order->user_id = $user->id;
            $order->transaction_code =$payment->id;
            //user id??
            $order->save();
            dd($order);
                /** getting cart to make orderdetails  **/
            $cart = $cart->products;
            foreach($cart as $item){
                $orderdetail = new Orderdetail();
                //dd($item);
                $orderdetail->order_id = $order->id;
                $orderdetail->product_id = $item['product_id'];
                $orderdetail->product_price = $item['product_price'];
                $orderdetail->amount = $item['quantity'];
                $orderdetail->save();
            }
        }

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
        //dd( Mollie::api()->payments());
        Session::flash('payment_message', 'The payment went through');//put message in cart!!

        return redirect('cart');
    }
}
