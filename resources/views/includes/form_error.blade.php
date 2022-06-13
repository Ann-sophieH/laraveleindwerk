@if($errors->any())
    <div class="container-fluid col-lg-10 offset-lg-1 mt-3 fs-reg">

    <div class="alert alert-danger opacity-6 alert-dismissible " role="alert">
        <i class="bi bi-bell ps-3">

        </i>
       <ul>
           @foreach($errors->all() as $error)
               <li class="list-unstyled text-muted ps-2">{{$error}}</li>
           @endforeach
       </ul>
        <button type="button" class="btn-close text-lg py-3 opacity-9" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"></span>
        </button>
    </div>
    </div>
@endif
