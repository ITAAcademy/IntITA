/**
 * Created by Ivanna on 11.05.2015.
 */
function wrt(x)
{
    $(".razv").html(x);
}

function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

function checkShowingBlockInCourse() {
    var blockStatus = getCookie('displayBlock');
    if(blockStatus=='false'){
        $('.bgBlue').hide();
    }
}
checkShowingBlockInCourse();

function xexx()
{
    $('.bgBlue').hide();
    document.cookie = "displayBlock=false;expires=0;";
}
function courseTypeSpoiler(el) {
    if ($('#typeList').css('display')=='none') {
        $('#trg').text("\u25B2");
    }
    if($('#typeList').css('display')=='block'){
        $('#trg').text("\u25BC");
    }
    $('#typeList').toggle('normal');
    return false;
};