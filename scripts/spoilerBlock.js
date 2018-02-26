/**
 * Created by Ivanna on 11.05.2015.
 */
/**
 * Created by Ivanna on 08.05.2015.
 * */
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