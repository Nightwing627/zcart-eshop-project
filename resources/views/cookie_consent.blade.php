<style type="text/css">
    .cookie-consent-container {
        width: 350px;
        min-height: 20px;
        box-sizing: border-box;
        padding: 30px;
        border: thin solid #d6644a;
        background: #555;
        overflow: hidden;
        position: fixed;
        bottom: 30px;
        right: 32px;
        display: none;
        z-index: 9999;
    }
    .cookie-consent-container .cookie-title{
        color: #e3e3e3;
        font-size: 22px;
        line-height: 20px;
        display: block;
    }
    .cookie-consent-container .cookie-title img{
        margin-right: 7px;
    }
    .cookie-consent-container .cookie-consent-message p {
      margin: 0;
      padding: 0;
      color: #e3e3e3;
      font-size: 13px;
      line-height: 20px;
      display: block;
      margin-top: 10px;
    }
    .cookie-consent-container .cookie-consent-message a {
        color: #e3e3e3;
        text-decoration: underline;
        font-style: italic;
    }
    .cookie-consent-container .cookie-consent-button a {
        display: inline-block;
        text-decoration: none;
        color: #e3e3e3;
        font-size: 14px;
        letter-spacing: 1px;
        margin-top: 14px;
        background: #d6644a;
        box-sizing: border-box;
        padding: 13px 21px;
        text-align: center;
        transition: background 0.3s;
    }
    .cookie-consent-container .cookie-consent-button a:hover {
      cursor: pointer;
      background: #3E9B67;
    }

    @media (max-width: 980px) {
      .cookie-consent-container {
        bottom: 0px !important;
        left: 0px !important;
        width: 100%  !important;
      }
    }
</style>

<div class="cookie-consent-container" id="cookieConsentContainer" style="opacity: 1; display: block;">
    <div class="cookie-title">
        <img src="{{ get_cookie_img() }}" width="32" height="32" /> {{ trans('app.cookies') }}
    </div>

    <div class="cookie-consent-message">
        <p>
            {!! trans('app.cookie_consent_message') !!}
            <a href="{{ get_page_url(\App\Page::PAGE_PRIVACY_POLICY) }}" target="_blank">{{ trans('app.cookies_terms') }}</a>
        </p>
    </div>

    <div class="cookie-consent-button">
        <a onclick="purecookieDismiss();">
            {!! trans('app.cookie_consent_agree') !!}
        </a>
    </div>
</div>

<script>
    window.gdprCookieConsent = (function () {
        const COOKIE_VALUE = 1;
        const COOKIE_DOMAIN = '{{ config('session.domain') ?? request()->getHost() }}';

        function consentWithCookies() {
            setCookie('{{ config('gdpr.cookie.name') }}', COOKIE_VALUE, {{ config('gdpr.cookie.lifetime') }});
            hideCookieDialog();
        }

        function cookieExists(name) {
            return (document.cookie.split('; ').indexOf(name + '=' + COOKIE_VALUE) !== -1);
        }

        function hideCookieDialog() {
            const dialogs = document.getElementsByClassName('cookie-consent-container');

            for (let i = 0; i < dialogs.length; ++i) {
                dialogs[i].style.display = 'none';
            }
        }

        function setCookie(name, value, expirationInDays) {
            const date = new Date();
            date.setTime(date.getTime() + (expirationInDays * 24 * 60 * 60 * 1000));
            document.cookie = name + '=' + value
                + ';expires=' + date.toUTCString()
                + ';domain=' + COOKIE_DOMAIN
                + ';path=/{{ config('session.secure') ? ';secure' : null }}';
        }

        if (cookieExists('{{ config('gdpr.cookie.name') }}')) {
            hideCookieDialog();
        }

        const buttons = document.getElementsByClassName('cookie-consent-button');

        for (let i = 0; i < buttons.length; ++i) {
            buttons[i].addEventListener('click', consentWithCookies);
        }

        return {
            consentWithCookies: consentWithCookies,
            hideCookieDialog: hideCookieDialog
        };
    })();
</script>