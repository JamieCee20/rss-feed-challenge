@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Math, Science and Programming Comics</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 offset-sm-8 float-right text-right">
                <a href="{{ route('feed.index', ['sort' => 'old_new']) }}">Oldest to Newest</a> |
                <a href="{{ route('feed.index', ['sort' => 'random']) }}">Random</a> |
                <a href="{{ route('feed.index', ['sort' => 'new_old']) }}">Newest to Oldest</a>
            </div>
        </div>
        <div class="row">
            @foreach($feedList as $item)
                <div class="col-sm-6 my-3 d-flex flex-row justify-content-center align-items-center">
                    <div class="card border rounded p-3" data-id="{{$item->id}}">
                        {!! $item->description !!}
                        <div class="card-body">
                            <h2 class="card-text">{{$item->title}}</h2>
                            <small class="text-muted">Published: {{date('F dS, Y - g:iA', strtotime($item->pubDate))}}</small>
                        </div>
                        <div class="card-footer d-none">
                            <a href="{{$item->link}}" class="btn btn-primary" target="_blank">View Article</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

@section('extra-js')
    <script type="module">
        const cards = document.querySelectorAll('.card');
        cards.forEach(card => card.addEventListener('click', e => {
            if(e.altKey) {
                const nodes = card.querySelector('.card-footer');
                // console.log(nodes[5].classList);
                nodes.classList.remove('d-none');

            }
        }))

        document.querySelector('body').addEventListener('click', (e) => {
            if (!e.target.closest(".card")) {
                const span = document.querySelectorAll('.card-footer');
                span.forEach(item => item.classList.add('d-none'))
            }
        })


    </script>
@endsection


