@extends('main')

@section('title', '| Contact')

@section('content')
    <div class="row">
        <div class="col-md-12">
        <h1>Contact Me</h1>
        <hr>
        <form action="{{ url('contact') }}" method="POST" role="form">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" class="form-control" id="email">
            </div>

            <div class="form-group">
                <label for="email">Subject:</label>
                <input type="text" name="subject" class="form-control" id="subject">
            </div>

            <div class="form-group">
                <label for="email">Message:</label>
                <textarea name="message" id="message" class="form-control" rows="3">

                </textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        </div>
    </div>
@endsection
