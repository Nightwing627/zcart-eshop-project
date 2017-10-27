<?php

use Illuminate\Database\Seeder;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('email_templates')->insert([
            [
                'name' => 'Welcome Merchant',
                'type' => 'HTML',
                'position' => 'Footer',
                'sender_email' => 'support@domain.com',
                'sender_name' => Null,
                'subject' => 'Welcome to {platform_name}',
                'body' => '<table class="m_886163020439323843footer" width="700" height="165" bgcolor="#efefef" align="center" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td valign="bottom" style="color:#999;line-height:18px;font-size:11px;font-family:arial">Site Access: <a href="http://d.incevio.com/http://www.incevio.com/?tracelog=rowan&amp;rowan_id1=sellerLeaveFeedbackToBuyer_en_US_2017-10-22&amp;rowan_msg_id=c063bc521feb4649a25121ff130ac482&amp;ck=in_edm_other" style="color:#999;text-decoration:underline;font-size:11px;font-family:arial" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://d.incevio.com/http://www.incevio.com/?tracelog%3Drowan%26rowan_id1%3DsellerLeaveFeedbackToBuyer_en_US_2017-10-22%26rowan_msg_id%3Dc063bc521feb4649a25121ff130ac482%26ck%3Din_edm_other&amp;source=gmail&amp;ust=1508835770795000&amp;usg=AFQjCNFswRI--_oSylG_TCSI9jMZfEgJFw">Homepage</a> <span style="color:#999">|</span> <a href="http://d.incevio.com/http://trade.incevio.com?tracelog=rowan&amp;rowan_id1=sellerLeaveFeedbackToBuyer_en_US_2017-10-22&amp;rowan_msg_id=c063bc521feb4649a25121ff130ac482&amp;ck=in_edm_other" style="color:#999;text-decoration:underline;font-size:11px;font-family:arial" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://d.incevio.com/http://trade.incevio.com?tracelog%3Drowan%26rowan_id1%3DsellerLeaveFeedbackToBuyer_en_US_2017-10-22%26rowan_msg_id%3Dc063bc521feb4649a25121ff130ac482%26ck%3Din_edm_other&amp;source=gmail&amp;ust=1508835770795000&amp;usg=AFQjCNHs5u0lVvXx_IxyFnkfBFEuVdacig">My Orders</a> <span style="color:#999">|</span> <a href="http://d.incevio.com/http://www.incevio.com/buyerprotection/index.html?tracelog=rowan&amp;rowan_id1=sellerLeaveFeedbackToBuyer_en_US_2017-10-22&amp;rowan_msg_id=c063bc521feb4649a25121ff130ac482&amp;ck=in_edm_other" style="color:#999;text-decoration:underline;font-size:11px;font-family:arial" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://d.incevio.com/http://www.incevio.com/buyerprotection/index.html?tracelog%3Drowan%26rowan_id1%3DsellerLeaveFeedbackToBuyer_en_US_2017-10-22%26rowan_msg_id%3Dc063bc521feb4649a25121ff130ac482%26ck%3Din_edm_other&amp;source=gmail&amp;ust=1508835770795000&amp;usg=AFQjCNFgBGjO2cWQlMNn3ok1sdo9FEI0PQ">Buyer Protection</a> <span style="color:#999">|</span> <a href="http://help.incevio.com/?tracelog=rowan&amp;rowan_id1=sellerLeaveFeedbackToBuyer_en_US_2017-10-22&amp;rowan_msg_id=c063bc521feb4649a25121ff130ac482&amp;ck=in_edm_other" style="color:#999;text-decoration:underline;font-size:11px;font-family:arial" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://help.incevio.com/?tracelog%3Drowan%26rowan_id1%3DsellerLeaveFeedbackToBuyer_en_US_2017-10-22%26rowan_msg_id%3Dc063bc521feb4649a25121ff130ac482%26ck%3Din_edm_other&amp;source=gmail&amp;ust=1508835770795000&amp;usg=AFQjCNEY6uWlpV61xJ2EWu_OnR1ImK1k8A">Help Center</a> <span style="color:#999">|</span> <a href="http://www.incevio.com/help/home.html#contact?tracelog=rowan&amp;rowan_id1=sellerLeaveFeedbackToBuyer_en_US_2017-10-22&amp;rowan_msg_id=c063bc521feb4649a25121ff130ac482&amp;ck=in_edm_other" style="color:#999;text-decoration:underline;font-size:11px;font-family:arial" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://www.incevio.com/help/home.html%23contact?tracelog%3Drowan%26rowan_id1%3DsellerLeaveFeedbackToBuyer_en_US_2017-10-22%26rowan_msg_id%3Dc063bc521feb4649a25121ff130ac482%26ck%3Din_edm_other&amp;source=gmail&amp;ust=1508835770795000&amp;usg=AFQjCNFrHNdxDedZiwv6L-zLA4_5jthBKw">Contact Us</a><br><a href="http://us.my.incevio.com/user/company/forget_password_input_email.htm?edm_src=wto&amp;edm_type=ifm&amp;edm_cta=footer&amp;tracelog=rowan&amp;rowan_id1=sellerLeaveFeedbackToBuyer_en_US_2017-10-22&amp;rowan_msg_id=c063bc521feb4649a25121ff130ac482&amp;ck=in_edm_other" style="color:#999;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://us.my.incevio.com/user/company/forget_password_input_email.htm?edm_src%3Dwto%26edm_type%3Difm%26edm_cta%3Dfooter%26tracelog%3Drowan%26rowan_id1%3DsellerLeaveFeedbackToBuyer_en_US_2017-10-22%26rowan_msg_id%3Dc063bc521feb4649a25121ff130ac482%26ck%3Din_edm_other&amp;source=gmail&amp;ust=1508835770795000&amp;usg=AFQjCNGl36Hq7gk2E4ZfaHgnp8lgblu0Hw">Forgot your password?</a> <br>This email was sent to <a href="http://d.incevio.com/mailto:?tracelog=rowan&amp;rowan_id1=sellerLeaveFeedbackToBuyer_en_US_2017-10-22&amp;rowan_msg_id=c063bc521feb4649a25121ff130ac482&amp;ck=in_edm_other" style="color:#999;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://d.incevio.com/mailto:?tracelog%3Drowan%26rowan_id1%3DsellerLeaveFeedbackToBuyer_en_US_2017-10-22%26rowan_msg_id%3Dc063bc521feb4649a25121ff130ac482%26ck%3Din_edm_other&amp;source=gmail&amp;ust=1508835770795000&amp;usg=AFQjCNF57ZGzDDxPVbiErICMxd6_6wJH0Q"></a>. <br>You are receiving this email because you are a registered member of <a href="http://d.incevio.com/http://www.incevio.com?tracelog=rowan&amp;rowan_id1=sellerLeaveFeedbackToBuyer_en_US_2017-10-22&amp;rowan_msg_id=c063bc521feb4649a25121ff130ac482&amp;ck=in_edm_other" style="color:#999;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://d.incevio.com/http://www.incevio.com?tracelog%3Drowan%26rowan_id1%3DsellerLeaveFeedbackToBuyer_en_US_2017-10-22%26rowan_msg_id%3Dc063bc521feb4649a25121ff130ac482%26ck%3Din_edm_other&amp;source=gmail&amp;ust=1508835770795000&amp;usg=AFQjCNEV-vw0uLnpfTBy2KjLmMrSWfquEA">www.<span class="il">incevio</span>.com</a>, powered by incevio.com. <br>Read our <a href="http://www.incevio.com/help/safety_security/policies_rules/others/001.html?tracelog=rowan&amp;rowan_id1=sellerLeaveFeedbackToBuyer_en_US_2017-10-22&amp;rowan_msg_id=c063bc521feb4649a25121ff130ac482&amp;ck=in_edm_other" style="color:#999;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://www.incevio.com/help/safety_security/policies_rules/others/001.html?tracelog%3Drowan%26rowan_id1%3DsellerLeaveFeedbackToBuyer_en_US_2017-10-22%26rowan_msg_id%3Dc063bc521feb4649a25121ff130ac482%26ck%3Din_edm_other&amp;source=gmail&amp;ust=1508835770795000&amp;usg=AFQjCNHhvncoIuRqRpPKKTgyRYpiV6Z5vg">Privacy Policy</a> and <a href="http://www.incevio.com/help/safety_security/policies_rules/others/002.html?tracelog=rowan&amp;rowan_id1=sellerLeaveFeedbackToBuyer_en_US_2017-10-22&amp;rowan_msg_id=c063bc521feb4649a25121ff130ac482&amp;ck=in_edm_other" style="color:#999;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://www.incevio.com/help/safety_security/policies_rules/others/002.html?tracelog%3Drowan%26rowan_id1%3DsellerLeaveFeedbackToBuyer_en_US_2017-10-22%26rowan_msg_id%3Dc063bc521feb4649a25121ff130ac482%26ck%3Din_edm_other&amp;source=gmail&amp;ust=1508835770795000&amp;usg=AFQjCNGdCuw2_Z7MHkHP5eKVE0mPoK_ysA">Terms of Use</a> if you have any questions. <br><span class="il">incevio</span> Service Center: <a href="http://d.incevio.com/mailto:buyer@incevio.com?tracelog=rowan&amp;rowan_id1=sellerLeaveFeedbackToBuyer_en_US_2017-10-22&amp;rowan_msg_id=c063bc521feb4649a25121ff130ac482&amp;ck=in_edm_other" style="color:#999;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://d.incevio.com/mailto:buyer@incevio.com?tracelog%3Drowan%26rowan_id1%3DsellerLeaveFeedbackToBuyer_en_US_2017-10-22%26rowan_msg_id%3Dc063bc521feb4649a25121ff130ac482%26ck%3Din_edm_other&amp;source=gmail&amp;ust=1508835770795000&amp;usg=AFQjCNEZo5gjjdfsNWKIaeuOQoM6rxxuNQ">buyer@<span class="il">incevio</span>.com</a> <br>incevio.com Hong Kong Limited, 26/F Tower One, Times Square1 Matheson Street Causeway Bay, Hong Kong.</td></tr><tr><td height="20">&nbsp;</td></tr></tbody></table>',
                'template_for' => 'Platform'
            ],[
                'name' => 'Welcome Merchant',
                'type' => 'HTML',
                'position' => 'Content',
                'sender_email' => 'support@domain.com',
                'sender_name' => Null,
                'subject' => 'Welcome to {platform_name}',
                'body' => 'Welcome to {platform_name}',
                'template_for' => 'Platform'
            ],[
                'name' => 'Welcome User',
                'type' => 'HTML',
                'position' => 'Content',
                'sender_email' => 'support@domain.com',
                'sender_name' => Null,
                'subject' => 'Welcome to {shop_name}',
                'body' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                  <meta name="viewport" content="width=device-width" />
                  <title>Airmail Welcome</title>
                  <style type="text/css">

                  * {
                    margin:0;
                    padding:0;
                    font-family: Helvetica, Arial, sans-serif;
                  }

                  img {
                    max-width: 100%;
                    outline: none;
                    text-decoration: none;
                    -ms-interpolation-mode: bicubic;
                  }

                  .image-fix {
                    display:block;
                  }

                  .collapse {
                    margin:0;
                    padding:0;
                  }

                  body {
                    -webkit-font-smoothing:antialiased;
                    -webkit-text-size-adjust:none;
                    width: 100%!important;
                    height: 100%;
                    text-align: center;
                    color: #747474;
                    background-color: #ffffff;
                  }

                  h1,h2,h3,h4,h5,h6 {
                    font-family: Helvetica, Arial, sans-serif;
                    line-height: 1.1;
                  }

                  h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
                    font-size: 60%;
                    line-height: 0;
                    text-transform: none;
                  }

                  h1 {
                    font-weight:200;
                    font-size: 44px;
                  }

                  h2 {
                    font-weight:200;
                    font-size: 32px;
                    margin-bottom: 14px;
                  }

                  h3 {
                    font-weight:500;
                    font-size: 27px;
                  }

                  h4 {
                    font-weight:500;
                    font-size: 23px;
                  }

                  h5 {
                    font-weight:900;
                    font-size: 17px;
                  }

                  h6 {
                    font-weight:900;
                    font-size: 14px;
                    text-transform: uppercase;
                  }

                  .collapse {
                    margin:0!important;
                  }

                  td, div {
                    font-family: Helvetica, Arial, sans-serif;
                    text-align: center;
                  }

                  p, ul {
                    margin-bottom: 10px;
                    font-weight: normal;
                    font-size:14px;
                    line-height:1.6;
                  }

                  p.lead {
                    font-size:17px;
                  }

                  p.last {
                    margin-bottom:0px;
                  }

                  ul li {
                    margin-left:5px;
                    list-style-position: inside;
                  }

                  a {
                    color: #747474;
                    text-decoration: none;
                  }

                  a img {
                    border: none;
                  }

                  .head-wrap {
                    width: 100%;
                    margin: 0 auto;
                    background-color: #f9f8f8;
                    border-bottom: 1px solid #d8d8d8;
                  }

                  .head-wrap * {
                    margin: 0;
                    padding: 0;
                  }

                  .header-background {
                    background: repeat-x url(https://www.filepicker.io/api/file/wUGKTIOZTDqV2oJx5NCh) left bottom;
                  }

                  .header {
                    height: 42px;
                  }

                  .header .content {
                    padding: 0;
                  }

                  .header .brand {
                    font-size: 16px;
                    line-height: 42px;
                    font-weight: bold;
                  }

                  .header .brand a {
                    color: #464646;
                  }

                  .body-wrap {
                    width: 505px;
                    margin: 0 auto;
                    background-color: #ffffff;
                  }

                  .soapbox .soapbox-title {
                    font-size: 30px;
                    color: #464646;
                    padding-top: 25px;
                    padding-bottom: 28px;
                  }

                  .content .status-container.single .status-padding {
                    width: 80px;
                  }

                  .content .status {
                    width: 90%;
                  }

                  .content .status-container.single .status {
                    width: 300px;
                  }

                  .status {
                    border-collapse: collapse;
                    margin-left: 15px;
                    color: #656565;
                  }

                  .status .status-cell {
                    border: 1px solid #b3b3b3;
                    height: 50px;
                  }

                  .status .status-cell.success,
                  .status .status-cell.active {
                    height: 65px;
                  }

                  .status .status-cell.success {
                    background: #f2ffeb;
                    color: #51da42;
                  }

                  .status .status-cell.success .status-title {
                    font-size: 15px;
                  }

                  .status .status-cell.active {
                    background: #fffde0;
                    width: 135px;
                  }

                  .status .status-title {
                    font-size: 16px;
                    font-weight: bold;
                    line-height: 23px;
                  }

                  .status .status-image {
                    vertical-align: text-bottom;
                  }

                  .body .body-padded,
                  .body .body-padding {
                    padding-top: 34px;
                  }

                  .body .body-padding {
                    width: 41px;
                  }

                  .body-padded,
                  .body-title {
                    text-align: left;
                  }

                  .body .body-title {
                    font-weight: bold;
                    font-size: 17px;
                    color: #464646;
                  }

                  .body .body-text .body-text-cell {
                    text-align: left;
                    font-size: 14px;
                    line-height: 1.6;
                    padding: 9px 0 17px;
                  }

                  .body .body-signature-block .body-signature-cell {
                    padding: 25px 0 30px;
                    text-align: left;
                  }

                  .body .body-signature {
                    font-family: "Comic Sans MS", Textile, cursive;
                    font-weight: bold;
                  }

                  .footer-wrap {
                    width: 100%;
                    margin: 0 auto;
                    clear: both !important;
                    background-color: #e5e5e5;
                    border-top: 1px solid #b3b3b3;
                    font-size: 12px;
                    color: #656565;
                    line-height: 30px;
                  }

                  .footer-wrap .container {
                    padding: 14px 0;
                  }

                  .footer-wrap .container .content {
                    padding: 0;
                  }

                  .footer-wrap .container .footer-lead {
                    font-size: 14px;
                  }

                  .footer-wrap .container .footer-lead a {
                    font-size: 14px;
                    font-weight: bold;
                    color: #535353;
                  }

                  .footer-wrap .container a {
                    font-size: 12px;
                    color: #656565;
                  }

                  .footer-wrap .container a.last {
                    margin-right: 0;
                  }

                  .footer-wrap .footer-group {
                    display: inline-block;
                  }

                  .container {
                    display: block !important;
                    max-width: 505px !important;
                    clear: both !important;
                  }

                  .content {
                    padding: 0;
                    max-width: 505px;
                    margin: 0 auto;
                    display: block;
                  }

                  .content table {
                    width: 100%;
                  }


                  .clear {
                    display: block;
                    clear: both;
                  }

                  table.full-width-gmail-android {
                    width: 100% !important;
                  }

                  </style>

                  <style type="text/css" media="only screen">

                  @media only screen {

                    table[class*="head-wrap"],
                    table[class*="body-wrap"],
                    table[class*="footer-wrap"] {
                      width: 100% !important;
                    }

                    td[class*="container"] {
                      margin: 0 auto !important;
                    }

                  }

                  @media only screen and (max-width: 505px) {

                    *[class*="w320"] {
                      width: 320px !important;
                    }

                    table[class="status"] td[class*="status-cell"],
                    table[class="status"] td[class*="status-cell"].active {
                      display: block !important;
                      width: auto !important;
                    }

                    table[class="status-container single"] table[class="status"] {
                      width: 270px !important;
                      margin-left: 0;
                    }

                    table[class="status"] td[class*="status-cell"],
                    table[class="status"] td[class*="status-cell"].active,
                    table[class="status"] td[class*="status-cell"] [class*="status-title"] {
                      line-height: 65px !important;
                      font-size: 18px !important;
                    }

                    table[class="status-container single"] table[class="status"] td[class*="status-cell"],
                    table[class="status-container single"] table[class="status"] td[class*="status-cell"].active,
                    table[class="status-container single"] table[class="status"] td[class*="status-cell"] [class*="status-title"] {
                      line-height: 51px !important;
                    }

                    table[class="status"] td[class*="status-cell"].active [class*="status-title"] {
                      display: inline !important;
                    }

                  }
                  </style>
                </head>

                <body bgcolor="#ffffff">

                  <div align="center">
                    <table class="head-wrap w320 full-width-gmail-android" bgcolor="#f9f8f8" cellpadding="0" cellspacing="0" border="0" width="100%">
                      <tr>
                        <td background="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" bgcolor="#ffffff" width="100%" height="8" valign="top">
                          <!--[if gte mso 9]>
                          <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:8px;">
                            <v:fill type="tile" src="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" color="#ffffff" />
                            <v:textbox inset="0,0,0,0">
                          <![endif]-->
                          <div height="8">
                          </div>
                          <!--[if gte mso 9]>
                            </v:textbox>
                          </v:rect>
                          <![endif]-->
                        </td>
                      </tr>
                      <tr class="header-background">
                        <td class="header container" align="center">
                          <div class="content">
                            <span class="brand">
                              <a href="#">
                                Company Name
                              </a>
                            </span>
                          </div>
                        </td>
                      </tr>
                    </table>

                    <table class="body-wrap w320">
                      <tr>
                        <td></td>
                        <td class="container">
                          <div class="content">
                            <table cellspacing="0">
                              <tr>
                                <td>
                                  <table class="soapbox">
                                    <tr>
                                      <td class="soapbox-title">Welcome to {platform_name}</td>
                                    </tr>
                                  </table>
                                  <table class="status-container single">
                                    <tr>
                                      <td class="status-padding"></td>
                                      <td>
                                        <table class="status" bgcolor="#fffeea" cellspacing="0">
                                          <tr>
                                            <td class="status-cell">
                                              Coupon code: <b>13448278949</b>
                                            </td>
                                          </tr>
                                        </table>
                                      </td>
                                      <td class="status-padding"></td>
                                    </tr>
                                  </table>
                                  <table class="body">
                                    <tr>
                                      <td class="body-padding"></td>
                                      <td class="body-padded">
                                        <div class="body-title">Hey {{ first_name }}, thanks for signing up</div>
                                        <table class="body-text">
                                          <tr>
                                            <td class="body-text-cell">
                                              We\'re really excited for you to join our community! You\'re just one click away from activate your account.
                                            </td>
                                          </tr>
                                        </table>
                                        <div style="text-align:left;"><!--[if mso]>
                                          <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:38px;v-text-anchor:middle;width:190px;" arcsize="11%" strokecolor="#407429" fill="t">
                                            <v:fill type="tile" src="https://www.filepicker.io/api/file/N8GiNGsmT6mK6ORk00S7" color="#41CC00" />
                                            <w:anchorlock/>
                                            <center style="color:#ffffff;font-family:sans-serif;font-size:17px;font-weight:bold;">Come on back</center>
                                          </v:roundrect>
                                        <![endif]--><a href="#"
                                        style="background-color:#41CC00;background-image:url(https://www.filepicker.io/api/file/N8GiNGsmT6mK6ORk00S7);border:1px solid #407429;border-radius:4px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:17px;font-weight:bold;text-shadow: -1px -1px #47A54B;line-height:38px;text-align:center;text-decoration:none;width:190px;-webkit-text-size-adjust:none;mso-hide:all;">Activate Account!</a></div>
                                        <table class="body-signature-block">
                                          <tr>
                                            <td class="body-signature-cell">
                                              <p>Thanks so much,</p>
                                              <p class="body-signature"><img src="https://www.filepicker.io/api/file/2R9HpqboTPaB4NyF35xt" alt="Company Name"></p>
                                            </td>
                                          </tr>
                                        </table>
                                      </td>
                                      <td class="body-padding"></td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </td>
                        <td></td>
                      </tr>
                    </table>

                    <table class="footer-wrap w320 full-width-gmail-android" bgcolor="#e5e5e5">
                      <tr>
                        <td class="container">
                          <div class="content footer-lead">
                            <a href="#"><b>Get in touch</b></a> if you have any questions or feedback
                          </div>
                        </td>
                      </tr>
                    </table>
                    <table class="footer-wrap w320 full-width-gmail-android" bgcolor="#e5e5e5">
                      <tr>
                        <td class="container">
                          <div class="content">
                            <a href="#">Contact Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <span class="footer-group">
                              <a href="#">Facebook</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <a href="#">Twitter</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <a href="#">Support</a>
                            </span>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>

                </body>
                </html>
                ',
                'template_for' => 'Platform'
            ],[
                'name' => 'Welcome Customer',
                'type' => 'HTML',
                'position' => 'Content',
                'sender_email' => 'support@domain.com',
                'sender_name' => Null,
                'subject' => 'Welcome to {platform_name}',
                'body' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Airmail Welcome</title>
  <style type="text/css">

  * {
    margin:0;
    padding:0;
    font-family: Helvetica, Arial, sans-serif;
  }

  img {
    max-width: 100%;
    outline: none;
    text-decoration: none;
    -ms-interpolation-mode: bicubic;
  }

  .image-fix {
    display:block;
  }

  .collapse {
    margin:0;
    padding:0;
  }

  body {
    -webkit-font-smoothing:antialiased;
    -webkit-text-size-adjust:none;
    width: 100%!important;
    height: 100%;
    text-align: center;
    color: #747474;
    background-color: #ffffff;
  }

  h1,h2,h3,h4,h5,h6 {
    font-family: Helvetica, Arial, sans-serif;
    line-height: 1.1;
  }

  h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
    font-size: 60%;
    line-height: 0;
    text-transform: none;
  }

  h1 {
    font-weight:200;
    font-size: 44px;
  }

  h2 {
    font-weight:200;
    font-size: 32px;
    margin-bottom: 14px;
  }

  h3 {
    font-weight:500;
    font-size: 27px;
  }

  h4 {
    font-weight:500;
    font-size: 23px;
  }

  h5 {
    font-weight:900;
    font-size: 17px;
  }

  h6 {
    font-weight:900;
    font-size: 14px;
    text-transform: uppercase;
  }

  .collapse {
    margin:0!important;
  }

  td, div {
    font-family: Helvetica, Arial, sans-serif;
    text-align: center;
  }

  p, ul {
    margin-bottom: 10px;
    font-weight: normal;
    font-size:14px;
    line-height:1.6;
  }

  p.lead {
    font-size:17px;
  }

  p.last {
    margin-bottom:0px;
  }

  ul li {
    margin-left:5px;
    list-style-position: inside;
  }

  a {
    color: #747474;
    text-decoration: none;
  }

  a img {
    border: none;
  }

  .head-wrap {
    width: 100%;
    margin: 0 auto;
    background-color: #f9f8f8;
    border-bottom: 1px solid #d8d8d8;
  }

  .head-wrap * {
    margin: 0;
    padding: 0;
  }

  .header-background {
    background: repeat-x url(https://www.filepicker.io/api/file/wUGKTIOZTDqV2oJx5NCh) left bottom;
  }

  .header {
    height: 42px;
  }

  .header .content {
    padding: 0;
  }

  .header .brand {
    font-size: 16px;
    line-height: 42px;
    font-weight: bold;
  }

  .header .brand a {
    color: #464646;
  }

  .body-wrap {
    width: 505px;
    margin: 0 auto;
    background-color: #ffffff;
  }

  .soapbox .soapbox-title {
    font-size: 30px;
    color: #464646;
    padding-top: 25px;
    padding-bottom: 28px;
  }

  .content .status-container.single .status-padding {
    width: 80px;
  }

  .content .status {
    width: 90%;
  }

  .content .status-container.single .status {
    width: 300px;
  }

  .status {
    border-collapse: collapse;
    margin-left: 15px;
    color: #656565;
  }

  .status .status-cell {
    border: 1px solid #b3b3b3;
    height: 50px;
  }

  .status .status-cell.success,
  .status .status-cell.active {
    height: 65px;
  }

  .status .status-cell.success {
    background: #f2ffeb;
    color: #51da42;
  }

  .status .status-cell.success .status-title {
    font-size: 15px;
  }

  .status .status-cell.active {
    background: #fffde0;
    width: 135px;
  }

  .status .status-title {
    font-size: 16px;
    font-weight: bold;
    line-height: 23px;
  }

  .status .status-image {
    vertical-align: text-bottom;
  }

  .body .body-padded,
  .body .body-padding {
    padding-top: 34px;
  }

  .body .body-padding {
    width: 41px;
  }

  .body-padded,
  .body-title {
    text-align: left;
  }

  .body .body-title {
    font-weight: bold;
    font-size: 17px;
    color: #464646;
  }

  .body .body-text .body-text-cell {
    text-align: left;
    font-size: 14px;
    line-height: 1.6;
    padding: 9px 0 17px;
  }

  .body .body-signature-block .body-signature-cell {
    padding: 25px 0 30px;
    text-align: left;
  }

  .body .body-signature {
    font-family: "Comic Sans MS", Textile, cursive;
    font-weight: bold;
  }

  .footer-wrap {
    width: 100%;
    margin: 0 auto;
    clear: both !important;
    background-color: #e5e5e5;
    border-top: 1px solid #b3b3b3;
    font-size: 12px;
    color: #656565;
    line-height: 30px;
  }

  .footer-wrap .container {
    padding: 14px 0;
  }

  .footer-wrap .container .content {
    padding: 0;
  }

  .footer-wrap .container .footer-lead {
    font-size: 14px;
  }

  .footer-wrap .container .footer-lead a {
    font-size: 14px;
    font-weight: bold;
    color: #535353;
  }

  .footer-wrap .container a {
    font-size: 12px;
    color: #656565;
  }

  .footer-wrap .container a.last {
    margin-right: 0;
  }

  .footer-wrap .footer-group {
    display: inline-block;
  }

  .container {
    display: block !important;
    max-width: 505px !important;
    clear: both !important;
  }

  .content {
    padding: 0;
    max-width: 505px;
    margin: 0 auto;
    display: block;
  }

  .content table {
    width: 100%;
  }


  .clear {
    display: block;
    clear: both;
  }

  table.full-width-gmail-android {
    width: 100% !important;
  }

  </style>

  <style type="text/css" media="only screen">

  @media only screen {

    table[class*="head-wrap"],
    table[class*="body-wrap"],
    table[class*="footer-wrap"] {
      width: 100% !important;
    }

    td[class*="container"] {
      margin: 0 auto !important;
    }

  }

  @media only screen and (max-width: 505px) {

    *[class*="w320"] {
      width: 320px !important;
    }

    table[class="status"] td[class*="status-cell"],
    table[class="status"] td[class*="status-cell"].active {
      display: block !important;
      width: auto !important;
    }

    table[class="status-container single"] table[class="status"] {
      width: 270px !important;
      margin-left: 0;
    }

    table[class="status"] td[class*="status-cell"],
    table[class="status"] td[class*="status-cell"].active,
    table[class="status"] td[class*="status-cell"] [class*="status-title"] {
      line-height: 65px !important;
      font-size: 18px !important;
    }

    table[class="status-container single"] table[class="status"] td[class*="status-cell"],
    table[class="status-container single"] table[class="status"] td[class*="status-cell"].active,
    table[class="status-container single"] table[class="status"] td[class*="status-cell"] [class*="status-title"] {
      line-height: 51px !important;
    }

    table[class="status"] td[class*="status-cell"].active [class*="status-title"] {
      display: inline !important;
    }

  }
  </style>
</head>

<body bgcolor="#ffffff">

  <div align="center">
    <table class="head-wrap w320 full-width-gmail-android" bgcolor="#f9f8f8" cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr>
        <td background="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" bgcolor="#ffffff" width="100%" height="8" valign="top">
          <!--[if gte mso 9]>
          <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:8px;">
            <v:fill type="tile" src="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" color="#ffffff" />
            <v:textbox inset="0,0,0,0">
          <![endif]-->
          <div height="8">
          </div>
          <!--[if gte mso 9]>
            </v:textbox>
          </v:rect>
          <![endif]-->
        </td>
      </tr>
      <tr class="header-background">
        <td class="header container" align="center">
          <div class="content">
            <span class="brand">
              <a href="#">
                Company Name
              </a>
            </span>
          </div>
        </td>
      </tr>
    </table>

    <table class="body-wrap w320">
      <tr>
        <td></td>
        <td class="container">
          <div class="content">
            <table cellspacing="0">
              <tr>
                <td>
                  <table class="soapbox">
                    <tr>
                      <td class="soapbox-title">Welcome to {platform_name}</td>
                    </tr>
                  </table>
                  <table class="status-container single">
                    <tr>
                      <td class="status-padding"></td>
                      <td>
                        <table class="status" bgcolor="#fffeea" cellspacing="0">
                          <tr>
                            <td class="status-cell">
                              Coupon code: <b>13448278949</b>
                            </td>
                          </tr>
                        </table>
                      </td>
                      <td class="status-padding"></td>
                    </tr>
                  </table>
                  <table class="body">
                    <tr>
                      <td class="body-padding"></td>
                      <td class="body-padded">
                        <div class="body-title">Hey {{ first_name }}, thanks for signing up</div>
                        <table class="body-text">
                          <tr>
                            <td class="body-text-cell">
                              We\'re really excited for you to join our community! You\'re just one click away from activate your account.
                            </td>
                          </tr>
                        </table>
                        <div style="text-align:left;"><!--[if mso]>
                          <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:38px;v-text-anchor:middle;width:190px;" arcsize="11%" strokecolor="#407429" fill="t">
                            <v:fill type="tile" src="https://www.filepicker.io/api/file/N8GiNGsmT6mK6ORk00S7" color="#41CC00" />
                            <w:anchorlock/>
                            <center style="color:#ffffff;font-family:sans-serif;font-size:17px;font-weight:bold;">Come on back</center>
                          </v:roundrect>
                        <![endif]--><a href="#"
                        style="background-color:#41CC00;background-image:url(https://www.filepicker.io/api/file/N8GiNGsmT6mK6ORk00S7);border:1px solid #407429;border-radius:4px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:17px;font-weight:bold;text-shadow: -1px -1px #47A54B;line-height:38px;text-align:center;text-decoration:none;width:190px;-webkit-text-size-adjust:none;mso-hide:all;">Activate Account!</a></div>
                        <table class="body-signature-block">
                          <tr>
                            <td class="body-signature-cell">
                              <p>Thanks so much,</p>
                              <p class="body-signature"><img src="https://www.filepicker.io/api/file/2R9HpqboTPaB4NyF35xt" alt="Company Name"></p>
                            </td>
                          </tr>
                        </table>
                      </td>
                      <td class="body-padding"></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </div>
        </td>
        <td></td>
      </tr>
    </table>

    <table class="footer-wrap w320 full-width-gmail-android" bgcolor="#e5e5e5">
      <tr>
        <td class="container">
          <div class="content footer-lead">
            <a href="#"><b>Get in touch</b></a> if you have any questions or feedback
          </div>
        </td>
      </tr>
    </table>
    <table class="footer-wrap w320 full-width-gmail-android" bgcolor="#e5e5e5">
      <tr>
        <td class="container">
          <div class="content">
            <a href="#">Contact Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <span class="footer-group">
              <a href="#">Facebook</a>&nbsp;&nbsp;|&nbsp;&nbsp;
              <a href="#">Twitter</a>&nbsp;&nbsp;|&nbsp;&nbsp;
              <a href="#">Support</a>
            </span>
          </div>
        </td>
      </tr>
    </table>
  </div>

</body>
</html>
',
                'template_for' => 'Platform'
            ],[
                'name' => 'User account updated',
                'type' => 'HTML',
                'position' => 'Content',
                'sender_email' => 'support@domain.com',
                'sender_name' => Null,
                'subject' => 'Your account settings have been updated',
                'body' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Airmail Ping</title>
  <style type="text/css">

  * {
    margin:0;
    padding:0;
    font-family: Helvetica, Arial, sans-serif;
  }

  img {
    max-width: 100%;
    outline: none;
    text-decoration: none;
    -ms-interpolation-mode: bicubic;
  }

  .image-fix {
    display:block;
  }

  .collapse {
    margin:0;
    padding:0;
  }

  body {
    -webkit-font-smoothing:antialiased;
    -webkit-text-size-adjust:none;
    width: 100%!important;
    height: 100%;
    text-align: center;
    color: #747474;
    background-color: #ffffff;
  }

  h1,h2,h3,h4,h5,h6 {
    font-family: Helvetica, Arial, sans-serif;
    line-height: 1.1;
  }

  h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
    font-size: 60%;
    line-height: 0;
    text-transform: none;
  }

  h1 {
    font-weight:200;
    font-size: 44px;
  }

  h2 {
    font-weight:200;
    font-size: 32px;
    margin-bottom: 14px;
  }

  h3 {
    font-weight:500;
    font-size: 27px;
  }

  h4 {
    font-weight:500;
    font-size: 23px;
  }

  h5 {
    font-weight:900;
    font-size: 17px;
  }

  h6 {
    font-weight:900;
    font-size: 14px;
    text-transform: uppercase;
  }

  .collapse {
    margin:0!important;
  }

  td, div {
    font-family: Helvetica, Arial, sans-serif;
    text-align: center;
  }

  p, ul {
    margin-bottom: 10px;
    font-weight: normal;
    font-size:14px;
    line-height:1.6;
  }

  p.lead {
    font-size:17px;
  }

  p.last {
    margin-bottom:0px;
  }

  ul li {
    margin-left:5px;
    list-style-position: inside;
  }

  a {
    color: #747474;
    text-decoration: none;
  }

  a img {
    border: none;
  }

  .head-wrap {
    width: 100%;
    margin: 0 auto;
    background-color: #f9f8f8;
    border-bottom: 1px solid #d8d8d8;
  }

  .head-wrap * {
    margin: 0;
    padding: 0;
  }

  .header-background {
    background: repeat-x url(https://www.filepicker.io/api/file/wUGKTIOZTDqV2oJx5NCh) left bottom;
  }

  .header {
    height: 42px;
  }

  .header .content {
    padding: 0;
  }

  .header .brand {
    font-size: 16px;
    line-height: 42px;
    font-weight: bold;
  }

  .header .brand a {
    color: #464646;
  }

  .body-wrap {
    width: 505px;
    margin: 0 auto;
    background-color: #ffffff;
  }

  .soapbox .soapbox-title {
    font-size: 21px;
    color: #464646;
    padding-top: 35px;
  }

  .content .status-container.single .status-padding {
    width: 80px;
  }

  .content .status {
    width: 90%;
  }

  .content .status-container.single .status {
    width: 300px;
  }

  .status {
    border-collapse: collapse;
    margin-left: 15px;
    color: #656565;
  }

  .status .status-cell {
    border: 1px solid #b3b3b3;
    height: 50px;
  }

  .status .status-cell.success,
  .status .status-cell.active {
    height: 65px;
  }

  .status .status-cell.success {
    background: #f2ffeb;
    color: #51da42;
  }

  .status .status-cell.success .status-title {
    font-size: 15px;
  }

  .status .status-cell.active {
    background: #fffde0;
    width: 135px;
  }

  .status .status-title {
    font-size: 16px;
    font-weight: bold;
    line-height: 23px;
  }

  .status .status-image {
    vertical-align: text-bottom;
  }

  .body .body-padded,
  .body .body-padding {
    padding-top: 34px;
  }

  .body .body-padding {
    width: 41px;
  }

  .body-padded,
  .body-title {
    text-align: left;
  }

  .body .body-title {
    font-weight: bold;
    font-size: 17px;
    color: #464646;
  }

  .body .body-text .body-text-cell {
    text-align: left;
    font-size: 14px;
    line-height: 1.6;
    padding: 9px 0 17px;
  }

  .body .body-text-cell a {
    color: #464646;
    text-decoration: underline;
  }

  .body .body-signature-block .body-signature-cell {
    padding: 25px 0 30px;
    text-align: left;
  }

  .body .body-signature {
    font-family: "Comic Sans MS", Textile, cursive;
    font-weight: bold;
  }

  .footer-wrap {
    width: 100%;
    margin: 0 auto;
    clear: both !important;
    background-color: #e5e5e5;
    border-top: 1px solid #b3b3b3;
    font-size: 12px;
    color: #656565;
    line-height: 30px;
  }

  .footer-wrap .container {
    padding: 14px 0;
  }

  .footer-wrap .container .content {
    padding: 0;
  }

  .footer-wrap .container .footer-lead {
    font-size: 14px;
  }

  .footer-wrap .container .footer-lead a {
    font-size: 14px;
    font-weight: bold;
    color: #535353;
  }

  .footer-wrap .container a {
    font-size: 12px;
    color: #656565;
  }

  .footer-wrap .container a.last {
    margin-right: 0;
  }

  .footer-wrap .footer-group {
    display: inline-block;
  }

  .container {
    display: block !important;
    max-width: 505px !important;
    clear: both !important;
  }

  .content {
    padding: 0;
    max-width: 505px;
    margin: 0 auto;
    display: block;
  }

  .content table {
    width: 100%;
  }


  .clear {
    display: block;
    clear: both;
  }

  table.full-width-gmail-android {
    width: 100% !important;
  }

  </style>

  <style type="text/css" media="only screen">

  @media only screen {

    table[class*="head-wrap"],
    table[class*="body-wrap"],
    table[class*="footer-wrap"] {
      width: 100% !important;
    }

    td[class*="container"] {
      margin: 0 auto !important;
    }

  }

  @media only screen and (max-width: 505px) {

    *[class*="w320"] {
      width: 320px !important;
    }

    table[class="soapbox"] td[class*="soapbox-title"],
    table[class="body"] td[class*="body-padded"] {
      padding-top: 24px;
    }
  }
  </style>
</head>

<body bgcolor="#ffffff">

  <div align="center">
    <table class="head-wrap w320 full-width-gmail-android" bgcolor="#f9f8f8" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td background="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" bgcolor="#ffffff" width="100%" height="8" valign="top">
          <!--[if gte mso 9]>
          <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:8px;">
            <v:fill type="tile" src="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" color="#ffffff" />
            <v:textbox inset="0,0,0,0">
          <![endif]-->
          <div height="8">
          </div>
          <!--[if gte mso 9]>
            </v:textbox>
          </v:rect>
          <![endif]-->
        </td>
      </tr>
      <tr class="header-background">
        <td class="header container" align="center">
          <div class="content">
            <span class="brand">
              <a href="#">
                Company Name
              </a>
            </span>
          </div>
        </td>
      </tr>
    </table>

    <table class="body-wrap w320">
      <tr>
        <td></td>
        <td class="container">
          <div class="content">
            <table cellspacing="0">
              <tr>
                <td>
                  <table class="soapbox">
                    <tr>
                      <td class="soapbox-title">Your account settings have been updated</td>
                    </tr>
                  </table>
                  <table class="body">
                    <tr>
                      <td class="body-padding"></td>
                      <td class="body-padded">
                        <div class="body-title">Hi {{ first_name }},</div>
                        <table class="body-text">
                          <tr>
                            <td class="body-text-cell">
                              Your account settings have been updated. If you did not update your settings, please <a href="#">contact support</a>.
                            </td>
                          </tr>
                        </table>
                        <div><!--[if mso]>
                          <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:38px;v-text-anchor:middle;width:230px;" arcsize="11%" strokecolor="#407429" fill="t">
                            <v:fill type="tile" src="https://www.filepicker.io/api/file/N8GiNGsmT6mK6ORk00S7" color="#41CC00" />
                            <w:anchorlock/>
                            <center style="color:#ffffff;font-family:sans-serif;font-size:17px;font-weight:bold;">Review Account Settings</center>
                          </v:roundrect>
                        <![endif]--><a href="#"
                        style="background-color:#41CC00;background-image:url(https://www.filepicker.io/api/file/N8GiNGsmT6mK6ORk00S7);border:1px solid #407429;border-radius:4px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:17px;font-weight:bold;text-shadow: -1px -1px #47A54B;line-height:38px;text-align:center;text-decoration:none;width:230px;-webkit-text-size-adjust:none;mso-hide:all;">Review Account Settings</a></div>
                        <table class="body-signature-block">
                          <tr>
                            <td class="body-signature-cell">
                              <p>Thanks for being a customer!</p>
                              <p class="body-signature"><img src="https://www.filepicker.io/api/file/2R9HpqboTPaB4NyF35xt" alt="Company Name"></p>
                            </td>
                          </tr>
                        </table>
                      </td>
                      <td class="body-padding"></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </div>
        </td>
        <td></td>
      </tr>
    </table>

    <table class="footer-wrap w320 full-width-gmail-android" bgcolor="#e5e5e5">
      <tr>
        <td></td>
        <td class="container">
          <div class="content footer-lead">
            <a href="#"><b>Get in touch</b></a> if you have any questions or feedback
          </div>
        </td>
        <td></td>
      </tr>
    </table>
    <table class="footer-wrap w320 full-width-gmail-android" bgcolor="#e5e5e5">
      <tr>
        <td></td>
        <td class="container">
          <div class="content">
            <a href="#">Contact Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <span class="footer-group">
              <a href="#">Facebook</a>&nbsp;&nbsp;|&nbsp;&nbsp;
              <a href="#">Twitter</a>&nbsp;&nbsp;|&nbsp;&nbsp;
              <a href="#">Support</a>
            </span>
          </div>
        </td>
        <td></td>
      </tr>
    </table>
  </div>

</body>
</html>
',
                'template_for' => 'Platform'
            ]

        ]);
    }
}