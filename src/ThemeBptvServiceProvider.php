<?php

namespace Ophim\ThemeBptv;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class ThemeBptvServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->setupDefaultThemeCustomizer();
    }

    public function boot()
    {
        try {
            foreach (glob(__DIR__ . '/Helpers/*.php') as $filename) {
                require_once $filename;
            }
        } catch (\Exception $e) {
            //throw $e;
        }
        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'themes');

        $this->publishes([
            __DIR__ . '/../resources/assets' => public_path('themes/bptv')
        ], 'bptv-assets');
    }

    protected function setupDefaultThemeCustomizer()
    {
        config(['themes' => array_merge(config('themes', []), [
            'bptv' => [
                'name' => 'BptvMod',
                'author' => 'contact.animehay@gmail.com',
                'package_name' => 'ggg3/theme-phimletv',
                'publishes' => ['bptv-assets'],
                'preview_image' => '',
                'options' => [
                    [
                        'name' => 'recommendations_limit',
                        'label' => 'Recommended movies limit',
                        'type' => 'number',
                        'value' => 10,
                        'wrapperAttributes' => [
                            'class' => 'form-group col-md-4',
                        ],
                        'tab' => 'List'
                    ],
                    [
                        'name' => 'per_page_limit',
                        'label' => 'Pages limit',
                        'type' => 'number',
                        'value' => 20,
                        'wrapperAttributes' => [
                            'class' => 'form-group col-md-4',
                        ],
                        'tab' => 'List'
                    ],
                    [
                        'name' => 'movie_related_limit',
                        'label' => 'Movies related limit',
                        'type' => 'number',
                        'value' => 10,
                        'wrapperAttributes' => [
                            'class' => 'form-group col-md-4',
                        ],
                        'tab' => 'List'
                    ],
                    [
                        'name' => 'latest',
                        'label' => 'Home Page',
                        'type' => 'code',
                        'hint' => 'display_label|relation|find_by_field|value|limit|show_more_url|show_template (slider_poster|section_thumb)',
                        'value' => "Mới cập nhật||is_copyright|false|10|/danh-sach/phim-moi|section_thumb\r\nĐiện ảnh hàn quốc|regions|slug|han-quoc|12|/quoc-gia/han-quoc|section_thumb\r\nMỌT PHIM HOA NGỮ|regions|slug|trung-quoc|12|/quoc-gia/trung-quoc|section_thumb\r\nThiên đường phim thái|regions|slug|thai-lan|12|/quoc-gia/thai-lan|section_thumb",
                        'attributes' => [
                            'rows' => 5
                        ],
                        'tab' => 'List'
                    ],
                    [
                        'name' => 'hotest',
                        'label' => 'Danh sách hot',
                        'type' => 'code',
                        'hint' => 'Label|relation|find_by_field|value|sort_by_field|sort_algo|limit|show_template (top_text|top_thumb|top_poster)',
                        'value' => "Chung toi de cu||is_recommended|1|view_total|desc|6|top_decu\r\nTop phim hom nay||is_copyright|0|view_day|desc|10|top_phimhomnay\r\nPHIM LẺ HOT||type|single|view_total|desc|10|top_text\r\nTop phim bộ||type|series|view_total|desc|3|top_poster",
                        'attributes' => [
                            'rows' => 5
                        ],
                        'tab' => 'List'
                    ],
                    [
                        'name' => 'additional_css',
                        'label' => 'Additional CSS',
                        'type' => 'code',
                        'value' => "",
                        'tab' => 'Custom CSS'
                    ],
                    [
                        'name' => 'body_attributes',
                        'label' => 'Body attributes',
                        'type' => 'text',
                        'value' => "class='home blog wp-custom-logo NoBrdRa' style='background-image: url(/themes/bptv/images/background.png);'",
                        'tab' => 'Custom CSS'
                    ],
                    [
                        'name' => 'additional_header_js',
                        'label' => 'Header JS',
                        'type' => 'code',
                        'value' => "",
                        'tab' => 'Custom JS'
                    ],
                    [
                        'name' => 'additional_body_js',
                        'label' => 'Body JS',
                        'type' => 'code',
                        'value' => "",
                        'tab' => 'Custom JS'
                    ],
                    [
                        'name' => 'additional_footer_js',
                        'label' => 'Footer JS',
                        'type' => 'code',
                        'value' => "",
                        'tab' => 'Custom JS'
                    ],
                    [
                        'name' => 'footer',
                        'label' => 'Footer',
                        'type' => 'code',
                        'value' => <<<EOT
                        <footer class="Footer">
                            <div class="Container">
                                <div class="MnBrCn BgA">
                                    <div class="MnBr EcBgA">
                                        <div class="Container">
                                            <figure class="Logo">
                                                <a href="/" title="Phim Hay HD | Phim Vietsub | Xem Phim Vietsub HD Online | Hoạt Hình Vietsub | Xem Phim | Xem Phim Vietsub Miễn Phí Siêu Nhanh" rel="home">
                                                    <img width="165" height="35" src="//logo.png?v=1.2" alt="Phim Mới | Phim HD | Xem phim nhanh | Phim VietSub | Thuyết Minh Hay Nhất | Xem phim mới cập nhật 2023">
                                                </a>
                                            </figure>
                                            <div class="Rght">
                                                <nav class="Menu">
                                                    <ul>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item menu-item-home menu-item-490"><a href="/">Trang Chủ</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-493"><a href="page/lien-he.html">Liên hệ</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-493"><a href="/">DMCA</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-493"><a href="/">CS RIÊNG TƯ</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-493"><a href="/">ĐIỀU KHOẢN SỬ DỤNG</a></li>
                                                    </ul>
                                                </nav>
                                                <ul class="ListSocial">
                                                    <li>
                                                        <a target="_blank" href="mailto:contact@phim1z.net" class="fa-link"></a>
                                                    </li>
                                                    <li>
                                                        <a target="_blank" href="https://www.facebook.com/groups/phimz.org/" class="fa-facebook"></a>
                                                    </li>
                                                    <li>
                                                        <a target="_blank" href="https://t.me/+hC2J0oUMdMYwYTdl" class="fa-telegram"></a>
                                                    </li>
                                                    <li>
                                                        <a rel="nofollow" href="javascript:void(0)" class="Up AAIco-arrow_upward" title="Cuộn lên trên"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="WebDescription">
                                    <p class="Copy">
                                        Nguồn phim trên website được cập nhật một cách tự động hóa từ các nguồn chia sẻ trên internet. Chúng tôi không chịu bất kỳ trách nhiệm gì về những nguồn đăng tải này.<br> Nếu bạn cần sự trợ giúp, hay liên hệ với chúng tôi. Xin cảm ơn!

                                    </p>
                                </div>



                            </div>
                            </footer>
                        EOT,
                        'tab' => 'Custom HTML'
                    ],
                    [
                        'name' => 'ads_header',
                        'label' => 'Ads header',
                        'type' => 'code',
                        'value' => <<<EOT
                        <img src="" alt="">
                        EOT,
                        'tab' => 'Ads'
                    ],
                    [
                        'name' => 'ads_catfish',
                        'label' => 'Ads catfish',
                        'type' => 'code',
                        'value' => <<<EOT
                        <img src="" alt="">
                        EOT,
                        'tab' => 'Ads'
                    ],
                    [
                        'name' => 'moinguoitimkiem',
                        'label' => 'Sidebar',
                        'type' => 'code',
                        'value' => <<<EOT
                        <section class="Wdgt">
                            <div class="Title"><i class="fa-solid fa-link"></i>&nbsp; &nbsp;Mọi người cũng tìm kiếm</div>
                            <p class="Year" style="text-align:justify;">
                                <a style="color: #78909c;" href="/tu-khoa/dao-hai-tac" rel="follow, index" title="Phim Đảo Hải Tặc - One Piece (1999)">#Đảo Hải Tặc</a>
                            </p>
                        </section>
                        EOT,
                        'tab' => 'Addon custom'
                    ],
                    [
                        'name' => 'addlinkrandom',
                        'label' => 'Thêm Link Random',
                        'type' => 'code',
                        'value' => <<<EOT
                        "/phim/ra-khoi-villains-vale.html","/phim/bi-mat-cua-guong-ca-doi.html",
                        EOT,
                        'tab' => 'Addon custom'
                    ],
                    [
                        'name' => 'phimlebo',
                        'label' => 'Phim lẻ bộ home ( Đang cập nhật )',
                        'type' => 'code',
                        'value' => <<<EOT
                        Đang update,
                        EOT,
                        'tab' => 'Addon custom'
                    ],
                ],
            ]
        ])]);
    }
}
