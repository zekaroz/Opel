<!--  Validation Messages -->
@if ( $errors->any() ) 
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error) 
            <div>
               <i class="fa fa-remove"></i> {{$error}}
            </div>
        @endforeach
    </ul>
@endif