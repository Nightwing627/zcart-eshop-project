<div class="row">
  <div class="col-md-12">
    <table class="table table-sripe">
      <thead>
        <tr>
          <th>{{ trans('app.image') }}</th>
          <th>{{ trans('app.description') }}</th>
          <th>{{ trans('app.quantity') }}</th>
          <th>{{ trans('app.price') }}</th>
          <th>{{ trans('app.total') }}</th>
          <th><i class="fa fa-trash-o"></i></th>
        </tr>
      </thead>
      <tbody id="items">

        <tr id='empty-cart' style="display: {{ (isset($cart) && count($cart->inventories) > 0) ? 'none' : 'table-row' }}"><td colspan="5">{{ trans('help.empty_cart') }}</td></tr>

        @if(isset($cart) && count($cart->inventories) > 0)
          <?php $i = 1; ?>
          @foreach($cart->inventories as $item )
            <?php $id = $item->pivot->inventory_id; ?>
            <tr id="{{ $id }}">
              <td>
                @if(File::exists(image_path('inventories') . $id . '_35x35.png'))
                  <img src="{{ get_image_src($id, 'inventories', '35x35') }}" class="img-circle img-md" alt="{{ trans('app.image') }}">
                @else
                  <img src="{{ get_image_src($item->product->id, 'products', '35x35') }}" class="img-circle img-md" alt="{{ trans('app.image') }}">
                @endif
              </td>
              <td class="nopadding-right" width="65%">
                {{ $item->pivot->item_description }}
                {{ Form::hidden("cart[".$i."][inventory_id]", $id) }}
                {{ Form::hidden("cart[".$i."][item_description]", $item->pivot->item_description) }}
              </td>
              <td class="nopadding-right" width="5%">{{ Form::number("cart[".$i."][quantity]", $item->pivot->quantity, ['id' => 'qtt-'.$id, 'class' => 'form-control itemQtt', 'onChange' => 'generateItemTotal('. $id .')', 'required']) }}</td>

              <td class="nopadding-right" width="10%">{{ Form::number("cart[".$i."][unit_price]", $item->pivot->unit_price, ['id' => 'price-'.$id, 'class' => 'form-control itemPrice', 'onChange' => 'generateItemTotal('. $id .')', 'step' => 'any', 'required']) }}</td>

              <td class="nopadding-right" width="10%">
                <span id="total-{{$id}}"  class="itemTotal">
                  {{ $item->pivot->quantity * $item->pivot->unit_price }}
                </span>
              </td>
              <td><i class="fa fa-close" onClick="deleteThisRow({{$id}})" data-toggle="tooltip" data-placement="left" title="{{ trans('help.romove_this_cart_item') }}"></i></td>
            </tr>
            <?php $i++; ?>
          @endforeach
        @endif
      </tbody>
    </table>
  </div>
</div>
