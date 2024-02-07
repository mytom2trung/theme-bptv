<section class="Wdgt" id="showTopPhim">
    <div class="Title">
        <div class="View AAIco-remove_red_eye">&nbsp; &nbsp;{{ $item['label'] }}</div>
    </div>
    <ul class="MovieList">
        @foreach ($item['data'] as $movie)
            <li>
                <div class="TPost A">
                    <a rel="bookmark" href="{{ $movie->getUrl() }}"> <span
                            class="Top">#{{ $loop->index + 1 }}<i></i></span>
                        <div class="Image">
                            <figure class="Objf TpMvPlay AAIco-play_arrow">
                                <img width="55" height="85"
                                    src="{{ $movie->getThumbUrl() }}"
                                    class="attachment-img-mov-sm size-img-mov-sm wp-post-image"
                                    alt="{{ $movie->name }} ({{ $movie->publish_year }})">
                            </figure>
                        </div>
                        <div class="Title">{{ $movie->name }}</div>
                    </a>
                    <p class="Info">
                        <span class="Vote AAIco-star">{{ $movie->getRatingStar() }}</span>
                        <span class="Time AAIco-access_time">{{ $movie->episode_time }}</span>
                        <span class="Date AAIco-date_range">{{ $movie->publish_year }}</span>
                    </p>
                    <span
                        title="{{ $movie->name }} (Strong Girl Namsoon) là một bộ phim Hàn Quốc thuộc thể loại tâm lý, tình cảm, hài hước của đạo diễn Kim Jung Shik. Phim..."
                        class="year"
                        style="text-align:justify;overflow: hidden;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;font-size: .65rem;">
                        {!! mb_substr(strip_tags($movie->content), 0, 142, 'utf-8') !!}...</span>
                </div>
            </li>
        @endforeach
    </ul>
</section>
