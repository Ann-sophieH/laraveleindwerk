@component('mail::message')
    <h1>Message from {{$data['name']}}</h1>
    <p>Name: <br>{{$data['name']}}</p>
    <p>Email: <br>{{$data['email']}}</p>
    <p>Message: <br> {{$data['message']}}</p>


@component('mail::button', ['url' =>'http://localhost/laraveleindwerk/public/admin'])
Go to homepage backend
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
