@extends('layouts.app')
  
@section('content')
 <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
    <div class="authincation-content">
        <div class="row no-gutters">
            <div class="col-xl-12">
                <div class="auth-form">
                    <div class="text-center mb-3">
                    </div>
                    <h2 class="text-center mb-4">Sign in your account
                    </h2>

                    <form action="{{ route('login.post') }}" method="POST">
                                @csrf
                                
                            <div class="form-group">
                            <label class="mb-1">Email</label>
                            <input type="email" name="email" class="form-control" value="" required="">
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Password</label>
                            <input type="password" name="password" class="form-control" value="" required="">
                             @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                        </div>
                       
                           @if ($errors->any())
                                    <div class="text-danger text-center" >
                                            @foreach ($errors->all() as $error)
                                                {{ $error }}
                                            @endforeach
                                        
                                    </div>
                                @endif
                 
                        <div class="text-center">
                       
                    <button type="submit" class="btn btn-primary btn-block"><a   style="color: #fff;">Sign in </a>
                    </button>
                          
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>


@endsection