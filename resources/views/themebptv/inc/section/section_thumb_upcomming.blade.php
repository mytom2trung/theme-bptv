<section id="new-home">
    <div class="Top">
        <h1>{{ $item['label'] }}<i class="fa fa-angle-right"></i></h1>
    </div>
    <ul class="MovieList Rows AX A06 B04 C03 E20">
        @foreach ($item['data'] as $movie)
            <li class="TPostMv">
                <article id="post-65"
                    class="TPost C post-65 post type-post status-publish format-standard has-post-thumbnail hentry">
                    <a href="{{$movie->getUrl()}}">
                        <div class="Image">
                            <figure class="Objf TpMvPlay AAIco-play_arrow">
                                <img width="215" height="320"
                                    src="{{ $movie->getThumbUrl() }}"
                                    class="attachment-thumbnail size-thumbnail wp-post-image"
                                    alt="{{ $movie->name }} - {{ $movie->origin_name}} ({{ $movie->publish_year}})"
                                    title="{{ $movie->name }} - {{ $movie->origin_name}} ({{ $movie->publish_year}})">
                            </figure>
                            <span class="v1-pro" data-timer_second="1006432">Sắp Chiếu</span><span
                                class="b">{{ $movie->publish_year}}</span>
                            <span class="a2-1">{{ $movie->getRatingStar() }}</span>
                        </div>
                        <h2 class="Title">{{ $movie->name }}</h2>
                        <span class="Year">{{ $movie->origin_name}}</span>

                    </a>
                    <div>
                        <span class="Year"> Lượt xem {{ $movie->view_total }}</span>
                    </div>
                    <div class="TPMvCn anmt">
                        <div class="Title">{{ $movie->name }}</div>
                        <p class="Info">
                            <span class="Vote AAIco-star">{{ $movie->getRatingStar() }}</span>
                            <span class="Time AAIco-access_time">{{ $movie->episode_time }}</span>
                            <span class="Date AAIco-date_range">{{ $movie->publish_year }}</span>
                        </p>
                        <div class="Description">
                            <p>{!! mb_substr($movie->content,0,160, "utf-8") !!}...</p>
                            <p class="Director AAIco-videocam">
                                <span>Đạo diễn:</span>
                                Yongchang Lin
                            </p>
                            <p class="Genre AAIco-movie_creation">
                                <span>Thể loại:</span>
                                <a href="https://animevietsub.top/the-loai/phieu-luu" title="Phiêu Lưu">Phiêu Lưu</a>
                            </p>
                            <p class="Actors AAIco-person">
                                <span>Diễn viên:</span>
                                Bingjun Zhang <i class="Button STPa AAIco-more_horiz"></i>
                            </p>
                        </div>
                    </div>
                </article>
            </li>
        @endforeach
    </ul>
    <a href="{{ $item['link'] }}" class="viewall">Xem thêm.. <i class="ion-ios-arrow-right"></i></a>
    <style>
        span.mli-quality {
            position: absolute;
            top: 5px;
            right: 10px;
            width: 40px;
            padding-top: 8px;
            text-align: center;
            height: 40px;
            border-radius: 50%;
            background: rgba(183, 28, 28, .9);
            color: #fff;
            font-size: 10px;
            text-transform: uppercase;
            line-height: 1em;
            text-shadow: 0 0 2px rgba(0, 0, 0, .3);
        }

        span.mli-quality {
            display: block;
            font-weight: 700;
            font-size: 16px;
            font-style: normal;
            margin-top: 3px;
        }

        span.mli-quality {
            font-size: 12px;
        }

        .a2-1 {
            transition: opacity .15s linear;
            left: 0;
            position: absolute;
            font-size: .95em;
            color: #fff;
            z-index: 5;
            top: 5px;
            clear: left;
            margin-bottom: .5em;
            padding: .5em 1em;
            background: rgba(0, 0, 0, .65);
            border-radius: 20em;
            margin-left: .5em;
            cursor: pointer;
            color: #f5ec42;
        }

        .a2-1:before {
            content: "\2605";
        }

        span.v1-pro {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            display: block;
            white-space: nowrap;
            background-color: #d43939;
            color: #fff;
            font-size: 13px;
            text-align: center;
            padding: 4px 0;
        }

        span.b {
            text-align: center;
            color: #fff;
            font-size: 30px;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            padding: 50% 0;
            text-shadow: 0 0 10px rgba(0, 0, 0, 1);
            background: rgba(0, 0, 0, 0.2);
        }
    </style>
</section>
