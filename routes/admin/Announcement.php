<?php
	// Announcement
	Route::resource('announcement', 'AnnouncementController', ['except' => ['show']]);