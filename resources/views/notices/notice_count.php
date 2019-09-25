<?php

$user = auth()->user();

$notices = DB::table('comments')
->where([
	'receiver_id' => $user->id,
	'status' => '0',
])
->count();

echo $notices;