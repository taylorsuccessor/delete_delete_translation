<?php

namespace App\module\layout\admin\controller;

use Module,
    Config,
    Lang;

class Menu {

    public function __construct() {
        //
    }

    public function getAdminMenu() {


        $aModules = [];


        $mainClientMenus = Config::get('module.admin_menu', []);
        foreach ($mainClientMenus as $mainClientMenu) {

            if(!canAccess($mainClientMenu['route'])){ continue;}

            foreach ($mainClientMenu['subMenus'] as $key=>&$subMenu) {

              if(!canAccess($subMenu['route'])){unset($subMenu);unset($mainClientMenu['subMenus'][$key]); continue;}

                $subMenu['title'] = trans('general.' . $subMenu['title']);
                $subMenu['parameter'] = array_key_exists('parameter',$subMenu)? $subMenu['parameter']:'';
                if (empty($subMenu['route'])) {
                    $subMenu['route'] = '#';
                } else {
                    $subMenu['route'] = route($subMenu['route']);
                }
            }
            $menuTab = [
                'route' => $mainClientMenu['route'],
                'icon' => $mainClientMenu['icon'],
                'title' => trans('general.' . $mainClientMenu['title']),
                'originTitle' => $mainClientMenu['title'],
                'menu' => $mainClientMenu['subMenus'],
            ];
            $aModules[] = $menuTab;
        }

        return $aModules;
    }

}
