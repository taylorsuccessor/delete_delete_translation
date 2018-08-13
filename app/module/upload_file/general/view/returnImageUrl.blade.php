<?php
$imageLink=$request->image_url;
$return_to_field=$request->has('return_to_field')? $request->return_to_field:'image';
?>


<div class="uploadFileContainerDiv">
    <div class="uploadedFilePreview">
<div class="ResultMessageBox">
        @include('admin.layout::partial.messages')
    </div>
        @if (strlen($imageLink) >4)
        <img src="{{$imageLink}}" class="previewUploadedImage" />


@else
       <span class="overText">{{ trans('upload_file::upload_file.clickToUpload') }}</span>
    @endif
    </div>
{!! Form::model($request,['url' => '/general/upload_file', 'class' => 'form-horizontal','id'=>'uploadFileForm','files' => true]) !!}

{!! Form::file('upload_file', ['class' => 'form-control','onChange'=>'submitForm();']) !!}
{!! Form::hidden('upload_group_id', null) !!}
    {!! Form::hidden('name', null) !!}
    {!! Form::hidden('return_to_field', $return_to_field) !!}

{!! Form::hidden('template', null) !!}

{!! Form::close() !!}
</div>



<script>

    @if (strlen($imageLink) >4)
    window.parent.document.querySelector('input[name={{$return_to_field}}]').value= '{{$imageLink}}';
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
    .uploadFileContainerDiv{
        border:5px dashed #62c0b5;width:100%;height:100px;overflow:  hidden;position:relative;



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
        margin-top:20px;
    }
    .ResultMessageBox{
        position: absolute;
        top:0px;
        left:0px;
        text-align: center;
        width:100%;
        overflow: hidden;

    }
</style>