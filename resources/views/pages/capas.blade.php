@extends('../layout/' . $layout)

@section('subhead')
    <title>Reporte de capas </title>
    
@endsection

@section('menumobil')
    @include('../layout/components/mobile-menu')
@endsection

@section('menulateral')
@include('../layout/menu')
@endsection

@section('subcontent')
<link rel="stylesheet" href="dist/css/cargando.css">
    <div class="card-header py-6 " style="text-align: center;">
        <h4 class="card-title"><b> REPORTE DE CAPAS</b></h4>
    </div>

    <div id="contenedor_carga">
        <div id="carga"></div>
</div>

<div class="tableFixHead1 box">
    <div class="row g-4 mx-2 px-5 py-3">
        <form action="#">
            <label for="lang"></label>
            <!-- <select class="load" name="lenguajes" id="load" onchange="buscar(this.value)" estado="0" onclick="muestraLoad(this.estado)"> -->
                <select class="load" name="lenguajes" id="load" onchange="buscar(this.value)" estado="0">
                <option value="" disabled>Selecciona capa</option>
              <option value="1">CAPA 1</option>
              <option value="2">CAPA 2</option>
              <option value="3">CAPA 3</option>
              <option value="4">CAPA 4</option>
              <option value="5">CAPA 5</option>
            </select>
      </form>       
      <div class="col-auto">
        <label for="campo" class="col-form-label">Buscar: </label>
    </div>
    <div class="input-group">
        <input id="searchTerm" type="text" class="form-control">
        <span class="input-group-btn">
          <button id="" class="btn btn-primary" type="button" onclick="doSearch()" > 
            Buscar<span class="fa fa-eye-slash icon"></span>
          </button>
        </span>
      </div>
    <!-- <div class="col-auto">
        <input type="text" name="campo" id="searchTerm" class="form-control" onkeyup="doSearch()" >
        <button id="show_password" class="btn btn-success" type="button" onclick=""> 
    </div>    -->
     
    
<div class=" box ">
    <table class="table  table-report" id="datos"  style="font-size:70% ">
                    <thead id="cabecera">
                    <tr>
                    <th class="text-center ">Capas</th>
                    <th class="text-center ">Proveedor</th>
                    <th class="text-center ">Num</th>
                    <th class="text-center ">Comprador</th>
                    <th class="text-center ">Clas</th>
                    <th class="text-center ">Codigo</th>
                    <th class="text-center ">Descripción</th>
                    <th class="text-center ">Presentación</th>
                    <th class="text-center ">VtaMens</th>
                    <th class="text-center ">VtaProm</th>
                    <th class="text-center ">Existencia</th>
                    <th class="text-center ">BackOrder</th>
                    <th class="text-center ">VtaNeta$</th>
                    <th class="text-center ">VtaProm$</th>
                    <th class="text-center ">ValorInv$</th>
                    <th class="text-center ">DiasInv</th>
                    <th class="text-center ">Cto_Prom</th>
                    <th class="text-center ">Cto_Cat</th>
                    <th class="text-center ">Capa</th>
                    <th class="text-center ">UltimaEnt</th>
                    <th class="text-center ">DiasTrans</th>
                    <th class="text-center ">Alm</th>
                    <th class="text-center ">Compra</th>
                    </tr>
                    <tr class="totales" id="totales">
                        <td>TOTALES</td>
                        <td></td>
                        <td id="tNum" class="text-center py-0"> </td>
                        <td></td>
                        <td></td>
                        <th></td>
                        <td> </td>
                        <td> </td>
                        <td id="tVtaMens" class="text-center py-0"> </td>
                        <td id="tVtaProm" class="text-center py-0"> </td>
                        <td id="tExistencia" class="text-center py-0"> </td>
                        <td id="tBackOrder" class="text-center py-0"></td>
                        <td id="tVtaNeta" class="text-center py-0"></td>
                        <td id="tVtaProm1" class="text-center py-0"></td>
                        <td id="tValorInv" class="text-center py-0"></td>
                        <td id="tDiasInv" class="text-center py-0"> </td>
                        <td id="tCto_Prom" class="text-center py-0"> </td>
                        <td id="tCto_CaT" class="text-center py-0"> </td>
                        <td id="" class="text-center py-0"> </td>
                        <td id="" class="text-center py-0"> </td>
                        <td></td>
                        <td></td>
                    </tr>
                    </thead>
                    
                        <tbody id="filas">
                            <?php
                            while ($datos = current($array)) {
                                    echo '<td class="sammy-nowrap py-0">';echo $datos['Capas']; echo '</td>';
                                    echo '<td class="sammy-nowrap py-0">';echo $datos['Proveedor']; echo '</td>';
                                    
                                    echo '<td class="text-center py-0">';echo $datos['Num']; echo '</td>';
                                    echo '<td class="sammy-nowrap py-0">';echo $datos['Comprador']; echo '</td>';
                                    echo '<td class="text-center py-0">';echo $datos['Clas']; echo '</td>';
                                    echo '<td class="text-center py-0">';echo $datos['Codigo']; echo '</td>';
                                    echo '<td class="sammy-nowrap py-0">';echo $datos['Descripcion']; echo '</td>';
                                    echo '<td class="text-center py-0">';echo $datos['Presentacion']; echo '</td>';
                                    echo '<td class="text-center py-0">';echo round($datos['VtaMens']); echo '</td>';
                                    echo '<td class="text-center py-0">';echo round($datos['VtaProm']); echo '</td>';
                                    echo '<td class="text-center py-0">';echo round($datos['Existencia']); echo '</td>';
                                    echo '<td class="text-center py-0">';echo round($datos['BackOrder']); echo '</td>';
                                    echo '<td class="text-center py-0">';echo round($datos['VtaNeta$']); echo '</td>';
                                    echo '<td class="text-center py-0">';echo round($datos['VtaProm$']); echo '</td>';
                                    echo '<td class="text-center py-0">';echo round($datos['ValorInv$']); echo '</td>';
                                    echo '<td class="text-center py-0">';echo round($datos['DiasInv']); echo '</td>';
                                    echo '<td class="text-center py-0">';echo round($datos['Cto_Prom']); echo '</td>';
                                    echo '<td class="text-center py-0">';echo round($datos['Cto_Catalogo']); echo '</td>';
                                    echo '<td class="text-center py-0">';echo $datos['Capa']; echo '</td>';
                                    echo '<td class="text-center py-0">';echo $datos['UltimaEnt']; echo '</td>';
                                    echo '<td class="text-center py-0">';echo $datos['DiasTrans']; echo '</td>';
                                    echo '<td class="text-center py-0">';echo $datos['Alm']; echo '</td>';
                                    echo '<td class="text-center py-0">';echo $datos['Compra']; echo '</td>';
                                    echo '</tr>';
                                    next($array);
                                   
                                    }
                                   
                            ?>
                    <tr class="" id="">
                        <th></th>
                        <th></th>
                        <th id="tNum1" class="text-center py-0"> </th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th> </th>
                        <th> </th>
                        <th id="tVtaMens1" class="text-center py-0"> </th>
                        <th id="tVtaProm1" class="text-center py-0"> </th>
                        <th id="tExistencia1" class="text-center py-0"> </th>
                        <th id="tBackOrder1" class="text-center py-0"></th>
                        <th id="tVtaNeta1" class="text-center py-0"></th>
                        <th id="tVtaProm11" class="text-center py-0"></th>
                        <th id="tValorInv1" class="text-center py-0"></th>
                        <th id="tDiasInv1" class="text-center py-0"> </th>
                        <th id="tCto_Prom1" class="text-center py-0"> </th>
                        <th id="tCto_CaT1" class="text-center py-0"> </th>
                        <th id="" class="text-center py-0"> </th>
                        <th id="" class="text-center py-0"> </th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr class='noSearch hide'>
                        <td colspan="5"></td>

                    </tr>
                    <tr >
                        <td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td >
                        <td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td></td><td ></td>
                    </tr>
                    <tr >
                        <td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td >
                        <td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td></td><td ></td>
                    </tr>
                    <tr >
                        <td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td >
                        <td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td></td><td ></td>
                    </tr>
                    
                    
                        </tbody>
                </table>
                </div>
        </div>

        

<script type="text/javascript">
                var array = {{Js::from($array)}};
                var contenedor = document.getElementById("contenedor_carga");
                contenedor.style.visibility = 'visible';
                contenedor.style.opacity = '1';
                const th=document.getElementsByTagName("th");
               
        window.addEventListener("load", function(){
            console.log(array.length)
             for(let i=0; i<th.length; i++){
                th[i].addEventListener("click",headerclicken);
            }  
            ocultaLoad();
            sumaTotales();
            
        });

        function ocultaLoad(){
            var contenedor = document.getElementById("contenedor_carga");
            contenedor.style.visibility = 'hidden';
            contenedor.style.opacity = '0';
            $('.load').attr("estado","0")
        }

       
        function sumaTotales() {
            var tNum=0;
            var tVtaMens=0;
            var tVtaProm=0;
            var tExistencia=0;
            var tBackOrder=0;
            var tVtaNeta=0;
            var tVtaProm1=0;
            var tValorInv=0;
            
            var tDiasInv=0;
            var tCto_Prom=0;
            var tCto_CaT=0;
            //console.log(array.length)
            for (let i = 0; i < array.length; i++) {
                console.log(array[i]['Num'])
                 tNum += (Number(array[i]['Num']));
                 tVtaMens += (Number(array[i]['VtaMens']));
                 tVtaProm += (Number(array[i]['VtaProm']));
                 tExistencia +=(Number(array[i]['Existencia']));
                 tBackOrder += (Number(array[i]['BackOrder']));
                 tVtaNeta += (Number(array[i]['VtaNeta$']));
                 tVtaProm1 += (Number(array[i]['VtaProm$']));
                 tValorInv += (Number(array[i]['ValorInv$']));
                
                 tDiasInv += (Number(array[i]['DiasInv']));
                 tCto_Prom += (Number(array[i]['Cto_Prom']));
                 tCto_CaT += (Number(array[i]['Cto_Catalogo']));
            }
            //console.log(totFac);
            document.getElementById("tNum").innerHTML = separator(tNum.toFixed(2));
            document.getElementById("tVtaMens").innerHTML = separator(tVtaMens.toFixed(2));
            document.getElementById("tVtaProm").innerHTML = separator(tVtaProm.toFixed(2));
            document.getElementById("tExistencia").innerHTML = separator(tExistencia.toFixed(2));
            document.getElementById("tBackOrder").innerHTML = separator(tBackOrder.toFixed(2));
            document.getElementById("tVtaNeta").innerHTML = separator(tVtaNeta.toFixed(2));
            document.getElementById("tVtaProm1").innerHTML = separator(tVtaProm1.toFixed(2));
            document.getElementById("tValorInv").innerHTML = separator(tValorInv.toFixed(2));
            document.getElementById("tDiasInv").innerHTML = separator(tDiasInv.toFixed(2));
            document.getElementById("tCto_Prom").innerHTML = separator(tCto_Prom.toFixed(2));
            document.getElementById("tCto_CaT").innerHTML = separator(tCto_CaT.toFixed(2));

        }
        

         function headerclicken(e){
            const sortcolumn = e.target.cellIndex !== undefined ? e.target.cellIndex : e.target.parentNode.cellIndex;
            sorteableColumn(sortcolumn);
        }
        var lastCol=-1;
        
        function sorteableColumn(sortcolumn){
            const tableBody= document.getElementById("filas");
            
            const rows = Array.from(tableBody.rows);

                    var sortedRows=rows.sort(function(a, b) {
                        
                        try {
                            const valor1= a.cells[sortcolumn].innerHTML;
                            //console.log("a="+a.cells[sortcolumn].innerText);

                            const valor2= b.cells[sortcolumn].innerHTML;
                            //console.log("b="+ b.cells[sortcolumn].innerText);
                            return valor1 < valor2 ? -1 : valor1 > valor2 ? 1 : 0;
                        
                        } catch (error) {
                        console.error(error);
                        
                        }
                    }); 

                    if (lastCol==sortcolumn) {
                        rows.reverse();
                        
                        lastCol=-1;
                    } else {
                        lastCol=sortcolumn;
                    }

                    tableBody.innerHTML="";
                    sortedRows.forEach(row =>{
                        tableBody.appendChild(row);
                        
                    });
        } 
        function separator(numb) {
    var str = numb.toString().split(".");
    str[0] = str[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return str.join(".");
}

function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}
async function buscar(value){

    if( $('.load').attr("estado")==0){

        var contenedor1 = document.getElementById("contenedor_carga");
                contenedor1.style.visibility = 'visible';
                contenedor1.style.opacity = '1';
                // $('.load').css('visibility','collapse');
                $('.load').attr("estado","1")
                console.log("antes de dormir 3 segundo ")
                await sleep(2000);
                console.log("despues de dormir 3 segundo ")
            }
    //ocultaLoad();
    const tableReg = document.getElementById('filas');

            const searchText = value;

            let total = 0;
            // Recorremos todas las filas con contenido de la tabla
            for (let i = 0; i < tableReg.rows.length; i++) {
                //console.log(tableReg.rows[i])
                // Si el td tiene la clase "noSearch" no se busca en su cntenido
                if (tableReg.rows[i].classList.contains("noSearch")) {
                    console.log("entra condicion si tiene la calse noSearch")
                    
                    continue;
                   
                }
                //console.log(tableReg.rows[i].getElementsByTagName('td'))
                let found = false;
                const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                // Recorremos todas las celdas
                for (let j = 0; j < cellsOfRow.length && !found; j++) {
                    

                    const compareWith = cellsOfRow[18].innerHTML;
                    // Buscamos el texto en el contenido de la celda
                    if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                        found = true;
                        total++;
                    }
                }
                if (found) {
                    tableReg.rows[i].style.visibility = 'visible';
                    //tableReg.rows[i].style.display = '';
                    
                } else {
                    // si no ha encontrado ninguna coincidencia, esconde la
                    // fila de la tabla
                    tableReg.rows[i].style.visibility = 'collapse';
                    //tableReg.rows[i].style.display = 'none';
                }

            }
            
            
            // mostramos las coincidencias

            const lastTR=tableReg.rows[tableReg.rows.length-1];

            const td=lastTR.querySelector("td");

            lastTR.classList.remove("hide", "red");
            
            if (searchText == "") {

                lastTR.classList.add("hide");

            } else if (total) {
                
                td.innerHTML="Se ha encontrado "+total+" coincidencia"+((total>1)?"s":"");

            } else {

                lastTR.classList.add("red");

                td.innerHTML="No se han encontrado coincidencias";

            }
            if( $('.load').attr("estado")==1){
            var contenedor = document.getElementById("contenedor_carga");
            contenedor.style.visibility = 'hidden';
            contenedor.style.opacity = '0';
            $('.load').attr("estado","0")
        }
    
}

</script>
  
@endsection
 


<style>
    body {
	margin: 0;
  overflow-Y: hidden; /*quitar el scroll*/
}
    tr.noSearch {background:White;font-size:0.8em;}
        
        tr.noSearch td {padding-top:10px;text-align:right;}
        
        .hide {display:none;}
        
        .red {color:Red;}
            .sammy-nowrap-1 {
            max-width: 200px;
            padding: 0px;
            margin-bottom: .4em;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        
        }
/* JUST COMMON TABLE STYLES... */
table { border-collapse: collapse; width: 100%; }
th, td { background: #fff; padding: 8px 16px; }


.tableFixHead1 thead th {
  position: sticky;
  top: 0;
}

.totales {
  position: sticky;
  top: 525;
}


.sammy-nowrap {
      max-width: 180px;
      padding: 0px;
      margin-bottom: .4em;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
  
  }
  .table td {
border-bottom-width: 1px;
padding-right: 0 !important;
padding-top: 0 !important;
padding-bottom: 0 !important;
padding: 1;
  }
  
  .tableFixHead1{
height: 550px;
width:100%;
word-wrap: break-word;
overflow: auto;
}

select {
        margin-bottom: 10px;
        margin-top: 10px;
        font-family: cursive, sans-serif;
        outline: 0;
        background: #2ecc71;
        color: #fff;
        border: 1px solid crimson;
        padding: 4px;
        border-radius: 9px;
      }


</style>
         
