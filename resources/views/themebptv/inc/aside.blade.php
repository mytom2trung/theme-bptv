<aside class="widget-area" role="complementary">
    @if (get_theme_option('addlinkrandom'))
        <section class="Wdgt">
            <div class="Title">
                <i class="fa fa-question-circle"></i>&nbsp; &nbsp;HÔM NAY XEM GÌ?
            </div>
            <p style="text-align:justify">Nếu bạn buồn phiền không biết xem gì hôm nay. Để chúng tôi chọn phim cho bạn
                nhé!
            </p>
            <button id="randomMovieButton" class="Button TPlay AAIco-play_circle_outline"
                onclick="redirectRandomMovie()"><strong>Xem phim ngẫu nhiên</strong></button>
        </section>
    @endif
    {{-- <div class="Dvr-300">
    </div> --}}
    @foreach ($tops as $item)
        @include('themes::themebptv.inc.aside.' . $item['template'])
    @endforeach
    {{-- <div class="Dvr-300">
    </div> --}}
    <div class="tag-list-main">
    </div>
    {!! get_theme_option('moinguoitimkiem') !!}
    <section class="Wdgt">
        <div class="Title"><i class="fa-solid fa-link"></i>&nbsp; &nbsp;Mọi người cũng tìm kiếm</div>
        <p class="Year" style="text-align:justify;">
            @foreach ($phimmoi as $movie)
                <a title="{{ $movie->name }}" style="color: #78909c;" href="{{ $movie->getUrl() }}">#{{$movie->name}}</a>
            @endforeach
        </p>
    </section>
</aside>
