@if (count($recommendations))
    <div class="MovieListTopCn">
        <div class="MovieListTop owl-carousel">
            @foreach ($recommendations ?? [] as $movie)
                <li class="TPostMv">
                    <article id="post-{{ $movie->id }}"
                        class="TPost C post-{{ $movie->id }} post type-post status-publish format-standard has-post-thumbnail hentry">
                        <a href="{{ $movie->getUrl() }}">
                            <div class="Image">
                                <figure class="Objf TpMvPlay AAIco-play_arrow"><img width="215" height="320"
                                        src="{{ $movie->getThumbUrl() }}"
                                        class="attachment-thumbnail size-thumbnail wp-post-image"
                                        alt="{{ $movie->name }} - {{ $movie->origin_name }} ({{ $movie->publish_year }})"
                                        title="{{ $movie->name }} - {{ $movie->origin_name }} ({{ $movie->publish_year }})" />
                                </figure>
                                <div class="anime-extras" bis_skin_checked="1">
                                    <div class="anime-avg-user-rating" data-action="click->anime-card#showLibraryEditor"
                                        bis_skin_checked="1"><i class="fa fa-star"></i>&nbsp;{{ $movie->rating_star }}</div>
                                </div>
                                <span class="mli-eps">
                                    Tập
                                    <i>{{ $movie->episode_current }}</i>
                                </span>
                            </div>
                            <h2 class="Title">{{ $movie->name }}</h2> <span class="Year">{{ $movie->origin_name }}
                                ({{ $movie->publish_year }})
                            </span>
                        </a>
                    </article>
                </li>
            @endforeach
        </div>
    </div>
@endif
