$(document).ready(function(){
    console.log(location.origin+'/admin/Ajax.php');
    const base_url = location.origin+'/';
    var get_result_form = $('.result-form');
    
    
    get_result_form.submit(function(r){
        r.preventDefault();
        
        var data = $(this).serialize();
        var submitBtn = $(this).find('button'),
            btnHtml = $(submitBtn).html();
        
           
        $.ajax({
            type : 'POST',
            url : base_url +'admin/Ajax.php',
            data : data+'&status=get-student-result',
            dataType :'json',
            beforeSend : function(){
                 $(submitBtn).html('<i class="fa fa-spin fa-spinner"></i> Please Wait...').prop('disabled',true);
            },
            success : function(res){
                console.log(res);
                if(res.status){
                    if(res.marksheet_url){
                        location.href = res.marksheet_url;
                    }
                    else{
                        // $.confirm({
                        //     title : 'List of Result(s)',
                        //     icon : 'fa fa-file',
                        //     content : res.marksheet_html
                        // });
                        $('.result-view').html(res.html);
                    }
                }
                else{
                    $('.result-view').html(res.html);
                }
                
                
                $(submitBtn).html(btnHtml).prop('disabled',false);
            },
            error : function(a,v,x){
                console.warn(a.responseText);
                 $(submitBtn).html(btnHtml).prop('disabled',false);
            }
        });
        
        
    });
    
    
});