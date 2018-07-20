{{-- @if($wishlists->count() > 0) --}}
{{ $disputes }}
{{-- @else --}}
  <div class="clearfix space50"></div>
  <p class="lead text-center space50">
    @lang('theme.nothing_found')
  </p>
{{-- @endif --}}
