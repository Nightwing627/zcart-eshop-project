<div class="container filter-wrapper">
    <div class="row">
        <div class="col-md-12 ">
            <span>
                @lang('theme.sort_by'):
                <select name="sort_by" class="selectBoxIt">
                    <option value="">@lang('theme.best_match')</option>
                    <option value="">@lang('theme.popular')</option>
                    <option value="">@lang('theme.newest')</option>
                    <option value="">@lang('theme.older')</option>
                    <option value="">@lang('theme.price'): @lang('theme.low_to_high')</option>
                    <option value="">@lang('theme.price'): @lang('theme.high_to_low')</option>
                </select>
            </span>

            <div class="checkbox">
                <label>
                  <input class="i-check" type="checkbox"> @lang('theme.free_shipping') <span class="small">(100)</span>
                </label>
            </div>
            <div class="checkbox">
                <label>
                  <input class="i-check" type="checkbox"> @lang('theme.has_offers')
                </label>
            </div>
            <div class="checkbox">
                <label>
                  <input class="i-check" type="checkbox"> @lang('theme.new_arraivals')
                </label>
            </div>

            <span class="pull-right text-muted">
              <a href="#" class="viewSwitcher btn btn-primary btn-sm flat">
                <i class="fa fa-th" data-toggle="tooltip" title="@lang('theme.grid_view')"></i>
              </a>
              <a href="#" class="viewSwitcher btn btn-default btn-sm flat">
                <i class="fa fa-list" data-toggle="tooltip" title="@lang('theme.list_view')"></i>
              </a>
            </span>
        </div>
    </div>
</div><!-- /.filter-wrapper -->

<div class="clearfix space20"></div>