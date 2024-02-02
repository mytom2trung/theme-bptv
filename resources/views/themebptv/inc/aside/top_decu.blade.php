<div class="Wdgt">
    <div class="Title"><i class="fa-lightbulb-o"></i>&nbsp; &nbsp;{{ $item['label'] }}</div>
    <div class="TpSbList">
        <ul class="MovieList Rows AF A04">
            @foreach ($item['data'] as $movie)
                <li>
                    <div class="TPost B">
                        <a title="{{ $movie->name }} - {{ $movie->origin_name }} ({{ $movie->publish_year }})"
                            href="{{ $movie->getUrl() }}">
                            <div class="Image">
                                <figure class="Objf TpMvPlay AAIco-play_arrow">
                                    <img alt="Thiếu Niên Ca Hành"
                                        src="{{ $movie->getThumbUrl() }}">
                                </figure>

                            </div>
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
