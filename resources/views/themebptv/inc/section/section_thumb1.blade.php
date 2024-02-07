<section id="new-home">
    <div class="Top">

        <h1>Phim mới cập nhật<i class="fa fa-angle-right"></i></h1>
                        <a href="https://hotphim.pro/danh-sach/phim-moi" class="STPb Current" data-tag="phim-moi" title="Tất Phim cả mới">Tất cả</a>
                        <a href="https://hotphim.pro/danh-sach/phim-le" class="STPb" data-tag="phim-le" title="Phim lẻ">Phim Lẻ</a>
                        <a href="https://hotphim.pro/danh-sach/phim-bo" class="STPb" data-tag="bo" title="Phim bộ">Phim Bộ</a>
                        <a href="https://hotphim.pro/the-loai/phim-18" class="STPb" data-tag="hanh-dong" title="Phim 18+">Phim 18+</a>
                     </div>
                     <ul class="MovieList Rows AX A06 B04 C03 E20">
        @foreach ($item['data'] as $movie)
            @include('themes::themebptv.inc.section.section_thumb_item')
        @endforeach
    </ul>
    <a href="{{ $item['link'] }}" class="viewall">Xem thêm.. <i class="ion-ios-arrow-right"></i></a>
</section>
