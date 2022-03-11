@if($errors->any())
    <div class="alert alert-danger opacity-6 alert-dismissible text-white" role="alert">
       <ul>
           @foreach($errors->all() as $error)
               <li>{{$error}}</li>
           @endforeach
       </ul>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif
