<li class="TPostMv">
    <article id="post-698303"
        class="TPost C post-698303 post type-post status-publish format-standard has-post-thumbnail hentry">
        <a href="{{ $movie->getUrl() }}">
            <div class="Image">
                <figure class="Objf TpMvPlay AAIco-play_arrow">
                    <img width="215" height="320"
                        src="{{ $movie->getThumbUrl() }}"
                        class="attachment-thumbnail size-thumbnail wp-post-image" alt="{{ $movie->name }} ({{ $movie->publish_year }})"
                        title="{{ $movie->name }} ({{ $movie->publish_year }})">

                </figure>

                <span class="mli-v1">{{ $movie->language }}</span>
                <div class="anime-extras" bis_skin_checked="1">
                    <div class="anime-avg-user-rating" data-action="click->anime-card#showLibraryEditor"
                        bis_skin_checked="1"><i class="fa fa-star"></i>&nbsp;{{$movie->getRatingStar()}}</div>
                </div>
                <span class="mli-eps">
                    Tập
                    <i>{{ $movie->episode_current }}</i>
                </span>


            </div>
            <h2 class="Title">{{ $movie->name }}</h2>
            <span class="Year">{{ $movie->origin_name }}</span>
        </a>
        <div class="TPMvCn anmt">
            <div class="Title" style="text-align:justify">{{ $movie->name }}</div>
            <span class="Year" style="text-align:justify">{{ $movie->origin_name }}</span>
            <p class="Info"> <span class="Time AAIco-access_time"></span> <span
                    class="Date AAIco-date_range">{{ $movie->publish_year }}</span></p>
            <div style="text-align:justify" class="Description">
                <p>{!! mb_substr(strip_tags($movie->content), 0, 142, 'utf-8') !!}...</p>
                <p class="Director AAIco-videocam"><span>Đạo diễn:</span>
                    {{ count($movie->directors) ? $movie->directors->first()['name'] : 'Đang cập nhật' }}
                    <i class="Button STPa AAIco-more_horiz"></i>
                </p>
                <p class="Genre AAIco-movie_creation"><span>Thể loại:</span>
                    {!! count($movie->categories)
                        ? '<a href="' .
                            $movie->categories->first()->getUrl() .
                            '" title="' .
                            $movie->categories->first()['name'] .
                            '">' .
                            $movie->categories->first()['name'] .
                            '</a>'
                        : 'N/A' !!}
                    <i class="Button STPa AAIco-more_horiz"></i>
                </p>
                <p class="Actors AAIco-person"><span>Diễn viên:</span>
                    {{ count($movie->actors) ? $movie->actors->first()['name'] : 'N/A' }}
                    <i class="Button STPa AAIco-more_horiz"></i>
                </p>
            </div>
        </div>
    </article>
</li>
