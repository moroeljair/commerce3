$(document).ready(function(){

    var funcion="";
    //llenar_historial();
    llenar_historial_compras();

    function llenar_historial(){
        funcion="llenar_historial";
        $.post('../Controllers/HistorialController.php',{funcion},(response) =>{
            let historiales = JSON.parse(response);
            let template="";
            //console.log(historiales);
            historiales.forEach(historial => {
                //console.log(historial);
                template+=`
                      <div class="time-label">
                        <span class="bg-danger">
                          ${historial[0].fecha}
                        </span>
                      </div>
                      `;
                historial.forEach(cambio =>{
                    //console.log('cambio '+cambio.descripcion);
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

    function llenar_historial_compras(){
        funcion="llenar_historial_compras";
        $.post('../Controllers/HistorialController.php',{funcion},(response) =>{
            let historiales = JSON.parse(response);
            let template="";
            //console.log(historiales);
            historiales.forEach(historial => {
                //console.log(historial);
                template+=`
                      <div class="time-label">
                        <span class="bg-danger">
                          ${historial[0].fecha}
                        </span>
                      </div>
                      <table class="table">
                        <tbody>
                      `;
                let indice=1;
                historial.forEach(item =>{
                    //console.log('cambio '+cambio.descripcion);
                    template+=`
                            <tr>
                            <th scope="row">${indice}</th>
                            <td>${item.nombre}</td>
                            <td>${item.cantidad}</td>
                            <td>${item.precio}</td>
                            </tr>
                    `;
                    indice+=1;
                }); 
                template+=`
                <tr>
                    <th scope="row"></th>
                    <td><b></b></td>
                    <td></td>
                    <td><b>${historial[0].total}</b></td>
                <tr>
                </tbody>
                </table>`;
            });
            
            $('#historiales_compras').html(template);
        });
    }

});