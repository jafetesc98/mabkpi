@extends('../layout/' . $layout)

@section('subhead')
    <title>Margen menor a 4% </title>
 
    <script src="dist/js/busqueda.js"></script>
@endsection

@section('menumobil')
    @include('../layout/components/mobile-menu')
@endsection

@section('menulateral')
@include('../layout/menu')
@endsection

@section('subcontent')

        <div class="card-header py-6 " style="text-align: center;">
        <h4 class="card-title"><b> MARGEN DE UTILIDAD MENOR DE 4%</b></h4>
        </div>
        
<div class="tableFixHead1 box">
    <!-- comianza el formulario de fecha -->
    <div class="container-fluid cew-9 ">
        <form action="buscar" method="GET">
        @csrf
        <div class="row px-2">
        <div class="col-12 col-md-8 my-4">
            <div class="row">
                <div class="columna">
                    <label for="num_registros" class="">FECHA INICIO: </label>
                    <input type="date" class=" " id="ini" name="ini"  required>
                </div>
                <div class="columna">
                    <label for="num_registros" class=" ">FECHA FINAL:  </label>
                    <input type="date" class=" " id="fin" name="fin"  required>
                </div>

                </div>
                <div class="col-12 col-md-4 py-1">
            <div class=" col-md-4">
                <button type="submit" class="btn btn-primary  ml-4  " name="search" tittle="BUSCAR">BUSCAR</button>
            </div>
        </div> 
        </div>
        </div>
        </form>
       
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
        <table class="table  table-report" id="datos"  style="font-size:70% ">
            <thead id="cabecera">
                <tr>
                    <th class="text-center ">Suc</th>
                    <th class="text-center ">Comprador</th>
                    <th class="text-center ">Articulo</th>
                    <th class="text-center ">Descripcion</th>
                    <th class="text-center ">Venta</th>
                    <th class="text-center ">Unid. Ven</th>
                    <th class="text-center ">Dev.</th>
                    <th class="text-center ">Unid. Dev</th>
                    <th class="text-center ">Venta neta</th>
                    <th class="text-center ">Costo Venta</th>
                    <th class="text-center ">% de utilidad</th>
                    <th class="text-center ">Util monto</th>
                    <th class="text-center ">Tipo prom.</th>
                    <th class="text-center ">Costo prom.</th>
                    <th class="text-center ">Cat. Art.</th>
                    <th class="text-center ">Dif</th>
                    <th class="text-center ">Ult. costo</th>
                </tr>
                    <tr class="totales" id="totales">
                        <td>TOTALES</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td id="tVenta" class="text-center py-0"> </td>
                        <td id="tUniVen" class="text-center py-0"> </td>
                        <td id="tDev" class="text-center py-0"> </td>
                        <td id="tUniDev" class="text-center py-0"> </td>
                        <td id="tVtaNeta" class="text-center py-0"></td>
                        <td id="tCosNeta" class="text-center py-0"></td>
                        <td ></td>
                        <td id="tUtilMonto" class="text-center py-0"></td>
                        <td > </td>
                        <td id="tCtoProm" class="text-center py-0"> </td>
                        <td id="tCatArt" class="text-center py-0"> </td>
                        <td > </td>
                        <td id="tUltCos" class="text-center py-0"> </td>
                    </tr>
                </thead>
                <tbody id="filas" >
                    @foreach($array as $key=>$res)
                        <tr>
                            <td class=" text-center p-0 pt-1 pl-0">{{ $res['Suc']}}</td>
                            <td class=" text-center p-0 pt-1 pl-0">{{ $res['Comprador']}}</td>
                            <td class=" text-center p-0 pt-1 pl-0">{{ $res['Articulo'] }}</td>
                            <td class=" sammy-nowrap-1 p-0 pt-1 pl-0">{{ $res['Descripcion'] }}</td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo round($res['Venta'],2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo round($res['UdsVen'],2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo round( $res['Devoluciones'],2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo round( $res['UdsDev'],2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo round( $res['VentaNeta'],2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo round( $res['CostoVta'],2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo round( $res['%_de_Utilidad'],2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo round( $res['Util_Monto'],2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0">{{ $res['TipoProm'] }}</td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo round( $res['CostoProm'],2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo round( $res['Catalogo de Articulos'],2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0">{{ $res['Diferencia'] }}</td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo round( $res['UltCosto'],2) ?></td>
                        </tr>
                    @endforeach 
                            <tr class='noSearch hide'>
                                <td colspan="5"></td>
                            </tr>
                </tbody>
            </table>
        </div>
</div>

<script type="text/javascript">
                var array = {{Js::from($array)}};

                const th=document.getElementsByTagName("th");
        window.addEventListener("load", function(){
            for(let i=0; i<th.length; i++){
                th[i].addEventListener("click",headerclicken)
                sumaTotales();
            }
        });
        function sumaTotales() {
            var tVenta=0;
            var tUniVen=0;
            var tDev=0;
            var tUniDev=0;
            var tVtaNeta=0;
            var tCosNeta=0;
            var tUtilMonto=0;
            var tCtoProm=0;
            
            var tCatArt=0;
            var tUltCos=0;
            //console.log(array.length)
            for (let i = 0; i < array.length; i++) {
                //console.log(array[i]['Num'])
                tVenta += (Number(array[i]['Venta']));
                tUniVen += (Number(array[i]['UdsVen']));
                tDev += (Number(array[i]['Devoluciones']));
                tUniDev +=(Number(array[i]['UdsDev']));
                tVtaNeta += (Number(array[i]['VentaNeta']));
                tCosNeta += (Number(array[i]['CostoVta']));
                tUtilMonto += (Number(array[i]['Util_Monto']));
                tCtoProm += (Number(array[i]['CostoProm']));
                
                tCatArt += (Number(array[i]['Catalogo de Articulos']));
                tUltCos += (Number(array[i]['UltCosto']));
            }
            //console.log(totFac);
            document.getElementById("tVenta").innerHTML = separator(tVenta.toFixed(2));
            document.getElementById("tUniVen").innerHTML = separator(tUniVen.toFixed(2));
            document.getElementById("tDev").innerHTML = separator(tDev.toFixed(2));
            document.getElementById("tUniDev").innerHTML = separator(tUniDev.toFixed(2));
            document.getElementById("tVtaNeta").innerHTML = separator(tVtaNeta.toFixed(2));
            document.getElementById("tCosNeta").innerHTML = separator(tCosNeta.toFixed(2));
            document.getElementById("tUtilMonto").innerHTML = separator(tUtilMonto.toFixed(2));
            document.getElementById("tCtoProm").innerHTML = separator(tCtoProm.toFixed(2));
            document.getElementById("tCatArt").innerHTML = separator(tCatArt.toFixed(2));
            document.getElementById("tUltCos").innerHTML = separator(tUltCos.toFixed(2));
            

        }
        function separator(numb) {
    var str = numb.toString().split(".");
    str[0] = str[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return str.join(".");
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
/* JUST COMMON TABLE STYLES... */
table { border-collapse: collapse; width: 100%; }
th, td { background: #fff; padding: 8px 16px; }


.tableFixHead1 thead th {
  position: sticky;
  top: 0;
}

.totales {
  position: sticky;
  top: 540;
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
         





            