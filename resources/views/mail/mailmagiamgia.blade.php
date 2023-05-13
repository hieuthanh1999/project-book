<div>
    <p>
    <h2><b>Cám ơn bạn {{ $data['name'] }} đã mua hàng</b></h2>
    </p>
    <p>Chúng tôi gửi cho bạn mã giảm giá: <i> {{ $data['coupon_code'] }} </i> có giá trị
        đến {{ $data['coupon_expiry'] }} giảm 
        @if ($data['coupon_status'] == 1)
            {{$data['coupon_values']}} %
        @elseif($data['coupon_status'] == 2)
            {{number_format($data['coupon_values'])}} VNĐ
        @endif
                                                áp dụng cho đơn hàng tiếp theo :) </p>
        <table cellpadding="0" cellspacing="0" class="sc-gPEVay eQYmiW"
        style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: &quot;Courier New&quot;; min-width: 450px;">
        <tbody>
            <tr style="text-align: center;">
                <td>
                    <h3 color="#000000" class="sc-fBuWsC eeihxG"
                        style="margin: 0px; font-size: 18px; color: rgb(0, 0, 0);">
                        <span>Admin </span><span>&nbsp;</span><span>Pages</span></h3>
                    <p color="#000000" font-size="medium" class="sc-fMiknA bxZCMx"
                        style="margin: 0px; color: rgb(0, 0, 0); font-size: 14px; line-height: 22px;"><span>Quản
                            Lý</span></p>
                    <p color="#000000" font-size="medium" class="sc-dVhcbM fghLuF"
                        style="margin: 0px; font-weight: 500; color: rgb(0, 0, 0); font-size: 14px; line-height: 22px;">
                        <span>WebSite</span><span>&nbsp;|&nbsp;</span><span>Sách</span></p>
                </td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="0" cellspacing="0" class="sc-gPEVay eQYmiW"
                        style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: &quot;Courier New&quot;; width: 100%;">
                        <tbody>
                            <tr>
                                <td height="30"></td>
                            </tr>
                            <tr>
                                <td color="#f2547d" direction="horizontal" height="1" class="sc-jhAzac hmXDXQ"
                                    style="width: 100%; border-bottom: 1px solid rgb(242, 84, 125); border-left: none; display: block;">
                                </td>
                            </tr>
                            <tr>
                                <td height="30"></td>
                            </tr>
                        </tbody>
                    </table>
                    <table cellpadding="0" cellspacing="0" class="sc-gPEVay eQYmiW"
                        style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: &quot;Courier New&quot;; width: 100%;">
                        <tbody>
                            <tr style="vertical-align: middle;">
                                <td>
                                    <table cellpadding="0" cellspacing="0" class="sc-gPEVay eQYmiW"
                                        style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: &quot;Courier New&quot;;">
                                        <tbody>
                                            <tr height="25" style="vertical-align: middle;">
                                                <td width="30" style="vertical-align: middle;">
                                                    <table cellpadding="0" cellspacing="0" class="sc-gPEVay eQYmiW"
                                                        style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: &quot;Courier New&quot;;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="vertical-align: bottom;"><span
                                                                        color="#f2547d" width="11"
                                                                        class="sc-jlyJG bbyJzT"
                                                                        style="display: block; background-color: rgb(242, 84, 125);"><img
                                                                            src="https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/phone-icon-2x.png"
                                                                            color="#f2547d" width="13"
                                                                            class="sc-iRbamj blSEcj"
                                                                            style="display: block; background-color: rgb(242, 84, 125);"></span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="padding: 0px; color: rgb(0, 0, 0);"><a href="tel:0289912134"
                                                        color="#000000" class="sc-gipzik iyhjGb"
                                                        style="text-decoration: none; color: rgb(0, 0, 0); font-size: 12px;"><span>0355668062</span></a>
                                                    | 
                                                </td>
                                            </tr>
                                            <tr height="25" style="vertical-align: middle;">
                                                <td width="30" style="vertical-align: middle;">
                                                    <table cellpadding="0" cellspacing="0" class="sc-gPEVay eQYmiW"
                                                        style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: &quot;Courier New&quot;;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="vertical-align: bottom;"><span
                                                                        color="#f2547d" width="11"
                                                                        class="sc-jlyJG bbyJzT"
                                                                        style="display: block; background-color: rgb(242, 84, 125);"><img
                                                                            src="https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/email-icon-2x.png"
                                                                            color="#f2547d" width="13"
                                                                            class="sc-iRbamj blSEcj"
                                                                            style="display: block; background-color: rgb(242, 84, 125);"></span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="padding: 0px;"><a href="mailto:kieunga406365@gmail.com"
                                                        color="#000000" class="sc-gipzik iyhjGb"
                                                        style="text-decoration: none; color: rgb(0, 0, 0); font-size: 12px;"><span>n.hieuthanhps@gmail.com
                                                        </span></a>
                                                </td>
                                            </tr>
                                            <tr height="25" style="vertical-align: middle;">
                                                <td width="30" style="vertical-align: middle;">
                                                    <table cellpadding="0" cellspacing="0" class="sc-gPEVay eQYmiW"
                                                        style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: &quot;Courier New&quot;;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="vertical-align: bottom;"><span
                                                                        color="#f2547d" width="11"
                                                                        class="sc-jlyJG bbyJzT"
                                                                        style="display: block; background-color: rgb(242, 84, 125);"><img
                                                                            src="https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/address-icon-2x.png"
                                                                            color="#f2547d" width="13"
                                                                            class="sc-iRbamj blSEcj"
                                                                            style="display: block; background-color: rgb(242, 84, 125);"></span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="padding: 0px;"><span color="#000000"
                                                        class="sc-csuQGl CQhxV"
                                                        style="font-size: 12px; color: rgb(0, 0, 0);"><span>Bắc Từ Liêm, Hà Nội</span></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table cellpadding="0" cellspacing="0" class="sc-gPEVay eQYmiW"
                        style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: &quot;Courier New&quot;; width: 100%;">
                        <tbody>
                            <tr>
                                <td height="30"></td>
                            </tr>
                            <tr>
                                <td color="#f2547d" direction="horizontal" height="1" class="sc-jhAzac hmXDXQ"
                                    style="width: 100%; border-bottom: 1px solid rgb(242, 84, 125); border-left: none; display: block;">
                                </td>
                            </tr>
                            <tr>
                                <td height="30"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;"></td>
            </tr>
        </tbody>
    </table>
</div>
