


<!-- .Side panel -->
<div class=" side-mini-panel"   >
    <ul class="mini-nav">
        <div class="togglediv"><a href="javascript:void(0)" id="togglebtn"><i class="ti-menu"></i></a></div>







                <li  > <a href="javascript:void(0)"><i class="fa fa-user" data-icon="v"></i></a>
                    <div class="sidebarmenu">
                        <!-- Left navbar-header -->
                        <h3 class="menu-title">menu tab</h3>
                        <div class="searchable-menu">
                            <form role="search" class="menu-search">
                                <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                        </div>
                        <ul class="sidebar-menu">



    <div class="myClass" id="class2">

 @if(canAccess('admin.vue.show')) <li><router-link to="/foo">foo link</router-link></li>@endif
 <li><router-link to="/bar">bar link</router-link></li>
 <li><router-link to="/admin/vue">vue index link</router-link></li>

</div>


                            <hr>

                           </ul>
                        <!-- Left navbar-header end -->
                    </div>
                </li>



    </ul>
</div>
<!-- /.Side panel -->






@section('script')
    @parent
    <script>

        function activeCurrentMenu(){

            var pageUrl=window.location.pathname;

            var pageUrlArray=pageUrl.split('/');

            var firstUrlPart='/'+pageUrlArray[1];
            var secondUrlPart='/'+pageUrlArray[1]+'/'+pageUrlArray[2];console.log(pageUrl,pageUrlArray,firstUrlPart,secondUrlPart);
            var currentA=$('.sidebar-menu a.active');

            if(currentA.length == 0){
                currentA=$('.sidebar-menu a[href*="'+pageUrl+'"]').first();
                if(currentA.length == 0){
                    currentA=$('.sidebar-menu a[href*="'+secondUrlPart+'"]').first();
                    if(currentA.length == 0){
                        currentA=$('.sidebar-menu a[href*="'+firstUrlPart+'"]').first();

                    }
                }
            }
            currentA.addClass('active');
            currentA.parent().parent().parent().parent().parent().addClass('selected');

        }
        $(document).ready(function(){

            activeCurrentMenu();
            setTimeout('activeCurrentMenu()',1000);

        });

        {{--@if(Input::get('search')== '')--}}
        {{--//$('#searchForm input[name="search"]').click();--}}
        {{--var tablea=$('.tablesaw-sortable');--}}
        {{--var columnsNumber=tablea.find('th').length;--}}
        {{--alert(tablea.html());--}}
        {{--@endif--}}

        $('.mini-nav>li').mouseover(function(){
            $(this).click();
        });



    </script>
@stop
















{{--<div id="main-menu" role="navigation">--}}
{{--<div id="main-menu-inner">--}}
{{--<div class="menu-content top" id="menu-content-demo">--}}
{{--<div>--}}
{{--<br><img src="data:image/jpeg;base64,{{ current_user()->getAvatar() }}" alt="" class="">--}}
{{--<div class="btn-group">--}}
{{--<a href="{{ route('client.users.profile') }}" class="btn btn-xs btn-primary btn-outline dark">--}}
{{--<i class="fa fa-user"></i>--}}
{{--</a>--}}

{{--<a href="{{ route('client.auth.logout') }}" class="btn btn-xs btn-danger btn-outline dark">--}}
{{--<i class="fa fa-power-off"></i>--}}
{{--</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<ul class="navigation">--}}
{{--<li>--}}
{{--<a href=" {{ route('client.index') }}"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text">{{ trans('general.dashboard') }}</span></a>--}}
{{--</li>--}}

{{--*/ $aAdminMenu = get_client_menu() /*--}}
{{--@if(count($aAdminMenu))--}}
{{--@foreach($aAdminMenu as $aModule)--}}
{{--<li class="mm-dropdown">--}}
{{--<a href="{{$aModule['route']}}">--}}
{{--<i class="menu-icon fa {{$aModule['icon']}}"></i>--}}
{{--<span class="mm-text">{{$aModule['title']}}</span>--}}
{{--</a>--}}
{{--@if (count($aModule['menu']))--}}
{{--<ul>--}}
{{--@foreach($aModule['menu'] as $aSubMenu)--}}
{{--@if( $aSubMenu['display'] )--}}
{{--<li>--}}
{{--<a tabindex="-1" href="{{ $aSubMenu['route'] }}">--}}
{{--<i class="menu-icon fa {{ $aSubMenu['icon'] }}"></i>--}}
{{--<span class="mm-text">{{ $aSubMenu['title'] }}</span>--}}
{{--</a>--}}
{{--</li>--}}
{{--@endif--}}
{{--@endforeach--}}
{{--</ul>--}}
{{--@endif--}}
{{--</li>--}}
{{--@endforeach--}}
{{--@endif--}}
{{--@if(config('fxweb.EnableLinkTradeForUser'))--}}
{{--<li>--}}
{{--<a href="{{ route('client.webTrader') }}"><i class="menu-icon fa fa-bar-chart-o"></i><span class="mm-text">{{ trans('general.webTrader') }}</span></a>--}}
{{--</li>--}}
{{--@endif--}}
{{--</ul>--}}


{{--</div>--}}
{{--</div>--}}