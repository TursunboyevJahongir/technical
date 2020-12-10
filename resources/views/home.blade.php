@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-9">
            <div class="pt-4 "><b>{{ Auth::user()->name }}</b></div>
            <div>{{ Auth::user()->email }}</div>
            <div class="d-flex  m-5">
                <div class='pr-4'><strong>{{ Auth::user()->articles()->count() }}</strong> публикаций</div>
            </div>
            <a class="" href="{{ url('/article/create') }}">
                <svg class="bi bi-plus-circle-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4a.5.5 0 0 0-1 0v3.5H4a.5.5 0 0 0 0 1h3.5V12a.5.5 0 0 0 1 0V8.5H12a.5.5 0 0 0 0-1H8.5V4z" />
                </svg>
                Add article
            </a>

        </div>
    </div>
    <div class="card-group row mt-3 m-3 ">
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif
        @foreach ($articles as $article)
            <div class="col-12">
                <div class="row">
                    <div class="col-11">
                        <a href="article/{{ $article->id }}">
                            <p>{{ substr($article->text, 0, 200) }}...</p>
                        </a>
                    </div>
                    <div class="col-1">
                        <form action="{{url('/article/'.$article->id)}}"
                            method="POST">
                          @csrf
                          @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm delete-confirmation" data-toggle="tooltip" title="Delete"> <svg width="1em" height="1em"
                                viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                            </svg></button>
                        </form>
                    </div>
                </div>
                <br>
            </div>
        @endforeach
    </div>
@endsection
