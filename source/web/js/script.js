$(document).ready(function () {
    
    // Deshabilitar controles tipo submit tras el envio del formulario
    $("body").on("submit", "form", function() {
        input = $(":submit", this);
        input.attr('disabled', true);
    });
    
    // Funcionalidad generica para los botones para eliminacion de registros
    $(".btn-delete").on("click", function(e) {
        e.preventDefault();
        
        var parent = $(this).parent().parent();        
        
        if(confirm('¿Esta seguro de eliminar este elemento?\n ¡No se podrá recuperar!'))
        {
            var href = $(this).attr('href');
            $.ajax({
                type: "POST",
                url: href,
                dataType: "json",
                success: function (response){
                    if(response.status === "success"){
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

