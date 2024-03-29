  <!-- Top Navigation -->
  <nav class=" navbar navbar-default navbar-static-top m-b-0"  >
    <div class="navbar-header">
      <!-- .Logo -->
      <div class="top-left-part"><a class="logo" href="/">
        <!--This is logo icon-->
        <img src="{{asset('/assets/website/images/whiteLogoPart.png')}}" alt="home" class="light-logo" style="width:56px;height:50px;" /></a></div>
         <ul class="nav navbar-top-links navbar-left hidden-xs">
           <li><a href="javascript:void(0)" class="logotext">
             <!--This is logo text-->
             <img src="{{asset('/assets/website/images/whiteLogo.png')}}" style="max-width:100px;" alt="home" class="light-logo" alt="home" /></a></li>
         </ul>
      <!-- /.Logo -->
      <!-- top right panel -->
      <ul class="nav navbar-top-links navbar-right pull-right">







@inject('notificationClass','\App\module\layout\admin\controller\Notification')


@if(canAccess('admin.user_notification.index'))
<?php $notificationList=$notificationClass->getNotificationList(); ?>
        <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-bell"></i>
          <div class="@if(count($notificationList) ) notify @endif"><span class="heartbit"></span><span class="point"></span></div>
          </a>
          <ul class="dropdown-menu mailbox animated bounceInDown">
            <li>
              <div class="drop-title">You have {{ count($notificationList) }} new Notification</div>
            </li>
            <li>
              <div class="message-center">

             @foreach($notificationList as $notification)
              <a href="{{$notification['url']}}">
                <div class="user-img">
                    <i class="{{$notification['img']}}"></i>
                    <span class="profile-status @if(!$notification['is_read'] ) online @endif  pull-right"></span> </div>
                <div class="mail-contnet">
                  <h5> {{$notification['title']}} </h5>
                  <span class="mail-desc">{{$notification['body']}} </span> <span class="time">{{$notification['created_at']}}</span> </div>
                </a>
                @endforeach

                 </div>
            </li>
            <li> <a class="text-center" href="{{route('admin.user_notification.mark_as_reead')}}"> <strong>{{trans('general.clearNotification')}}</strong> <i class="fa fa-angle-right"></i> </a></li>
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
        <li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="{{assetImage(\Auth::user()->avatar)}}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"> {{\Auth::user()->first_name}}</b> </a>
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
