console.log('cms start');

var content = document.getElementById("cms_content_generate");
if(content != null){
    $jq("#save_cms").click(function(){
        $jq.ajax({
            method: "POST",
            url: basePath + '/_teacher/_admin/cms/generatePage',
            dataType : 'html',
            data: {data: content.innerHTML}
        })
    });
}

