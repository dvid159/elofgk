$(document).ready(function(){

    cargarPanel();
    
});

function cargarPanel(){
    

    var idmateria = 0; 
    //cargar materias
    materias.forEach(element => {
   
        if(idmateria != element['id_materia']){

            var seccionMateria = 
            `<li>
                <div class="collapsible-header waves-effect principal-item"><i class="material-icons">calendar_today</i>${element['nombre_materia']}</div>
                <div class="collapsible-body">
                    <ul id="${element['id_materia']}">
                    </ul>
                </div>
            </li>`;

            $(seccionMateria).appendTo('#colapsable');
        }

        idmateria = element['id_materia'];

    });

    
    //cargar secciones
    materias.forEach(element => {
          var seccion =
          `<li><a href="/doc-alumnosxseccion/${element['id_grupo_materia']}" class="sidenav-close waves-effect secundary-item">${element['id_seccion']}</a></li>`;
          $(seccion).appendTo('#'+element['id_materia']);
    });

}