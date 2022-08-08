<?php
namespace App\Helpers;
use App\Models\PermintaanAset;
use App\Models\LaporanAset;
use App\Models\Notifikasi;

class NotifHelpers 
{
	static function getPermintaanAset()
	{
		$permintaan = PermintaanAset::where('is_acc',0)->orderBy('created_at','asc')->get();

		return $permintaan;
	}
	static function getLaporanAset()
	{
		$permintaan = LaporanAset::where('is_acc',0)->orderBy('created_at','asc')->get();

		return $permintaan;
	}
	static function addNotif($user_id, $text, $url)
	{
		$notif = Notifikasi::create(['user_id' => $user_id, 'text' => $text,'url' => $url])->get();

		return $notif;
	}

	static function setRead($id)
	{
		$notif = Notifikasi::where(['id' => $id,'user_id' => auth()->user()->id])->update(['is_read' => 1]);

		return $notif;
	}

	static function getNotif()
	{
		$notif = Notifikasi::where('user_id',auth()->user()->id)->orderBy('created_at','asc')->get();

		return $notif;
	}
}