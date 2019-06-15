@extends('layouts.layout')

@section('content')
    <h1>
        ارسال مقاله
    </h1>

        <form class="" novalidate action="{{ route('article.store') }}" method="post">
            {!! csrf_field() !!}
            <div class="row form-group">
                <div class="col-md-6 mb-3">
                    <label for="firstName">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="" value="" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName">Body</label>
                    <textarea name="body" class="form-control"></textarea>
                </div>
            </div>

            <button class="btn btn-success" type="submit" value="submit">ارسال</button>
        </form>

@endsection