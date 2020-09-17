<footer>
    <div class="wrapper">
       <div class="footer">
          <div class="footer__item">
             <h4 class="footer__title">GIỜ MỞ CỬA</h4>
             <div class="working-hours">
                <p>
                   <label>THỨ 2 - CHỦ NHẬT</label>
                   <span class="line"></span>
                   <label> 7:00 - 23:00 </label>
                </p>
                <p>
                  <label>NGÀY NGHỈ LỄ</label>
                  <span class="line"></span>
                  <label> 7:00 - 23:00 </label>
               </p>
             </div>
          </div>
          <div class="footer__item">
             <h4 class="footer__title">BÀI VIẾT GẦN ĐÂY</h4>
             <ul class="recent-post">
                @foreach($dataNewsRandom as $value)
                <li>
                   <a href="{{ route('ui.detail.index_news', getUrl($value['name'], $value['id'])) }}" class="recent-post__title text-uppercase">{{ $value['name'] }}</a>
                   <p class="recent-post__time">{{ $value['created_at']->format('d-m-Y')}}</p>
                </li>
                @endforeach
             </ul>
          </div>
          <div class="footer__item">
             <h4 class="footer__title">LIÊN HỆ</h4>
             <p class="contact-us">
                <span>0898.987.567 (Zalo)</span>
             </p>
          </div>
          <div class="footer__item">
             <h4 class="footer__title">ĐỊA CHỈ</h4>
             <div class="other-location border-bottom">
                <p>250 Trần Phú, P.Lộc Sơn, Thành Phố Bảo Lộc, Tỉnh Lâm Đồng</p>
             </div>
             <div class="other-location">
                <h5 class="footer__title footer__title--small">MẠNG XÃ HỘI</h5>
                <p class="social">
                   <a href="https://www.facebook.com/quangvinh.coffee/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                   <a href="https://shopee.vn/quangvinh.cofee" target="_blank"><i class="fas fa-shopping-cart"></i></a>
                </p>
             </div>
          </div>
       </div>
    </div>
 </footer>