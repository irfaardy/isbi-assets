<?php
namespace App\Helpers;
use App\Models\PermintaanAset;
use App\Models\LaporanAset;

class NotifHelpers 
{
	static function getPermintaanAset()
	{
		$permintaan = PermintaanAset::where('is_acc',0)->get();

		return $permintaan;
	}
	static function getLaporanAset()
	{
		$permintaan = LaporanAset::where('is_acc',0)->get();

		return $permintaan;
	}
}