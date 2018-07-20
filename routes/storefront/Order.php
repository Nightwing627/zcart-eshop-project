<?php
	// Orders
	Route::get('order/{order}', 'OrderController@detail')->name('order.detail');
	Route::get('order/track/{order}', 'OrderController@track')->name('order.track');
	Route::put('order/goodsReceived/{order}', 'OrderController@goods_received')->name('goods.received');

	// Conversations
	Route::post('order/conversation/{order}', 'ConversationController@contact')->name('order.conversation');

	// Disputes
	Route::get('order/dispute/{order}', 'DisputeController@show_dispute_form')->name('dispute.open');
	Route::post('order/dispute/{order}', 'DisputeController@open_dispute')->name('dispute.save');

	// Refunds
	// Route::post('order/refund/{order}', 'DisputeController@refund_request')->name('refund.request');
