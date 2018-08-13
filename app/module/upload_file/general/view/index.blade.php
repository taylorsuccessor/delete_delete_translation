
<div class="uploadFileContainerDiv borderBox">
    <div class="uploadedFilePreview">
        <div class="ResultMessageBox">
            @include('admin.layout::partial.messages')
        </div>

            <span class="overText">+</span>

    </div>
    {!! Form::model($request,['url' => '/general/upload_file', 'class' => 'form-horizontal','id'=>'uploadFileForm','files' => true]) !!}

    {!! Form::file('upload_file', ['class' => 'form-control','onChange'=>'submitForm();']) !!}
    {!! Form::hidden('upload_group_id', null) !!}
    {!! Form::hidden('name', null) !!}
    {!! Form::hidden('template', null) !!}

    {!! Form::close() !!}
</div>


@if (count($oResults))
    @foreach($oResults as $oResult)



        <div class="oneImageListPreviewContainer borderBox">
       <img src="{{  $oResult->file_icon_image }}"  />

        {!! Form::open(['method' => 'DELETE','url' => ['/general/upload_file',$oResult->id]]) !!}
        {!! Form::hidden('upload_group_id', null) !!}
        {!! Form::hidden('template', null) !!}
        <button type="submit" name="delete" class="deleteRow" >
            x
        </button>
        {!! Form::close() !!}
        </div>
    @endforeach
@endif

<script>

    @if(isset($request->upload_group_id))
    window.parent.document.querySelector('input[name=upload_group_id]').value= {{$request->upload_group_id}};
    @endif

    function submitForm(){
        setNameFromFile();

        document.querySelector('#uploadFileForm').submit();

    }

    function setNameFromFile(){
        var filePath=document.querySelector('input[name=upload_file]').value;
        var fileNameWithExtention=filePath.split('\\').pop().split('/').pop();
        var fileName=fileNameWithExtention.split('.')[0];
        document.querySelector('input[name=name]').value=fileName;
    }
</script>


<style type="text/css">
    .borderBox {
border:1px solid #bbb;

        margin:5px 5px;
    }
    .uploadFileContainerDiv{
        float:left;
        width:100px;height:100px;overflow:  hidden;position:relative;



    }
    .uploadFileContainerDiv  .uploadedFilePreview{

        font-family: sans-serif;
        width:100%;height:100%;background:#ffffff;font-size:30px;text-align:center;
    }

    .uploadFileContainerDiv input[type=file]{

        top:0px;
        left:0px;
        padding: 150%;
        position:  absolute;
        background-color: rgba(0,0,0,0.1);
        outline:none;
    }
    .previewUploadedImage{

        display:block;
        margin:auto;
        max-width:100%;
        height:auto;
    }
    .overText{
        margin-top:50px;
        font-size: 58px;
    }
    .ResultMessageBox{
        position: absolute;
        top:0px;
        left:0px;
        text-align: center;
        width:100%;
        overflow: hidden;
        font-size: 8px;
        color:#62c0b5;

    }

    .oneImageListPreviewContainer{
        float:left;
        display:block;
        width:100px;
        height:100px;
        position:relative;

    }
    .oneImageListPreviewContainer img{

        width:100px;
        height:100px;
        position:absolute;
        top:0px;
        left: 0px;

    }

    .oneImageListPreviewContainer button[name=delete]{
border:none;
        position:absolute;
        top:0px;
        left: 0px;
        background-color:rgba(255,255,255,0.4);
        color:#62c0b5;
        text-align: center;

    }
</style>