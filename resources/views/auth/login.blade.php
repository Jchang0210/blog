@extends('main')

@section('title', '| Login')

@section('content')

    <form action="{{ route('login') }}" method="POST" role="form">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="">Email:</label>
            <input type="text"  name="email" class="form-control" id="" placeholder="your email">

            <label for="">Password:</label>
            <input type="text"  name="password" class="form-control" id="" placeholder="your password">

            <label>
                <input type="checkbox" value="">
                Remember me
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection