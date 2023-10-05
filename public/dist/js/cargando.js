
async function cargando() {
            
            // Loading state
            $('#carga').html('<i id="loader" data-loading-icon="oval" data-color="purple"  class=" w-40 h-40 mx-auto my-8 "></i>');
            //document.getElementById('carga').html('<i data-loading-icon="oval" data-color="white" class="w-5 h-5 mx-auto"></i>')
            tailwind.svgLoader()
            await helper.delay(1500)

}

window.addEventListener('click', function(e){

if (document.getElementById('margen').contains(e.target)){
    cargando()
} 
if (document.getElementById('diferencia').contains(e.target)){
    cargando()
} 
if (document.getElementById('botonesCapas').contains(e.target)){
    cargando()
} 

if (document.getElementById('totales').contains(e.target)){
    cargando()
} 

if (document.getElementById('presupuesto').contains(e.target)){
    cargando()
} 

 
});


