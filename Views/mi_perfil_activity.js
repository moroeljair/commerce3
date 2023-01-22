$(document).ready(function(){

    var funcion="";
    llenar_historial();

    function llenar_historial(){
        funcion="llenar_historial";
        $.post('../Controllers/HistorialController.php',{funcion},(response) =>{
            let historiales = JSON.parse(response);
            let template="";
            //console.log(historiales);
            historiales.forEach(historial => {
                console.log(historial);
                template+=`
                      <div class="time-label">
                        <span class="bg-danger">
                          ${historial[0].fecha}
                        </span>
                      </div>
                      `;
                historial.forEach(cambio =>{
                    console.log('cambio '+cambio.descripcion);
                    template+=`
                    <div>
                        ${cambio.m_icono}
                        
                        <div class="timeline-item">
                            <span class="time"><i class="far fa-clock"></i> ${cambio.hora}</span>

                            <h3 class="timeline-header"><a href="#">${cambio.modulo}</a> ${cambio.th_icono} ${cambio.tipo_historial} </h3>

                            <div class="timeline-body">
                                ${cambio.descripcion}
                            </div>
                            <div class="timeline-footer">
                               
                            </div>
                        </div>
                    </div>
                    `;
                });  
                
            });
            
            $('#historiales').html(template);
        });
    }

});