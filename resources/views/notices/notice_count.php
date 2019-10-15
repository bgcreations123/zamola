<?php

$user = auth()->user();

$notices = DB::table('comments')
->where([
	'receiver_id' => $user->id,
	'status' => '0',
])
->count();

if($notices != 0){
	echo '<span class="badge badge-dark">'.$notices.'</span>';
}
