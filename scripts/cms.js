console.log('cms start');

var content = document.getElementById("page-wrapper");
if(content != null){
    $jq("#save").click(function(){
        $jq.ajax({
            method: "POST",
            url: basePath + '/_teacher/_admin/cms/generatePage',
            dataType : 'html',
            data: {data: content.innerHTML}
        })
    });
}

