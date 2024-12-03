@extends('layouts')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{ $message }}
                        </div>
                    @endif
                    <form action="{{ route('authenticate') }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email
                                Address</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control @error('') is-invalid @enderror" name=""
                                    value="{{ old('') }}">
                                @if ($errors->has(''))
                                    <span class="text-danger">{{ $errors->first('') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control @error('') is-invalid @enderror" name="">
                                @if ($errors->has(''))
                                    <span class="text-danger">{{ $errors->first('') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
