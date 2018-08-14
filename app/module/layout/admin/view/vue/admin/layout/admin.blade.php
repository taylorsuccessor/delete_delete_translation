<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
    <meta name="_token" content="{{ csrf_token() }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Laravel</title>
    <!-- Bootstrap Core CSS -->


 {{--Html::style('/delete_test.css') !!}--}}
{!! Html::style('/assets/admin/bootstrap/dist/css/bootstrap.min.css') !!}

{!! Html::style('/assets/admin/plugins/bower_components/tablesaw-master/dist/tablesaw.css') !!}
<!-- animation CSS -->
{!! Html::style('/assets/admin/css/animate.css') !!}
<!-- Custom CSS -->
{!! Html::style('/assets/admin/css/style.css') !!}
<!-- color CSS -->
{!! Html::style('/assets/admin/css/colors/default.css')!!}
{!! Html::style('/assets/admin/css/helper.css')!!}
<!-- Date PICKER CSS -->

{!! Html::style('/assets/admin/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.css')!!}
{!! Html::style('/assets/admin/plugins/bower_components/jquery-asColorPicker-master/css/asColorPicker.css')!!}
{!! Html::style('/assets/admin/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')!!}
{!! Html::style('/assets/admin/plugins/bower_components/timepicker/bootstrap-timepicker.min.css')!!}
{!! Html::style('/assets/admin/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css')!!}


    <style type="text/css">
        .vue-notification {
            padding: 10px;
            margin: 0 5px 5px;

            font-size: 12px;

            color: #ffffff;
            background: #64c1b6;
            border-left: 5px solid #129a8a;
            display:none;
        }
        .vue-notification.warn {
            background: #ffb648;
            border-left-color: #f48a06;
        }
        .vue-notification.error {
            background: #E54D42;
            border-left-color: #B82E24;
        }
        .vue-notification.success {
            background: #68CD86;
            border-left-color: #42A85F;
        }

    </style>

<!-- Html5 Shim and Respond.js IE8 support of Html5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    {{--	{!! Html::script('/assets/admin/js/ie.min.js') !!}--}}

</head>
<body class="fix-sidebar rmv-right-panel content-wrprojecter">
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<div id="wrprojecter">






    <div class="myClass" id="mainAppContainer">
        <main-menu></main-menu>
        <app-header></app-header>
        <router-view></router-view>

    </div>

</div>
<!-- /#wrprojecter -->

@section('script')
    <!-- jQuery -->
    {!! Html::script('/js/vue_translation/'.session('locale').'.js') !!}


    <script >

    </script>



    <script>
        function notification(vieReference,data){

            if (typeof data === 'string'){
                data={
                    'title':'notification',
                    'text':data,
                    'link':'#',


                };
            }

            vieReference.$notify({
                group: 'main_notification',
                title: data.title,
                duration:6000,
                text: data.text,
                link:data.link,
            });
        }
    </script>

    {!! Html::script('/assets/admin/plugins/bower_components/jquery/dist/jquery.min.js') !!}

    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('/assets/admin/bootstrap/dist/js/bootstrap.min.js') !!}

    <!--slimscroll JavaScript -->
    {!! Html::script('/assets/admin/js/jquery.slimscroll.js') !!}
    <!--Wave Effects -->
    {!! Html::script('/assets/admin/js/waves.js') !!}
    <!-- Custom Theme JavaScript -->
    {!! Html::script('/assets/admin/js/custom.min.js') !!}
    <!-- jQuery peity -->
    {!! Html::script('/assets/admin/plugins/bower_components/tablesaw-master/dist/tablesaw.js') !!}
    {!! Html::script('/assets/admin/plugins/bower_components/tablesaw-master/dist/tablesaw-init.js') !!}
    <!--Style Switcher -->
    {!! Html::script('/assets/admin/plugins/bower_components/styleswitcher/jQuery.style.switcher.js') !!}
    <!--Date PICKER -->
    {!! Html::script('/assets/admin/plugins/bower_components/moment/moment.js') !!}
    {!! Html::script('/assets/admin/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js') !!}
    {!! Html::script('/assets/admin/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') !!}
    {!! Html::script('/assets/admin/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js') !!}

    <script>
        var options = {
            format: "yyyy-mm-dd",
            todayBtn: "linked",
            orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
        }

        $('.mydatepicker, #datepicker').datepicker(options);
        $('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true,
        });

        $('.myclockpicker, #clockpicker').clockpicker({
            placement: 'bottom',
            align: 'left',
            autoclose: true,
            'default': 'now'

        });

        $('#date-range').datepicker({
            toggleActive: true
        });
        $('#datepicker-inline').datepicker({
            todayHighlight: true
        });































        $('.clockpicker').clockpicker({
            donetext: 'Done',

        })
            .find('input').change(function(){

        });




        $('#all-groups-chx').change(function () {
            if ($('#all-groups-chx').prop('checked')) {
                $('#all-groups-slc').attr('disabled', 'disabled');
            } else {
                $('#all-groups-slc').removeAttr('disabled');
            }
        });

        $('#all-symbols-chx').change(function () {
            if ($('#all-symbols-chx').prop('checked')) {
                $('#all-symbols-slc').attr('disabled', 'disabled');
            } else {
                $('#all-symbols-slc').removeAttr('disabled');
            }
        });

        if ($('#all-groups-chx').prop('checked')) {
            $('#all-groups-slc').attr('disabled', 'disabled');
        } else {
            $('#all-groups-slc').removeAttr('disabled');
        }

        if ($('#all-symbols-chx').prop('checked')) {
            $('#all-symbols-slc').attr('disabled', 'disabled');
        } else {
            $('#all-symbols-slc').removeAttr('disabled');
        }


        $('#exactLogin').change(function () {
            if ($('#exactLogin').prop('checked')) {
                $("#from_login_li,#to_login_li").hide();
                $("#login_li").show();
            } else {
                $("#from_login_li,#to_login_li").show();
                $("#login_li").hide();
            }
        });

        if ($('#exactLogin').prop('checked')) {
            $("#from_login_li,#to_login_li").hide();
            $("#login_li").show();
        } else {
            $("#from_login_li,#to_login_li").show();
            $("#login_li").hide();
        }
        $(document).ready(function(){

            if($('.right-side-panel').length == 0){
                $('.right-side-toggle').hide();
            }

        });


        function changeSelectedView(selectId,viewStartId,selectName){
            var selectedValue=$('#'+selectId).val();
            $('.'+viewStartId).hide();
            $('#'+viewStartId+selectedValue).show();


            $('.'+viewStartId+' select').attr('name','');
            $('#'+viewStartId+selectedValue+' select').attr('name',selectName);

        }

        $('.longHtmlContainer').click(function(){$(this).removeClass('longHtmlContainer');});



        $('.deleteRow').click(function(){
            if(!confirm('{{trans('general.deleteConfirmMessage')}}')){
                event.preventDefault();
            }

        });
    </script>






    <script src="/js/app.js"></script>
    <script>

        jQuery.fn.load = function(callback){ $(window).on("load", callback) };
    </script>
@show

<style type="text/css">
    /*.right-side-panel{display: none;}*/
    .longHtmlContainer{height:30px;overflow: hidden;}
    .menu-search,.app-search {display:none;}
</style>
</body>
</html>