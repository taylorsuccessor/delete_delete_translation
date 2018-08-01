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





   @include('admin.layout::partial.header')
    @include('admin.layout::partial.menu')

    @yield('content')

</div>
<!-- /#wrprojecter -->

@section('script')
        <!-- jQuery -->
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
                console.log(this.value);
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

<script src="{{ asset('/assets/admin/ckeditor/ckeditor.js') }}"></script>
<script>
    //CKEDITOR.replace( textarea );
    if($('#editor1').length){
    CKEDITOR.replace('editor1', {
        filebrowserBrowseUrl: "  route('common.files.browser') }}",
        filebrowserUploadUrl: " route('common.files.upload' ).'?_token='. csrf_token() }}"
    });
    }

    if($('#editor2').length) {
        CKEDITOR.replace('editor2', {
            filebrowserBrowseUrl: "  route('common.files.browser') }}",
            filebrowserUploadUrl: " route('common.files.upload' ).'?_token='. csrf_token() }}"
        });
    }

    if($('#editor3').length) {
        CKEDITOR.replace('editor3', {
            filebrowserBrowseUrl: "  route('common.files.browser') }}",
            filebrowserUploadUrl: " route('common.files.upload' ).'?_token='. csrf_token() }}"
        });
    }
</script>
<script>
    function openUploadWindow(targetInput){

        window.open("route('common.files.fileInputPopup') }}?fileInputSelector="+targetInput, "Upload File", "width=1000,height=700");
    }

    $('.uploadFile').click(function(){
        openUploadWindow($(this).attr('name'));
    });
</script>

<script>
    /*
    $('.side-mini-panel').mouseout(function(){
    $('body').attr('class','fix-sidebar content-wrprojecter content-wrapper rmv-right-panel');
        $('.side-mini-panel .selected').removeClass('selected');
$('#togglebtn').hide();
    });
    */

</script>


        <!-- receive notifications -->
        <script src="{{ asset('js/echo.js') }}"></script>

        <script src="https://js.pusher.com/4.1/pusher.min.js"></script>

        <script>
            Pusher.logToConsole = true;

            window.Echo = new Echo({
                broadcaster: 'pusher',
                key: '14ecf6b9699bbc09a4f2',
                cluster: 'ap2',
                encrypted: true,
                logToConsole: true
            });

            Echo.private('App.User.{{\Auth::user()->id}}')
                .listen('.App\\module\\car\\event\\Create', (e) => {
                console.log(e.model.email);

            });


            Echo.private('admin.channel')
                .listen('.App\\module\\car\\event\\Create', (e) => {
                alert(e.model.email);

            });
        </script>
        <!-- receive notifications -->
@show

<style type="text/css">
    /*.right-side-panel{display: none;}*/
    .longHtmlContainer{height:30px;overflow: hidden;}
    .menu-search,.app-search {display:none;}
</style>
</body>
</html>