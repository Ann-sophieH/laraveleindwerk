@extends('layouts/index')
@section('content')
    @include('includes.breadcrum_top')
<div class="container-fluid col-lg-10 offset-lg-1 mt-5 fs-reg">
    <div id="app">
        <cart-weergave>

        </cart-weergave>
    </div>

</div>


<script>
    const mountedApp = app.mount('#app')
</script>
@endsection
