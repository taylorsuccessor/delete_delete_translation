<?php
return [
    'allowed_file_extension'=> ["png", "jpg", "jpeg", "gif", "bmp", "svg", "mp4",'pdf','html','docx','xlsx','pptx','txt'],
    'image_extension'=>["png", "jpg", "jpeg", "gif"],
    'extension_icon'=>
        [
            'pdf'=>'/images/file_icons/pdf.png',
            'html'=>'/images/file_icons/html.png',
            'docx'=>'/images/file_icons/docx.png',
            'xlsx'=>'/images/file_icons/xlsx.png',
            'pptx'=>'/images/file_icons/pptx.png',
            'txt'=>'/images/file_icons/txt.png',
        ],
    'upload_file_path'=>env('UPLOAD_FILE_PATH','files')
];