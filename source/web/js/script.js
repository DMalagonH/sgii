$(document).ready(function () {
    
    // Deshabilitar controles tipo submit tras el envio del formulario
    $("body").on("submit", "form", function() {
        var input = $(":submit", this);
        var tagName = input.prop("tagName");
        
        if(tagName == 'BUTTON'){
            //var default_text = input.html();
            input.html("Enviando...");
        }
        else if(tagName == 'INPUT'){
            //var default_text = input.attr('value');
            input.attr('value', 'Enviando...');
        }
        
        input.attr('disabled', true);
    });
    
    // Funcionalidad generica para los botones para eliminacion de registros
    $(".btn-delete").on("click", function(e) {
        e.preventDefault();
        
        var parent = $(this).parents($(this).data('remove'));
        
        if(confirm('¿Esta seguro de eliminar este elemento?\n ¡No se podrá recuperar!'))
        {
            var href = $(this).attr('href');
            $.ajax({
                type: "POST",
                url: href,
                dataType: "json",
                success: function (response){
                    if(response.status === "success"){
                        $(".modal").modal('hide');
                        parent.remove();
                    }
                    noty({"text":response.message,"layout":"topCenter","type":response.status});
                },
                error: function() {
                    noty({"text":"Ocurrio un error al enviar la petición","layout":"topCenter","type":"error"});                    
                }
            });
        }
    });
    
    
});


