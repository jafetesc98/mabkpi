@extends('../layout/' . $layout)

@section('subhead')
    <title>REPORTE DE VENTAS POR ARTICULO </title>
 
    <script src="dist/js/busqueda.js"></script>
@endsection

@section('menumobil')
    @include('../layout/components/mobile-menu')
@endsection

@section('menulateral')
@include('../layout/menu')
@endsection

@section('subcontent')
<link rel="stylesheet" href="dist/css/cargando.css">
<div id="contenedor_carga">
        <div id="carga"></div>
</div>

        <div class="card-header py-6 " style="text-align: center;">
        <h1 class="card-title"><b> REPORTE DE VENTAS POR ARTICULO Y PROVEEDOR COMPARATIVO</b></h1>
        </div>

        <div class="card-header py-2 " >
        <h6 class="card-title"><b>Proveedor: {{$array1['prov']. "   "}} Fecha inicio: {{$array1['f_ini']."    "}} Fecha fin:  {{$array1['f_fin']. "    "}} Sucursal: {{$array1['suc']}}</b></h6>
        
        </div>
        
<div class="tableFixHead1 box">
    <!-- comianza el formulario de fecha -->
    <div class="container-fluid cew-9 ">
    
    </div>
    <!-- termina el formulario de fecha -->

        <div class="row g-4 mx-2 px-5">
                <div class="col-auto">
                    <label for="campo" class="col-form-label">Buscar: </label>
                </div>
                <div class="col-auto">
                    <input type="text" name="campo" id="searchTerm" class="form-control" onkeyup="doSearch()" >
                </div>
                
        </div>
        <div  class="carga" id="carga">
        </div>  

        
<br>


        <div class=" box ">
            <table class="table" id="datos"  style="font-size:70% ">
                <thead class="">
                <tr>
                    <th class="text-center py-0" >Cant</th>
                    <th class="text-center py-0" >Comprador</th>
                    <th class="text-center py-0">Proveedor</th>
                    <th class="text-center py-0">Articulo</th>
                    <th class="text-center py-0">Descripcion</th>
                    
                    <th class="text-center py-0">ExistC</th>
                    <th class="text-center py-0">ExistM</th>
                    <th class="text-center py-0">ExistTotal</th>
                    <th class="text-center py-0">ExistCedis001</th>
                    <th class="text-center py-0">ExistCedis013</th>
                    <th class="text-center py-0">ExistCedis024</th>
                    <th class="text-center py-0">Venta_VtaANT</th>
                    <th class="text-center py-0">Venta_VtaACT</th>
                    <th class="text-center py-0">Venta_AutANT</th>
                    <th class="text-center py-0">Venta_AutACT</th>
                    <th class="text-center py-0">Uds_VtaANT</th>
                    <th class="text-center py-0">Uds_VtaACT</th>
                    <th class="text-center py-0">Uds_AutANT</th>
                    <th class="text-center py-0">Uds_AutACT</th>
                    <th class="text-center py-0">Venta_ANT</th>
                    <th class="text-center py-0">Venta_ACT</th>
                    <th class="text-center py-0">Uds_ANT</th>
                    <th class="text-center py-0">Uds_ACT</th>
                    <th class="text-center py-0">Dif</th>
                    <th class="text-center py-0">Ind</th>
                    <th class="text-center py-0">Margen</th>
                </tr>
                <tr class="totales" id="totales">
                        <td id="tcant" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td style="background-color: #d6d6d6;"></td>
                        <td style="background-color: #d6d6d6;"></td>
                        <td style="background-color: #d6d6d6;"></td>
                        <td style="background-color: #d6d6d6;"></td>
                        <td id="ExistC" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="ExistM" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="Exist" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="ExistCedis001" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="ExistCedis013" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="ExistCedis024" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="Venta_VtaANT" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="Venta_VtaACT" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="Venta_AutANT" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="Venta_AutACT" class="text-center py-0" style="background-color: #d6d6d6;"> </td>
                        <td id="Uds_VtaANT" class="text-center py-0" style="background-color: #d6d6d6;"> </td>
                        <td id="Uds_VtaACT" class="text-center py-0" style="background-color: #d6d6d6;"> </td>
                        <td id="Uds_AutANT" class="text-center py-0" style="background-color: #d6d6d6;"> </td>
                        <td id="Uds_AutACT" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="Venta_ANT" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="Venta_ACT" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="Uds_ANT" class="text-center py-0" style="background-color: #d6d6d6;"> </td>
                        <td id="Uds_ACT" class="text-center py-0" style="background-color: #d6d6d6;"> </td>
                        <td id="Dif" class="text-center py-0" style="background-color: #d6d6d6"> </td>
                        <td style="background-color: #d6d6d6;"> </td>
                        <td id="Margen" class="text-center py-0" style="background-color: #d6d6d6;"> </td>
                    </tr>
                </thead>
                <tbody id="filas" >
                @foreach($array as $key=>$res)
                    <tr >
                        <td class="text-center p-0 pt-1 pl-0">{{ $res['Cant']}}</td>
                        <td class="text-center p-0 pt-1 pl-0">{{ $res['Comprador']}}</td>
                        <td class="sammy-nowrap-1 p-0 pt-1 pl-0">{{ $res['Proveedor']}}</td>
                        <td class="text-center p-0 pt-1 pl-0">{{ $res['Articulo'] }}</td>
                        <td class="sammy-nowrap-1 p-0 pt-1 pl-0">{{ $res['Descripcion'] }}</td>
                        
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['ExistC'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['ExistM'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['ExistTotal'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['ExistCedis001'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['ExistCedis013'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['ExistCedis024'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Venta_VtaANT'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Venta_VtaACT'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Venta_AutANT'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Venta_AutACT'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Uds_VtaANT'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Uds_VtaACT'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Uds_AutANT'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Uds_AutACT'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Venta_ANT'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Venta_ACT'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Uds_ANT'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Uds_ACT'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Dif'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"> {{$res['Ind']}}</td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Margen'],2) ?></td>
                    </tr>
                @endforeach 
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


<div id="" class="container sm:px-10 py-6">
        <div class="block xl:grid grid-cols-3 gap-4">
        <div class=""></div>
          
        <div class=""  style="text-align: center;">
        <button id="btnExportar" class="btn btn-success w-33">
                <i class="fas fa-file-excel"></i> Exportar a Excel
            </button>
        </div>
    </div>

<script type="text/javascript">

                var contenedor = document.getElementById("contenedor_carga");
                contenedor.style.visibility = 'visible';
                contenedor.style.opacity = '1';


                var array = {{Js::from($array)}};
                
                //console.log( array.length)
                const th=document.getElementsByTagName("th");
        window.addEventListener("load", function(){
            console.log("inicia el load")
            for(let i=0; i<th.length; i++){
                th[i].addEventListener("click",headerclicken)
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

        function sumaTotales(){
            var tcant=0;

            var ExistC=0;
            var ExistM=0;
            var Exist=0;
            var ExistCedis001=0;
            var ExistCedis013=0;
            var ExistCedis024=0;
            var Venta_VtaANT=0;
            var Venta_VtaACT=0;
            var Venta_AutANT=0;
            var Venta_AutACT=0;
            var Uds_VtaANT=0;
            var Uds_VtaACT=0;
            var Uds_AutANT=0;
            var Uds_AutACT=0;
            var Venta_ANT=0;
            var Venta_ACT=0;
            var Uds_ANT=0;
            var Uds_ACT=0;
            var Dif=0;
            var Margen=0;
            
            for (let i = 0; i < array.length; i++) {
              //console.log(array[i]['Cant']);
                 tcant +=(Number(array[i]['Cant'])) ;
                 ExistC +=(Number(array[i]['ExistC'])) ;
                 ExistM +=(Number(array[i]['ExistM'])) ;
                 Exist +=(Number(array[i]['ExistTotal'])) ;
                 ExistCedis001 +=(Number(array[i]['ExistCedis001'])) ;
                 ExistCedis013 +=(Number(array[i]['ExistCedis013'])) ;
                 ExistCedis024 +=(Number(array[i]['ExistCedis024'])) ;
                 Venta_VtaANT +=(Number(array[i]['Venta_VtaANT'])) ;
                 Venta_VtaACT +=(Number(array[i]['Venta_VtaACT'])) ;
                 Venta_AutANT +=(Number(array[i]['Venta_AutANT'])) ;
                 Venta_AutACT +=(Number(array[i]['Venta_AutACT'])) ;
                 Uds_VtaANT +=(Number(array[i]['Uds_VtaANT'])) ;
                 Uds_VtaACT +=(Number(array[i]['Uds_VtaACT'])) ;
                 Uds_AutANT +=(Number(array[i]['Uds_AutANT'])) ; 

                 Uds_AutACT +=(Number(array[i]['Uds_AutACT'])) ;
                 Venta_ANT +=(Number(array[i]['Venta_ANT'])) ;
                 Venta_ACT +=(Number(array[i]['Venta_ACT'])) ;
                 Uds_ANT +=(Number(array[i]['Uds_ANT'])) ;
                 Uds_ACT +=(Number(array[i]['Uds_ACT'])) ;
                 Dif +=(Number(array[i]['Dif'])) ;
                 Margen +=(Number(array[i]['Margen'])) ; 
            }
            //console.log(totFac);
            document.getElementById("tcant").innerHTML = separator(tcant);
            document.getElementById("ExistC").innerHTML = separator(ExistC.toFixed(2));
            document.getElementById("ExistM").innerHTML = separator(ExistM.toFixed(2));
            document.getElementById("Exist").innerHTML = separator(Exist.toFixed(2));
            document.getElementById("ExistCedis001").innerHTML = separator(ExistCedis001.toFixed(2));
            document.getElementById("ExistCedis013").innerHTML = separator(ExistCedis013.toFixed(2));
            document.getElementById("ExistCedis024").innerHTML = separator(ExistCedis024.toFixed(2));
            document.getElementById("Venta_VtaANT").innerHTML = separator(Venta_VtaANT.toFixed(2));
            document.getElementById("Venta_VtaACT").innerHTML = separator(Venta_VtaACT.toFixed(2));
            document.getElementById("Venta_AutANT").innerHTML = separator(Venta_AutANT.toFixed(2));
            document.getElementById("Venta_AutACT").innerHTML = separator(Venta_AutACT.toFixed(2));
            document.getElementById("Uds_VtaANT").innerHTML = separator(Uds_VtaANT.toFixed(2));
            document.getElementById("Uds_VtaACT").innerHTML = separator(Uds_VtaACT.toFixed(2));
            document.getElementById("Uds_AutANT").innerHTML = separator(Uds_AutANT.toFixed(2)); 

            document.getElementById("Uds_AutACT").innerHTML = separator(Uds_AutACT.toFixed(2));
            document.getElementById("Venta_ANT").innerHTML = separator(Venta_ANT.toFixed(2));
            document.getElementById("Venta_ACT").innerHTML = separator(Venta_ACT.toFixed(2));
            document.getElementById("Uds_ANT").innerHTML = separator(Uds_ANT.toFixed(2));
            document.getElementById("Uds_ACT").innerHTML = separator(Uds_ACT.toFixed(2));
            document.getElementById("Dif").innerHTML = separator(Dif.toFixed(2));
            document.getElementById("Margen").innerHTML = separator(Margen.toFixed(2)); 
        }
        
        
        function headerclicken(e){
            const sortcolumn = e.target.cellIndex !== undefined ? e.target.cellIndex : e.target.parentNode.cellIndex;
            sorteableColumn(sortcolumn);
        }
        var lastCol=-1;
        
        function sorteableColumn(sortcolumn){
            const tableBody= document.getElementById("filas");
            const rows = Array.from(tableBody.rows);
            //console.log(sortcolumn);

                    //console.log(rows);
                    //var sortedRows=rows.sort();
                    
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

                    /* $.each(rows, function(indice, elemento) {
                        $('tbody').append(elemento);
                    }); */
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


const $btnExportar = document.querySelector("#btnExportar"),
        $datos = document.querySelector("#datos");

    $btnExportar.addEventListener("click", function() {
        tableToExcel($datos, 'REPORTE DE VENTAS POR ARTICULO Y PROVEEDOR COMPARATIVO')
    });

    
    var tableToExcel = (function() {
        var uri = 'data:application/vnd.ms-excel;base64,'
            , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" ><head></head><body><table>{table}</table></body></html>'
            , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
            , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
        return function(table, name) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = {worksheet: name || 'VentasxArticulo', table: table.innerHTML}
            //window.location.href = uri + base64(format(template, ctx))
            const a = document.createElement('a');
            const fecha =formatofecha()
            //console.log()
            a.download = 'Ventas_X_Art'+"_"+fecha+'.xls';
            a.href = uri + base64(format(template, ctx));
            a.click();
        }
    })()

    function formatofecha(){
        let fecha = new Date();
        let anio = fecha.getFullYear();
        let mes = fecha.getMonth()+1;
        let dia = fecha.getDate();

        if(mes.toString().length==1){
            mes = "0"+mes.toString();
        }
        if(dia.toString().length==1){
            dia = "0"+dia.toString();
        }
        
        const cadena = anio+"-"+mes+"-"+dia;
        return cadena;
    }

</script>
        
@endsection


<style>
         
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
        
        
            .resaltar{
                cursor: default;
                background-color: yellow;
                color: crimson;
            }
            
        /* JUST COMMON TABLE STYLES... */
        table { border-collapse: ; width: 100%; }
        th, td { background: #fff;  }
        
        
        .tableFixHead1{
        height: 550px;
        width:100%;
        word-wrap: break-word;
        overflow: auto;
        }
        
        .tableFixHead1 thead th {
          position: sticky;
          top: 0;
        }
        .totales {
        position: sticky;
        top: 520;
        }
        
        .columna {
          width:33%;
          float:left;
        }
        
        @media (max-width: 500px) {
          
          .columna {
            width:auto;
            float:none;
          }
          
        }
        .table td {
    border-bottom-width: 1px;
    padding-left: 0 !important;
    padding-right: 0 !important;
    padding-top: 2px !important;
    padding-bottom: 2px !important;
    padding: 1;
  }
        
            </style>

            