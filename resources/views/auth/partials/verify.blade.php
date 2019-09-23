<h1 class="v--title">@lang('Mobile Verification')</h1>
<span class="v--hint">@lang("Site Name")</span>
<mobile-verify :mobile="{{ auth()->user()->mobile }}"></mobile-verify>
