<?php

namespace App\Helpers;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\File;
use App\Models\Users as mUsers;

class User {

    private $oUser = null;

    public function __construct() {
        $this->oUser = Sentinel::check();
    }

    public function getUser() {
        return $this->oUser;
    }

    public function getAvatar() {
        if (is_null($this->oUser->avatar)) {
            return File::get(public_path() . '/assets/'.config('project.layoutAssetsFolder').'/img/avatar');
        }
        return $this->oUser->avatar;
    }

    public function getFirstName() {
        return $this->oUser->first_name;
    }

    public function getLastName() {
        return $this->oUser->last_name;
    }

    public function getName() {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    public function getShop(){
        $oShops=\App\Models\ShopUsers::where(['users_id'=>current_user()->getUser()->id])
            ->where('shop_id' ,'>',0)->get();
        $ids=[];
        foreach($oShops as $oShop){
            $ids[]=$oShop->shop_id;

        }
        return $ids;
    }

    public function getShopOrder(){
        $oShopOrders=\App\Models\Order::whereIn('shop_id',$this->getShop())->get();

        $ids=[];
        foreach($oShopOrders as $oShopOrder){
            $ids[]=$oShopOrder->id;

        }
        return $ids;
    }


    public function getServiceCompany(){
        $oServiceCompanys=\App\Models\ServiceBoy::where(['users_id'=>current_user()->getUser()->id])
            ->orWhere('manager_id' ,'=',current_user()->getUser()->id)->get();
        $ids=[];
        foreach($oServiceCompanys as $oServiceCompany){
            $ids[]=$oServiceCompany->service_company_id;

        }
        return $ids;
    }


    public function greatGestUser()
    {

        $credentials = [

            'email' => 'guest_' . rand(99999, 99999999) . '_' . rand(99999, 99999999) . '@cofe.com',
            'password' => rand(99999, 99999999) . '_' . rand(99999, 99999999),
            'type' => config('array.users_type_guest_index'),
            'first_name'=>'guest',
            'last_name'=>'guest'

        ];

        $user = Sentinel::registerAndActivate($credentials);

        $role = Sentinel::findRoleByName('client');
        $role->users()->attach($user);


        $role2 = Sentinel::findRoleByName('guest');
        $role2->users()->attach($user);
        $mUsers=mUsers::find($user->id);$mUsers->update(['type'=> config('array.users_type_guest_index')]);
        Sentinel::login($user);

    }

}
