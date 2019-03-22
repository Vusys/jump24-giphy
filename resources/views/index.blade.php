@extends('_layouts.master')

@section('title', 'Popular GIFs')

@section('body')

    @include('_partials.nav')

    <section class="container">
        <div class="row">
            @isset($search)
                <h1 class="mt-3 mb-3" id="results-title">Search results for {{ $search }}</h1>
            @else
                <h1 class="mt-3 mb-3" id="results-title">{{ $title }}</h1>
            @endif
        </div>
    </section>

    <section class="container">
        <div class="row">
            @if($gifs->isEmpty())
                <div class="alert alert-danger" id="no-gifs" role="alert">There are no GIFs available :(</div>
            @endif

            <div class="card-columns" id="cards">
                @foreach($gifs as $gif)
                    <div class="card">
                        <img src="{{ $gif['preview'] }}" alt="" class="card-img-top">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function () {
            $('#search-form').submit(function (event) {
                event.preventDefault();

                $.post('{{ route('search') }}', {
                    search: $('#search-gifs').val()
                }, function (data) {

                    window.history.replaceState({}, null, '/search/' + $('#search-gifs').val());

                    $('#results-title').text('Search results for ' + $('#search-gifs').val());
                    $('#no-gifs').remove();
                    $('#cards').html('');

                    $.each(data, function (i, image) {
                        let card = '<div class="card"><img src="' + image.preview + '" alt="" class="card-img-top"></div>';
                        $('#cards').append(card);
                    });
                });

            });
        });
    </script>
@endsection