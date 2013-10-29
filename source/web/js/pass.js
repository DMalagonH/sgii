var minLength = 6, nivelPass = 0, maxNivelPass = 6;
    
function validatePass(pass)
{
    nivelPass = 0;

    if(pass.length >= minLength)
    {
        nivelPass += 1;
        if(pass.match('[a-z]') && pass.match('[A-Z]'))
        {
            nivelPass += 1;
//                alert('MAYUSCULAS');
        }
        if(pass.match('[0-9]') && (pass.match('[a-z]') || pass.match('[A-Z]')))
        {
            nivelPass += 1;
//                alert('numeros');
        }
        if(pass.match('[`,´,~,!,@,#,$,&,%, ,^,(,),+,=,{,},[,\\],|,-,_,/,*,$,=,°,¡,?,¿,\\,/,,.,;,:,",\',<,>]') && (pass.match('[a-z]') || pass.match('[A-Z]')))
        {
            nivelPass += 1;
//                alert('car especiales');
        }
        if(pass.length >= minLength+2)
        {
            nivelPass += 1;
        }
        if(pass.length >= minLength+4)
        {
            nivelPass += 1;
        }  
    }
    else if(pass.length >= 1)
    {
        nivelPass += 0.5;
    }
    else
    {
        nivelPass += 0.05;
    }

    return nivelPass;
}


$(function(){
    
    var pass1 = $('.pass1'),
	pass2 = $('.pass2'),
	progress = $('#progress-bar-pass'),
    span_conf = $('#span_confirm');
    
        
    pass1.on('keyup', function(){
        nivelPass = validatePass(pass1.val());        
        porc = (nivelPass*100)/maxNivelPass;        
        progress.css('width', porc+'%');
        
        if(porc < 34) color = 'progress-danger';//rojo
        else if(porc >= 34 && porc < 66) color = 'progress-warning';//amarillo
        else if(porc >= 66 && porc < 90) color = 'progress-info';//verde claro
        else if(porc >= 90) color = 'progress-success';// verde oscuro
        
        progress.parent().removeClass('progress-danger');
        progress.parent().removeClass('progress-warning');
        progress.parent().removeClass('progress-info');
        progress.parent().removeClass('progress-success');
        
        progress.parent().addClass(color);
        
        if((pass1.val() != '') && (pass1.val() == pass2.val()))
        {
            span_conf.parent().removeClass('progress-danger');
            span_conf.parent().addClass('progress-success');
        }
        else
        {
            span_conf.parent().removeClass('progress-success');
            span_conf.parent().addClass('progress-danger');
        }
        
    });
   
    pass2.on('keyup', function(){
        if((pass1.val() != '') && (pass1.val() == pass2.val()))
        {
            span_conf.parent().removeClass('progress-danger');
            span_conf.parent().addClass('progress-success');
        }
        else
        {
            span_conf.parent().removeClass('progress-success');
            span_conf.parent().addClass('progress-danger');
        }
    });
});