  <!-- Top Navigation -->
  <nav class=" navbar navbar-default navbar-static-top m-b-0"  >
    <div class="navbar-header">
      <!-- .Logo -->
      <div class="top-left-part"><a class="logo" href="/">
        <!--This is logo icon-->
        <img src="/assets/website/images/whiteLogoPart.png" alt="home" class="light-logo" style="width:30px;height:30px;" /></a></div>
         <ul class="nav navbar-top-links navbar-left hidden-xs">
           <li><a href="javascript:void(0)" class="logotext">
             <!--This is logo text-->
             <img src="/assets/website/images/whiteLogo.png" style="max-width:100px;" alt="home" class="light-logo" alt="home" /></a></li>
         </ul>
      <!-- /.Logo -->
      <!-- top right panel -->
      <ul class="nav navbar-top-links navbar-right pull-right">









@inject('notificationClass','\App\module\layout\admin\controller\Notification')


@if(canAccess('admin.service_company_order.index'))
<?php $notificationList=$notificationClass->getNotificationList(); ?>
        <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-user"></i>
          <div class="@if(count($notificationList) ) notify @endif"><span class="heartbit"></span><span class="point"></span></div>
          </a>
          <ul class="dropdown-menu mailbox animated bounceInDown">
            <li>
              <div class="drop-title">You have {{ count($notificationList) }} new Notification</div>
            </li>
            <li>
              <div class="message-center">

             @foreach($notificationList as $notification)
              <a href="{{$notification['link']}}">
                <div class="user-img"> <img src="{{$notification['img']}}" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                <div class="mail-contnet">
                  <h5> {{$notification['title']}} </h5>
                  <span class="mail-desc">{{$notification['description']}} </span> <span class="time">{{$notification['date']}}</span> </div>
                </a>
                @endforeach

                 </div>
            </li>
            <li> <a class="text-center" href="/admin/service_company_order?notification=0"> <strong>See all notification</strong> <i class="fa fa-angle-right"></i> </a></li>
          </ul>
          <!-- /.dropdown-messages -->
        </li>
        @endif










        <!-- .dropdown -->
        <li class="dropdown">
         <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="fa fa-language"></i>
{{ trans('general.language') }}
          </a>
          <ul class="dropdown-menu dropdown-tasks animated slideInUp">

@if(is_array(config('app.language')))
@foreach(config('app.language')  as $locale=>$name)

            <li> <a href="?locale={{$locale}}">
            {{ trans('general.'.$name) }}
              </a> </li>
@endforeach
@endif

                </ul>
          <!-- /.dropdown-tasks -->
        </li>
        <!-- /.dropdown -->
        <!-- .dropdown -->
        <li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="/assets/admin/img/user_icon.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"> {{\Auth::user()->first_name}}</b> </a>
          <ul class="dropdown-menu dropdown-user animated flipInY">
{{--            <li><a href="{{ route('client.users.profile') }}"><i class="ti-user"></i> {{ trans('general.Profile') }}</a></li>--}}
{{--            <li><a href=" {{ route('client.users.changePassword') }}"><i class="ti-lock "></i>{{ trans('general.changePassword') }}</a></li>--}}

           <li role="separator" class="divider"></li>
                            <li><a href=" {{ route('admin.logout') }}"><i class="fa fa-power-off"></i> {{ trans('general.logout') }}</a></li>
                                                          </ul>
                                                          <!-- /.dropdown-user -->
                                                        </li>
                                                        <!-- /.dropdown -->
                                                        <!-- .right toggle -->
                                                        <li class="right-side-toggle"><a class="waves-effect waves-light" href="javascript:void(0)"> <i class="ti-arrow-right"></i></a></li>
                                                        <!-- /.right toggle -->
                                                      </ul>
                                                      <!-- top right panel -->
                                                    </div>
                                                  </nav>
                                                  <!-- End Top Navigation -->















                                                                                {{--{{ trans('general.language') }} --}}
                                {{--@foreach(config('app.language')  as $locale=>$name)--}}

                                  {{--{{$locale}}{{ trans('general.'.$name) }}--}}
                                {{--@endforeach--}}

{{--"data:image/jpeg;base64,{{ current_user()->getAvatar() }}"--}}
{{--{{ current_user()->getName() }}--}}
{{--{{ route('admin.users.profile') }}--}}
{{--{{ trans('general.Profile') }}--}}
{{--{{ route('admin.users.changePassword') }}--}}
{{--{{ trans('general.changePassword') }}--}}
{{--{{ route('admin.auth.logout') }}--}}
{{--{{ trans('general.Logout') }}--}}
