<?php

use Illuminate\Database\Seeder;
use App\Post_tran;

class Post_tranTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post_tran = new Post_tran();
        $post_tran->name = 'Tin tức về sản phẩm mới';
        $post_tran->locale = 'vi';
        $post_tran->title = 'Wi-Fi vẫn ổn tại các điểm trên toàn quốc như quán cà phê và nhà ga!';
        $post_tran->content = 'Hỗ trợ tuần tự theo chuẩn IEEE802.11ac (Wi-Fi siêu tốc) từ các điểm như quán cà phê! Ngoài điện thoại thông minh au, au Wi-Fi SPOT cũng có thể được sử dụng với các thiết bị tương thích Wi-Fi như máy tính xách tay. --------- Đối với giai đoạn Bạch kim, phí tốc độ phẳng dữ liệu toàn cầu (đặt trước) hoàn lại tiền Chỉ các thiết bị tương thích Wi-Fi như máy tính xách tay cho thuê bao au Wi-Fi tại các điểm trên toàn quốc Là một dịch vụ có thể được sử dụng. Không có ứng dụng đặc biệt cần thiết, chỉ cần một trình duyệt web. -Thông thường, tôi muốn đi mua sắm với bạn bè chỉ riêng hôm nay. Trong trường hợp như vậy, dữ liệu thế giới phẳng được khuyến nghị. Chỉ cần nhấn "Bắt đầu sử dụng" khi bạn muốn sử dụng nó và chỉ sử dụng điện thoại thông minh thông thường của bạn giống như ở Nhật Bản. Bạn cũng có thể sử dụng LINE để liên lạc với bạn bè để bạn có thể hành động một mình một cách an toàn. Đối với những khách hàng trả tiền cho dịch vụ này, sẽ không có phí sử dụng cho tháng đăng ký đầu tiên, nhưng nếu một thành viên đã bị từ chức được đăng ký lại, phí sử dụng sẽ được tính từ tháng đăng ký lại. Ngay cả khi bạn nhập lại vào giữa tháng, chúng tôi sẽ không tính phí sử dụng hàng tháng được chia theo tỷ lệ. Nếu bạn không hủy vào cuối tháng của tháng đăng ký đầu tiên, từ tháng tiếp theo trở đi, phí sử dụng cho tháng hiện tại sẽ được xác định từ dịch vụ phí hợp đồng au vào đầu tháng. Ngay cả khi dịch vụ phí hợp đồng au được thay đổi vào giữa tháng, phí sử dụng cho tháng hiện tại sẽ phải chịu ngay cả khi phí sử dụng cho dịch vụ này trở nên miễn phí. Ngay cả khi ngày rút tiền vào giữa tháng, phí sử dụng hàng tháng sẽ không được tính theo tỷ lệ, nhưng dịch vụ này sẽ có sẵn cho đến hết tháng rút tiền. * Đối với những khách hàng sẽ được miễn phí dịch vụ này vào hợp đồng vào giữa tháng Ngay cả khi phí sử dụng dịch vụ này được tính do thay đổi dịch vụ giá, hãy sử dụng dịch vụ này cho đến cuối tháng với phí sử dụng cho tháng hiện tại là miễn phí Có, nhưng nó sẽ tự động bị hủy sau tháng tiếp theo. Nếu bạn muốn tiếp tục, xin vui lòng đăng ký lại.';
        $post_tran->post_id = 1;
        $post_tran->save();


        $post_tran = new Post_tran();
        $post_tran->name = '新製品に関するニュース';
        $post_tran->title = 'カフェや駅など、全国のスポットでWi-FiがOK！';
        $post_tran->locale = 'jp';
        $post_tran->content = 'カフェ等のスポットからIEEE802.11ac（超速Wi-Fi）に順次対応！ また、auスマホに加えお手持ちのノートパソコン等Wi-Fi対応機器でもau Wi-Fi SPOTをご利用いただけます。 --------- プラチナステージだと世界データ定額利用料（事前予約分）全額キャッシュバック auご契約者様限定でノートパソコン等Wi-Fi対応機器にて全国のスポットのWi-Fiがご利用いただけるサ ービスです。専用アプリ不要、Webブラウザだけでご利用いただけます。 -- たまには友達と別行動 今日だけは友達と別行動して一人でショッピングへ行きたい。そんな時にも世界データ定額がおすすめ。 使いたい時に「利用開始」を押して、いつものスマホを日本と同じように使うだけ。 友達との連絡にLINEを使うこともできるので、一人行動もこれで安心。 本サービスが有料となるお客様へ 初回加入月のご利用料金は発生しませんが、一度退会された方 が再入会された場合再入会月からご利用料金が発生します。月途中の再入会であっても月額利用料の日割り計算は致しません。 初回加入月の月末までに退会されなかった場合、次月以降は月初時点でのauご契約料金サービスから当月分のご利用料金を判定します。月途中のauご契約料金サービスの変更により、本サービ スのご利用料金が無料となっても当月分のご利用料金は発生します。 退会日が月の途中であっても月額利用料の日割り計算は致しませんが、本サービスは退会月の月末までご利用いただけます。 ※ 本サービスが無料となるお客様へ 月途中のau ご契約 料金サービスの変更により、本サービスのご利用料金が有料となっても当月分のご利用料金は無料のまま月末まで本サービスをご利用いただけますが、次月以降は自動解約となりご利用いただけません。継続してご利用希望の方は再入会をお願いします。';
        $post_tran->post_id = 1;
        $post_tran->save();


    }
}
