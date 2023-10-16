@extends('../layout/' . $layout)

@section('subhead')
    <title>Presupuesto de sucursales </title>
    <script src="dist/js/busqueda.js"></script>
@endsection

@section('menumobil')
    @include('../layout/components/mobile-menu')
@endsection

@section('menulateral')
@include('../layout/menu')
@endsection

@section('subhead')
    <title>Dashboard </title>


@endsection

@section('subcontent')
<div class="card-header py-6 " style="text-align: center;">
        <h4 class="card-title"><b> PRESUPUESTOS DE SUCURSALES</b></h4>
        </div>
        
<div class="tableFixHead1 box">

        
        <div  class="carga" id="carga">
        </div>  
        
<br>
        <div class=" box ">
            <table class="table" id="datos"  style="font-size:70% ">
                <thead class="">
                    <th class="text-center py-0">DiaTY</th>
                    <th class="text-center py-0">FecTY</th>
                    <th class="text-center py-0">DiaLY</th>
                    <th class="text-center py-0">FecLY</th>
                    <th class="text-center py-0">VentaTotalLY</th>
                    <th class="text-center py-0">PptoTotalTY</th>
                    <th class="text-center py-0">Inc/Dec</th>
                    <th class="text-center py-0">VentaAutLY</th>
                    <th class="text-center py-0">PptoAutTYaTotales</th>
                    <th class="text-center py-0">Inc/Decr</th>
                    <th class="text-center py-0">VentaMayLY</th>
                    <th class="text-center py-0">PptoMayTYaTotales</th>
                    <th class="text-center py-0">Incr/dec</th>
                    <th class="text-center py-0">..</th>
                    <th class="text-center py-0">DiaReal</th>
                    <th class="text-center py-0">VtaTotalReal</th>
                    <th class="text-center py-0">Alc</th>
                    <th class="text-center py-0">Inc/Dec_Real</th>
                    <th class="text-center py-0">VtaAutReal</th>
                    <th class="text-center py-0">Alca</th>
                    <th class="text-center py-0">Incr/Dec_Real</th>
                    <th class="text-center py-0">VtaMayReal</th>
                    <th class="text-center py-0">Alcan</th>
                    <th class="text-center py-0">Inc/Decr_Real</th>

                </thead>
                <tbody id="filas" >
                @foreach($array as $key=>$res)
                    <tr >
                        <td class="text-center p-0 pt-1 pl-0">{{ $res['DiaTY']}}</td>
                        <td class="text-center p-0 pt-1 pl-0">{{ $res['FecTY']}}</td>
                        <td class="text-center p-0 pt-1 pl-0">{{ $res['DiaLY'] }}</td>
                        <td class="text-center p-0 pt-1 pl-0">{{ $res['FecLY'] }}</td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['VentaTotalLY'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['PptoTotalTY'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Inc/Dec'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['VentaAutLY'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['PptoAutTYaTotales'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Inc/Decr'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['VentaMayLY'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['PptoMayTYaTotales'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Incr/Dec'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0">{{ $res['..'] }}</td>
                        <td class="text-center p-0 pt-1 pl-0">{{ $res['DiaReal'] }}</td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['VtaTotalReal'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Alc'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Inc/Dec_Real'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['VtaAutReal'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Alca'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Incr/Dec_Real'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['VtaMayReal'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Alcan'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Inc/Decr_Real'],2) ?></td>
                    </tr>
                @endforeach 
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
                var suc = {{Js::from($suc)}};
                
                //console.log( array.length)
                const th=document.getElementsByTagName("th");
        window.addEventListener("load", function(){
           
            for(let i=0; i<th.length; i++){
                th[i].addEventListener("click",headerclicken)
            }
            
        });

        
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

const $btnExportar = document.querySelector("#btnExportar"),
        $datos = document.querySelector("#datos");

    $btnExportar.addEventListener("click", function() {
        tableToExcel($datos, 'Presupuesto de sucursales')
    });

    
    var tableToExcel = (function() {
        var uri = 'data:application/vnd.ms-excel;base64,'
            , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" ><head></head><body><table>{table}</table></body></html>'
            , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
            , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
        return function(table, name) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = {worksheet: name || 'Presupuesto', table: table.innerHTML}
            //window.location.href = uri + base64(format(template, ctx))
            const a = document.createElement('a');
            const fecha =formatofecha()
            //console.log()
            a.download = 'presupuesto_suc_'+suc+"_"+fecha+'.xls';
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
        table { border-collapse: collapse; width: 100%; }
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