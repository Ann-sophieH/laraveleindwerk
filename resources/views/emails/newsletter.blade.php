@component('mail::message')
# Introduction

<h1> Thank you for subscribing to our newsletter!</h1>
<p class="fs-reg ">you're now subscribed to Bang & Oluffson updates</p>
<p class="fs-reg "> As a thank you we would like to offer you 20% off on your first offer! </p>
<p class="fs-bo ">COUPON CODE <br> 12345678</p>
@component('mail::button', ['url' => 'http://localhost/laraveleindwerk/public/products'])
GET 20% OFF NOW!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
