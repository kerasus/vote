<h1 class="v--title">@lang('Mobile Verification')</h1>
<span class="v--hint">@lang("Site Name")</span>
<div class="v--box">
    <div>
        کد برای شماره {{auth()->user()->mobile}} ارسال شد.
        <br>
        کد ارسال شده را وارد نمایید.
    </div>
    <div class="v--box-form">
        <div>
            <input type="text" class="v--input" placeholder="کد را وارد نمایید">
            <span class="v--input-hint">مثال: 1234</span>
        </div>
        <div class="row">
            <div class="col-md-6">
                <button class="v--btn v--btn-success v--btn-submit">
                    <span class="v--text-white-shadow">
                        شروع نظر سنجی >
                    </span>
                </button>
            </div>
            <div class="col-md-6 text-left">
{{--                <span class="v--hint">زمان باقی مانده 3:22</span>--}}
                <br>
{{--                <button class="v--btn v--btn-link">اصلاح شماره</button>--}}
                <button class="v--btn v--btn-link">ارسال مجدد کد</button>
            </div>
        </div>
    </div>
</div>
