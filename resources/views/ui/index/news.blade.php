<div class="slider-news-wrapper">
    <div class="slider-news">
        @foreach ($dataNews as $value)
        <div class="news">
            <div class="news-img">
                <a href="{{route('ui.detail.index_news',getUrl($value['name'], $value['id']))}}" style="background-image: url({{ getImage($value['image'], 'news') }});">
                </a>
            </div>
            <div class="news-content">
                <h4 class="news-title">
                    <a href="{{route('ui.detail.index_news',getUrl($value['name'], $value['id']))}}">{{$value['name']}}</a>
                </h4>
                <p class="news-desc">{{ $value['detail'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>