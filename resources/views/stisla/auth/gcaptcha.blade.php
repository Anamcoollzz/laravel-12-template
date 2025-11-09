@if ($isGoogleCaptcha)
  {!! app('captcha')->display() !!}
  @if ($errors->has('g-recaptcha-response'))
    <div class="has-error text-danger @if (is_app_chat()) text-red-700 @endif">
      {{ $errors->first('g-recaptcha-response') }}
    </div>
    <br>
  @endif
@endif
