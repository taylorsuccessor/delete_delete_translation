<?php

use App\Helpers\User;
use App\Helpers\Menu;
use Illuminate\Routing\UrlGenerator;
/*
 * Global helpers file with misc functions
 */



if (!function_exists('current_user')) {
	function current_user()
	{
		$oUser = new User();
		return $oUser;
	}
}

if (!function_exists('get_admin_menu')) {
	function get_admin_menu()
	{
		$oMenu = new App\module\layout\admin\controller\Menu();
		return $oMenu->getAdminMenu();
	}
}


if (!function_exists('th_sort')) {
	function th_sort($sText, $sCol, $oResult)
	{
		if (is_null($oResult) || $oResult->isEmpty()) {
			return '<a href="#">'.$sText.'</a>';
		}

		//$sRouteName = Route::currentRouteName();
		//$sUrl =($sRouteName ==null)? '': route($sRouteName);
		$sRouteName=Request::path();
        $sUrl =($sRouteName ==null)? '/': '/'.$sRouteName;

		$aParams = \Request::all();
		$aArrow = '';

			$sUrl .= '?';
		if (count($aParams)) {
			foreach ($aParams as $sKey => $sValue) {
				if (!in_array($sKey, ['order', 'sort'])) {
                                    if(!is_array($sValue)){
					$sUrl .= $sKey.'='.$sValue.'&';
                                    }else{
                                        $sUrl .= $sKey.'='.implode(',',$sValue).'&';
                                    }
				}
			}

		}

			$sUrl .= 'order='.$sCol;

			if (isset($aParams['order']) && $aParams['order'] == $sCol) {
				if ($aParams['sort'] == 'ASC') {
					$sSort = 'DESC';
					$aArrow = ' <i class="fa fa-chevron-down"></i>';
				} else {
					$sSort = 'ASC';
					$aArrow = ' <i class="fa fa-chevron-up"></i>';
				}
			} else {
				$sSort = 'desc';
			}

			$sUrl .= '&sort='.$sSort;
		return '<a href="'.$sUrl.'">'.$sText.$aArrow.'</a>';
	}
}





if (!function_exists('canAccess')) {
	function canAccess($permission)
	{

		/* todo make class static*/
		$cPermission= new \App\module\authorization\controller\PermissionController();
//		dd(session('deny_permission'));

		return $cPermission->access($permission);
	}
}


if (!function_exists('notification')) {
	function notification($name, $data)
	{
		$notification = new \App\module\notification\admin\controller\SendNotification;
		$notification->send($name, $data);
	}
}

