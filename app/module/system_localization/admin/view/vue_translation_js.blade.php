var translationList={!! json_encode($translationList) !!};


function translate(text){

if(typeof translationList[text] !='undefined'){
return translationList[text];
}

return text;
}