@extends('themes::layout')

@php
use Ophim\Core\Models\Movie;
    $menu = \Ophim\Core\Models\Menu::getTree();
    $randomphim = Cache::remember('site.movies.randomphim', setting('site_cache_ttl', 5 * 60), function () {
        return Movie::where('is_copyright', false)
            ->orderBy('updated_at', 'desc')
            ->get();
    });
    $tops = Cache::remember('site.movies.tops', setting('site_cache_ttl', 5 * 60), function () {
        $lists = preg_split('/[\n\r]+/', get_theme_option('hotest'));
        $data = [];
        foreach ($lists as $list) {
            if (trim($list)) {
                $list = explode('|', $list);
                [$label, $relation, $field, $val, $sortKey, $alg, $limit, $template] = array_merge($list, ['Phim hot', '', 'type', 'series', 'view_total', 'desc', 4, 'top_thumb']);
                try {
                    $data[] = [
                        'label' => $label,
                        'template' => $template,
                        'data' => \Ophim\Core\Models\Movie::when($relation, function ($query) use ($relation, $field, $val) {
                            $query->whereHas($relation, function ($rel) use ($field, $val) {
                                $rel->where($field, $val);
                            });
                        })
                            ->when(!$relation, function ($query) use ($field, $val) {
                                $query->where($field, $val);
                            })
                            ->orderBy($sortKey, $alg)
                            ->limit($limit)
                            ->get(),
                    ];
                } catch (\Exception $e) {
                    # code
                }
            }
        }

        return $data;
    });
    $phimmoi = Cache::remember('site.movies.phimmoi', setting('site_cache_ttl', 5 * 60), function () {
        return Movie::where('status', 'ongoing')
            ->limit(get_theme_option('recommendations_limit', '3'))
            ->orderBy('updated_at', 'desc')
            ->get();
    });
    $phimdecuside = Cache::remember('site.movies.phimdecuside', setting('site_cache_ttl', 5 * 60), function () {
        return Movie::inRandomOrder()
            ->limit('6')
            ->orderBy('view_total', 'asc')
            ->get();
    });
@endphp

@push('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/themes/bptv/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/themes/bptv/css/fonts.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/themes/bptv/css/style.css') }}" />
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/themes/bptv/css/custom.css') }}" /> --}}
@endpush

@section('body')
    <div class="Tp-Wp" id="Tp-Wp">
        @include('themes::themebptv.inc.header')
        @if (get_theme_option('ads_header'))
            <div class="ad-container">
                {!! get_theme_option('ads_header') !!}
            </div>
        @endif
        <div class="Body Container">
            <div class="Content">
                <div class="content">
                    @yield('slider_recommended')
                    @yield('breadcrumb')
                    @yield('catalog_filter')
                    <div class="TpRwCont">
                        @yield('content')
                        @include('themes::themebptv.inc.aside')
                    </div>
                </div>
            </div>
        </div>
        @include('themes::themebptv.inc.footer')
    </div>
    <script>
        function redirectRandomMovie() {
            // Array of movie links
            var movieLinks = [
                @foreach ($randomphim as $movie)
                    "{{ $movie->getUrl() }}",
                @endforeach
            ];

            // Get a random movie link
            var randomIndex = Math.floor(Math.random() * movieLinks.length);
            var randomMovieLink = movieLinks[randomIndex];

            // Redirect to the random movie link
            window.location.href = randomMovieLink;
        }
    </script>
@endsection


@section('footer')
    @if (get_theme_option('ads_catfish'))
        <div id="catfish" style="width: 100%;position:fixed;bottom:0;left:0;z-index:222" class="mp-adz">
            <div style="margin:0 auto;text-align: center;overflow: visible;" id="container-ads">
                {!! get_theme_option('ads_catfish') !!}
            </div>
        </div>
    @endif

    <script type="text/javascript">
        function JS_Load(u) {
            var d = document,
                p = d.getElementsByTagName('HEAD')[0],
                c = d.createElement('script');
            c.type = 'text/javascript';
            c.src = u;
            p.appendChild(c);
        }
    </script>
    <script type="text/javascript" src="{{ asset('/themes/bptv/js/bootstrap1.min.js') }}"></script>
    <script type="text/javascript">
        JS_Load('/themes/bptv/js/default.include-footer.js');
    </script>

    <script type="text/javascript" src="{{ asset('/themes/bptv/js/jquery-2.1.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/themes/bptv/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/themes/bptv/js/fx/util.js') }}"></script>
    <script>
        jQuery(document).ready(function(t) {
            $(".AAIco-arrow_upward").click(function() {
                $("html, body").animate({
                    scrollTop: 0
                }, "slow");
                return false;
            });
        })
    </script>
    {!! setting('site_scripts_google_analytics') !!}
@endsection

@push('scripts')
@endpush
