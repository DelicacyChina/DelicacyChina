$(function(){
    $('.multiselect').each(function () {
        $(this).mouseover(function(){
            $(this).find('ul').attr('style','display:block')
        })
        $(this).find('ul').change(function(){
            $(this).prev().html($(this).find('input[type=radio]:checked').val())
        })
        $(this).mouseout(function(){
            $(this).find('ul').attr('style','display:none')
        })
    })

    // 调料
    $('blockquote').on('click','.yongliang',function(e){
        if($(this).attr('autocomplete')=='off'){
            var data = {id:1};
            $('#J_addDiv').tmpl(data). insertAfter($(this).parent()[0]);
            if($(this).parent().parent().attr('class')=='Right'){
                $(this).parent().next().children().eq(0).attr('name','food3[]')
                $(this).parent().next().children().eq(1).attr('name','food4[]')
            }
            $(this).attr('autocomplete','on');
        }
    })
    $('blockquote').on('click','.J_delete',function(){
        $(this).parent().prev().find('.yongliang').attr('autocomplete','off');
        $(this).parent().remove();
    })

    //  步骤
    $('#dragsort').on('click','.J_addTextarea',function(){
        var num = parseInt($(this).parent().find('.J_step_num').html());
        var data = {num:num}
        $('#J_addStep').tmpl(data).insertAfter($(this).parent().parent()[0]);
        // 设置父节点的后面兄弟节点加1
        $(this).parent().parent().nextAll().each(function(){
            var num = parseInt($(this).find('.J_step_num').html());
            $(this).find('.J_fileImag').attr('id','J_upload_'+num)
            $(this).find('input[type=file]').attr('id','userfile_'+num).attr('name','file'+num)
            $(this).find('.J_input').attr('name','note[]')
            num++;
            $(this).find('.J_step_num').html(num+'、');
        })
    })
    $('#dragsort').on('click','.J_delTextarea',function(){
        // 设置父节点的后面兄弟节点加1
        $(this).parent().parent().nextAll().each(function(){
            var num = parseInt($(this).find('.J_step_num').html());
            num--;
            $(this).find('.J_step_num').html(num+'、');
            num--;
            $(this).find('.J_fileImag').attr('id','J_upload_'+num)
            $(this).find('input[type=file]').attr('id','userfile_'+num).attr('name','file'+num)
            $(this).find('.J_input').attr('name','note[]')
        })
        $(this).parent().parent().remove();
    })

    // 上传文件
    $('#dragsort').on('click','.J_fileImag',function(){
        return
    })
    $('#J_upload_0').click(function(){
        return $('#previewImage').click();
    })
})