@extends('ui.common.master')
@section('seo')
    <title>Về chúng tôi | Quang Vinh - Coffee</title>
    <meta name="description" content="Rang xay nguyên chất. Không tẩm ướt, không hóa chất. Nguồn nguyên liệu có xuất xứ rõ ràng, chất lượng. Đặt hàng mới bắt đầu rang giữ được hương vị thơm ngon đặc trưng. Đảm bảo chế biến sạch, đạt vệ sịnh an toàn thực phẩm">
    <meta name="keywords" content="Coffee, Quang Vinh - Coffee , Rang xay nguyên chất">
    <meta name="author" content="Quang Vinh - Coffee">
    <meta charset="utf-8">
    <meta name="googlebot" content="noarchive" />
    <meta name="robots" content="noarchive" />
    <meta name="SKYPE-TOOLBAR" content="SKYPE-TOOLBAR-PARSER-COMPATIBLE">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:site_name" content="{{ url()->full() }}" />
    <meta property="og:rich_attachment" content="true" />
    <meta property="og:type" content="article" />
    <meta property="article:publisher" content="https://www.facebook.com/stunited.vn/" />
    <meta property="og:url" itemprop="url" content="{{ url()->full() }}" />
    <meta property="og:image" itemprop="thumbnailUrl" content="{{ asset('images/') }}/logo.png" />
    <meta property="og:image:width" content="800" />
    <meta property="og:image:height" content="500" />
    <meta content="Về chúng tôi | Quang Vinh - Coffee" itemprop="headline" property="og:title" />
    <meta content="Rang xay nguyên chất. Không tẩm ướt, không hóa chất. Nguồn nguyên liệu có xuất xứ rõ ràng, chất lượng. Đặt hàng mới bắt đầu rang giữ được hương vị thơm ngon đặc trưng. Đảm bảo chế biến sạch, đạt vệ sịnh an toàn thực phẩm" itemprop="description" property="og:description" />
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="twitter:title" content="Về chúng tôi | Quang Vinh - Coffee">
    <meta property="twitter:description" content="Rang xay nguyên chất. Không tẩm ướt, không hóa chất. Nguồn nguyên liệu có xuất xứ rõ ràng, chất lượng. Đặt hàng mới bắt đầu rang giữ được hương vị thơm ngon đặc trưng. Đảm bảo chế biến sạch, đạt vệ sịnh an toàn thực phẩm">
    <meta property="twitter:image" content="{{ asset('images/') }}/logo.png">
    @section('mycss')
    <link rel="stylesheet" href="{{ asset('templates/ui/') }}/assets/styles/bootstrap.min.css" />
    @endsection
@endsection
@section('content')
    @include('ui.common.info')
    <section id="banner" class="banner-product" style="background-image: url(../templates/ui/assets/images/shop-title-area.jpg);">
        <div class="container">
            <div class="banner-inner">
                <h2 class="banner-title-product">Về chúng tôi</h2>
            </div>
        </div>
    </section>
    <div class="wrapper">
        <section class="section-news">
            <div class="news_body">
                <p><strong>Bối cảnh thị trường</strong></p>
                <p>Bộ Thương mại Mỹ ra quyết định rút ngắn thời hạn miễn thuế đối với nhiều mặt hàng nhập khẩu từ
                    Trung Quốc đến cuối năm 2020 thay vì đến hết năm 2021 như đã định.</p>
                <p>Hồi tháng 01/2020, hai bên “tham chiến” thương mại đã ký thỏa thuận giai đoạn 1 theo đó Trung
                    Quốc cam kết mua thêm lượng hàng hóa trị giá 200 tỷ Usd từ Mỹ trong 2 năm kể từ ngày ký, trong
                    đó có 32 tỷ Usd thịt bò, đậu tương và hải sản, 52,4 tỷ Usd các mặt hàng năng lượng, 37,9 tỷ Usd
                    hàng hóa dịch vụ và 77,7 tỷ Usd hàng công nghiệp. Nhưng đến nay, kết quả không như mong đợi.</p>
                <p>Ngay sau quyết định, thị trường chứng kiến một đợt bán tháo cổ phiếu trên các sàn giao dịch
                    Âu-Mỹ, giá vàng lên quanh mức 1.978 Usd/ounce rồi chạy xuống dưới 1.940 Usd/ounce, giá dầu thô
                    WTI và Brent cùng giảm về quanh mức 39,50 và 42,34 Usd/thùng phiên cuối tuần. Giá cổ phiếu Mỹ bỏ
                    đỉnh cao kỷ lục để đóng cửa cả tuần giảm như S&amp;P 500 giảm 2,31% sau 5 tuần tăng liên tiếp,
                    Dow Jones giảm 1,82% và Nasdaq giảm 3,27%.</p>
                <p>Chỉ số giá trị đồng Usd (DXY) sau khi giảm mạnh xuống mức sâu nhất tính từ hơn hai năm tại 92,13
                    điểm, quay lại mức 92,80 điểm phiên cuối tuần.</p>
                <p><strong>Vài nét nổi bật về tình hình cung-cầu trong tuần</strong></p>
                <p><strong>-Xuất khẩu cà phê toàn cầu</strong></p>
                <p>Tổ chức Cà phê Thế giới (ICO) cho biết xuất khẩu cà phê toàn cầu tháng 07/2020 ước giảm 11% so
                    với cùng kỳ 2019 chỉ đạt 10,61 triệu bao (bao=60 kgs). Giải thích về tình trạng sụt giảm này,
                    ICO cho rằng do dịch bệnh Covid-19, chế độ giãn cách xã hội tại các nước xuất khẩu làm ảnh hưởng
                    đến dây chuyền cung ứng cà phê thế giới. Tại các nước tiêu thụ, các kho hàng và hàng quán giảm
                    hoạt động cũng làm nhỏ con số xuất khẩu hơn bình thường. Như vậy, theo ICO, xuất khẩu cà phê
                    toàn cầu 10 tháng đầu niên vụ 2019-2020 chỉ đạt 106,59 triệu bao, giảm 5,30% so với cùng kỳ năm
                    trước.</p>
                <p>Xuất khẩu giảm, tồn kho các nước sản xuất không xuất lên tàu được, nên ICO đã chỉnh lại cán cân
                    cung-cầu cà phê thế giới cho niên vụ 2019-2020 sẽ kết thúc vào 30/09/2020 là thừa 952.000 bao
                    thay vì thiếu 486.000 bao như đã được ICO dự báo trước đó.</p>
                <p><strong>-Xuất khẩu cà phê Indonesia</strong></p>
                <p>Chính phủ Indonesia báo xuất khẩu cà phê tháng 08/2020 của nước này chỉ đạt 410.076 bao, giảm
                    8,48%. Tuy nhiên, tính theo niên vụ kết thúc vào cuối tháng này, xuất khẩu 11 tháng đầu niên vụ
                    2019-2020 của Indonesia tăng 17,71% đạt 2.725.341 bao.</p>
                <p><strong>-Xuất khẩu cà phê hòa tan 01/2019-06/2020 (quy ra bao=60 kgs cà phê nhân)</strong></p>
                <p>Giữa dịch bệnh Covid-19, người tiêu thụ cà phê tại nhiều nước không ra khỏi nhà, nên tiêu thụ cà
                    phê hòa tan tăng lên. Khối lượng cà phê hòa tan được quy theo cà phê nhân thành bao 60 kgs trong
                    nửa năm đầu 2020 như sau: Brazil 2,94 triệu, Ấn Độ 1,36 triệu, Indonesia 1,23 triệu, Việt Nam
                    1,09 triệu, Mexico 0,67 triệu và Colombia 0,63 triệu bao.</p>
                <p><strong>-Tồn kho cà phê đạt chuẩn 2 sàn cà phê</strong></p>
                <p>Tính đến 03/09/2020, tồn kho cà phê đạt chuẩn arabica thuộc sàn New York là 71.545 tấn. Tồn kho
                    đạt chuẩn robusta thuộc sàn London là 109.770, tăng 690 tấn so với ghi nhận của tuần trước là
                    109.080 tấn (1).</p>
                <p><strong>-Thu hoạch cà phê 2020-2021 của Brazil</strong></p>
                <p>Đến nay, công tác thu hái cà phê niên vụ mới của Brazil đã hoàn tất. Safras&amp;Mercado ước sản
                    lượng cà phê Brazil năm nay đạt 68 triệu bao, trong đó có 20 triệu bao robusta. Mùa giá rét tại
                    vùng trồng cà phê Brazil đã qua. Nhưng giả sử bất ngờ có sương muối, sản lượng cà phê năm nay
                    cũng chẳng ảnh hưởng gì.</p>
                <p><strong>Giá cả (xem hình 1)</strong></p>
                <p>Dòng vốn phần nào chảy về hai sàn cà phê vào giúp giá sàn robusta London có giá tăng tuần thứ năm
                    liên tiếp.</p>
                <p>Cấu trúc giá trên cả hai sàn cà phê vẫn còn tồn tại hiện tượng đảo nghịch (backwardation) hay
                    “vắt giá” tạo thêm sức mua tốt trên hai sàn. Giá tháng 09 của các sàn này đều cao hơn tháng giao
                    dịch chính.</p>
                <p>Kết quả chung cuộc cả tuần, giá cà phê hai sàn kết thúc ngày 04/09/2020 như sau:</p>
                <p>-Sàn London cả tuần tăng 15 Usd đóng cửa tại 1.444 Usd/tấn với biên độ cao/thấp nhất là
                    1.471/1.404. Đấy cũng là mức cao nhất tính từ hơn một năm rưỡi nay.</p>
                <p>-Sàn New York chốt tại 134.00 cts/lb tăng 6.55 cts/lb hay 169 Usd/tấn trong biên độ rộng
                    135.45/121.55 cts/lb.</p>
                <div>
                    <figure class="image"><img src="http://file.ncif.gov.vn/Media/newsimage/20200907115047/Cf2.jpg"
                            alt="" width="600" height="307">
                        <figcaption><em>Hình 2 (nguồn: feedin.me)</em></figcaption>
                    </figure>
                </div>
                <p>Giá arabica tăng mạnh tạo cho giá cách biệt giữa hai sàn giãn ra, robusta rẻ và hấp dẫn người mua
                    hơn. Chỉ trong vòng một tuần, giá cách biệt giữa arabica với robusta tăng 6,94 cts/lb đạt 68,49
                    cts/lb, quy ra Usd/tấn tăng 153 Usd/tấn đạt 1.510 Usd/tấn. Có nghĩa là giá 1 tấn cà phê robusta
                    rẻ hơn arabica 153 Usd so với tuần trước.</p>
                <p>Giá cà phê loại 2 tối đa 5% đen vỡ trong nước từ hai tuần nay có khuynh hướng tăng dần. Tại nhiều
                    nơi ở Tây Nguyên, giá bán cao nhất lên đến 34 triệu đồng/tấn nhưng bình quân chung chỉ đạt 33,7
                    triệu đồng/tấn (hình 2).</p>
                <p>Giá cà phê xuất khẩu không đổi, quanh mức +90 Usd/tấn.</p>
                <p><strong>Phân tích kỹ thuật về giá cà phê robusta cho tuần từ 07-11/09/2020: Hướng tăng còn nhưng
                        sao vẫn ngập ngừng?</strong></p>
                <p>Cấu trúc vắt giá còn hiện hữu giúp rất nhiều cho sàn London tăng tuần qua. Tuy nhiên, độ giãn
                    giữa tháng 09 với 11/2020 về cuối tuần đang co lại dần, từ 96 xuống 90 rồi nay là 88 Usd/tấn.
                </p>
                <div>
                    <figure class="image"><img src="http://file.ncif.gov.vn/Media/newsimage/20200907114905/Cf3.png"
                            alt="" width="600" height="433">
                        <figcaption><em>Hình 3 (nguồn: Phan Trọng Anh)</em></figcaption>
                    </figure>
                </div>
                <p>Điều đáng nghi đối với hướng giá là phiên 04/09/2020 London không chạm được đỉnh cũ 1.471 mà chỉ
                    dừng tại 1.469, trong khi đỉnh từ 4 ngày gần đây giảm dần, đáy cũng sâu dần. Cần tiên lượng rằng
                    giá London có thể xảy ra một đợt chỉnh xuống trước khi muốn tạo đỉnh mới.</p>
                <p>Đồ thị của nhà phân tích độc lập Phan Trọng Anh cho thấy hình như có một sự lặp lại khi nhìn vào
                    2 khối hình chữ nhật (hình 3). Giai đoạn cuối năm 2019, đã từng xảy ra hiện tượng đảo chiều thì
                    trong những ngày vừa qua cũng có dấu hiệu ấy. Đặc biệt chỉ báo RSI thể hiện ở cả 2 khối là trong
                    lúc giá tăng thì RSI giảm.</p>
                <p>Hướng tăng nhìn theo phương pháp Fibonacci, nếu lấy tỷ lệ 100% tại 1.286, giá tuần qua đã thỏa
                    238,2% tại 1.470. Các kỳ vọng lên giá tiếp theo nằm tại 1.486 và 1.501 của 250,0% và 261,8%.</p>
                <p>Từ mức đóng cửa hiện nay là 1.444, khả năng lấy lại khu vực 1.470 có thể dễ dàng nếu như vượt
                    được vùng 1.455 (227,2%).</p>
                <p>Các ngoại lực giúp giá London tăng có lẽ phải nhờ một đồng Usd rẻ tức chỉ số giá trị Usd (DXY)
                    giảm hay sức hút cực mạnh từ nhu cầu giao hàng lên sàn một cách thực sự.</p>
                <p><strong>Tác động đến thị trường cà phê trong nước: Tại sao giá sàn London và giá cà phê trong
                        nước ngược chiều?.</strong></p>
                <p>Sàn London đang nóng lòng chờ hàng giao vào kho. Điều này được phản ánh rõ nét trên cấu trúc giá
                    của các kỳ hạn gần nhất của sàn này. Trong một hoàn cảnh bình thường, giá kỳ hạn sau thường cao
                    hơn tháng trước chừng từ 20-30 Usd/tấn. Tiền chênh lệch ấy được hiểu là để bù cho chi phí tồn
                    kho và tài chính. Nhưng nay, mức chênh lệch ấy không còn, thậm chí giá tháng 09/2020 cao hơn cả.
                    Cấu trúc này nói lên rằng càng giao vào kho sớm càng được hưởng giá cao.</p>
                <div>
                    <figure class="image"><img src="http://file.ncif.gov.vn/Media/newsimage/20200907114950/Cf4.png"
                            alt="" width="300" height="239">
                        <figcaption><em>Hình 4</em></figcaption>
                    </figure>
                </div>
                <p>Dựa trên giá đóng cửa thực tế của sàn robusta London, ta thấy tháng giao ngay cao hơn tháng giao
                    dịch chính 88 Usd/tấn và các tháng sau chỉ cao hơn kỳ hạn trước từ 10-12 Usd/tấn. Rõ ràng do nhu
                    cầu cần hàng, các mức chênh lệch giữa các tháng đã khép lại.</p>
                <p>Trên sàn New York cũng vậy, ba tháng gần nhất là 09, 12/2020 và 03/2021 là 134.80/134.00 và
                    134.55 cts/lb, mức chênh lệch không nhiều, trước đây thường là từ 2-3 cts/lb. Cho nên áp lực mua
                    trên cả 2 sàn thời gian qua giúp giá cà phê phái sinh tăng tốt.</p>
                <p>Tuy nhiên, cho đến nay, sàn robusta London chưa báo có bất kỳ một lô nào (lô=10 tấn) từ Việt Nam
                    sang. Lượng 69 lô cà phê đạt chuẩn sàn này nhập kho chủ yếu từ Brazil.</p>
                <p>Hàng cà phê đạt chuẩn sàn London của Việt Nam chưa đến được có thể do giá của sàn thời gian này
                    chưa phù hợp do giá chào xuất khẩu còn cao, mặt khác hải trình từ Việt Nam đến châu Âu xa và giá
                    cước vận tải cao.</p>
                <p>Tuần qua, có lúc giá cà phê nội địa vượt khỏi mức 34,5 triệu đồng/tấn. Người mua vẫn cho đó là
                    cao và chưa thể mua để đưa hàng qua sàn London. Đó cũng là lý do giá London tăng nhưng thị
                    trường cà phê nội địa vẫn bình lặng.</p>
                <p>Như vậy, có thể nói mua vì nhu cầu đưa hàng vào kho thuộc sàn London hiện nay là bất khả thi. Vả
                    lại, người bán vẫn còn nuôi tâm lý giá còn lên trong khi lượng cà phê tồn kho đã cạn do cuối
                    mùa. Giá cà phê nội địa tuần này vẫn còn kỳ vọng 34,5 triệu đồng/tấn, nhưng trong tình hình này,
                    nếu như giá phái sinh lên khỏi mức tâm lý quan trọng 1.500 Usd/tấn mới đạt được giá ấy. Ngược
                    lại, nếu giá xuống lại 1.400 Usd/tấn, cà phê trong nước khó rớt xuống dưới 33 triệu đồng/tấn.
                </p>
            </div>
        </section>
    </div>
    <button class="back-to-top">
        <i class="fal fa-long-arrow-right"></i>
    </button>
@endsection
