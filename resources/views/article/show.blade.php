@extends('layouts.app')

@section('content')
    <div class="card ml-1 mr-1">
        <ul class="list-group list-group-flush">
            <p class="card-text list-group-item">{{$article->text}}</p>
        </ul>
        <div class="card-body">
            <button onclick="history.go(-1);">Back</button>
        {{-- <a href="{{url('')}}" class="card-link">Next Article</a> --}}
            {{-- <a href="#" class="card-link">Previous article</a> --}}
        </div>
    </div>

@endsection
