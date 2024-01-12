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
        <h4 class="card-title"><b>AVANCE DE VENTAS POR SUCURSAL</b></h4>
        </div>

        <div class="card-header py-2 " >
        <h6 class="card-title"><b>Periodo: {{$array1['periodo']."    "}}  {{$array1['zona']}}</b></h6>
        
        </div>
        
<div class="tableFixHead1 box">

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
            <thead id="">
                <tr>
                    <th class="text-center ">Suc</th>
                    <th class="text-center ">Descripción</th>
                    <th class="text-center ">VentaANTERIOR</th>
                    <th class="text-center ">VentaAlDia</th>
                    <th class="text-center ">VentaACTUAL</th>
                    <th class="text-center ">CubVenta</th>
                    <th class="text-center ">CajasANTERIOR</th>
                    <th class="text-center ">CajasAlDia</th>
                    <th class="text-center ">CajasACTUAL</th>
                    <th class="text-center ">CubCajas</th>
                    <th class="text-center ">MgnANTERIOR</th>
                    <th class="text-center ">NcresANTERIOR</th>
                    <th class="text-center ">MgnACTUAL</th>
                    <th class="text-center ">NcresACTUAL</th>
                    <th class="text-center ">Mgn_NcreANTERIOR</th>
                    <th class="text-center ">Mgn_NcreACTUAL</th>
                    <th class="text-center ">Objetivo</th>
                    <th class="text-center ">CubObjetivo</th>
                    <th class="text-center ">DifVSventa</th>
                    <th class="text-center ">DifVSobjetivo</th>
                </tr>
                <tr class="totales" id="totales">
                        <td id="Suc" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="Descripción" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="VentaANTERIOR" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="VentaAlDia" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="VentaACTUAL" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="CubVenta" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="CajasANTERIOR" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="CajasAlDia" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="CajasACTUAL" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="CubCajas" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="MgnANTERIOR" class="text-center py-0" style="background-color: #d6d6d6;"> </td>
                        <td id="NcresANTERIOR" class="text-center py-0" style="background-color: #d6d6d6;"> </td>
                        <td id="MgnACTUAL" class="text-center py-0" style="background-color: #d6d6d6;"> </td>
                        <td id="NcresACTUAL" class="text-center py-0" style="background-color: #d6d6d6;"> </td>
                        <td id="Mgn_NcreANTERIOR" class="text-center py-0" style="background-color: #d6d6d6;"> </td>
                        <td id="Mgn_NcreACTUAL" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="Objetivo" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="CubObjetivo" class="text-center py-0" style="background-color: #d6d6d6;"></td>
                        <td id="DifVSventa" class="text-center py-0" style="background-color: #d6d6d6;"> </td>
                        <td id="DifVSobjetivo" class="text-center py-0" style="background-color: #d6d6d6;"> </td>
                        
                    </tr>
                </thead>
                <tbody id="filas" >
                @foreach($array as $key=>$res)
                        <tr>
                            <td class=" text-center p-0 pt-1 pl-0">{{ $res['suc']}}</td>
                            <td class="sammy-nowrap-1 text-center p-0 pt-1 pl-0">{{ $res['Descripción']}}</td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['VentaANTERIOR'],2 ), 2, '.', ',')?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['VentaAlDia'] ,2 ), 2, '.', ',')?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round($res['VentaACTUAL'],2), 2, '.', ',') ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round($res['CubVenta'],2), 2, '.', ',') ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['CajasANTERIOR'],2), 2, '.', ',') ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['CajasAlDia'],2), 2, '.', ',') ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['CajasACTUAL'],2), 2, '.', ',') ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['CubCajas'],2), 2, '.', ',') ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['MgnANTERIOR'],2), 2, '.', ',') ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['NcresANTERIOR'],2), 2, '.', ',') ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round($res['MgnACTUAL'],2 ), 2, '.', ',')?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['NcresACTUAL'],2), 2, '.', ',') ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['Mgn_NcreANTERIOR'],2), 2, '.', ',') ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['Mgn_NcreACTUAL'],2), 2, '.', ',') ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['Objetivo'],2 ), 2, '.', ',')?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['CubObjetivo'],2), 2, '.', ',') ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['DifVSventa'],2), 2, '.', ',') ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['DifVSobjetivo'],2), 2, '.', ',') ?></td>
                        </tr>
                    @endforeach 
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
        function sumaTotales(){
            var VentaANTERIOR=0;
            var VentaAlDia=0;
            var VentaACTUAL=0;
            var CubVenta=0;
            var CajasANTERIOR=0;
            var CajasAlDia=0;
            var CajasACTUAL=0;
            var CubCajas=0;
            var MgnANTERIOR=0;
            var NcresANTERIOR=0;
            var MgnACTUAL=0;
            var NcresACTUAL=0;
            var Mgn_NcreANTERIOR=0;
            var Mgn_NcreACTUAL=0;
            var Objetivo=0;
            var CubObjetivo=0;
            var DifVSventa=0;
            var DifVSobjetivo=0;
            
            for (let i = 0; i < array.length; i++) {
              //console.log(array[i]['Cant']);
                 VentaANTERIOR +=(Number(array[i]['VentaANTERIOR'])) ;
                 VentaAlDia +=(Number(array[i]['VentaAlDia'])) ;
                 VentaACTUAL +=(Number(array[i]['VentaACTUAL'])) ;
                 CubVenta +=(Number(array[i]['CubVenta'])) ;
                 CajasANTERIOR +=(Number(array[i]['CajasANTERIOR'])) ;
                 CajasAlDia +=(Number(array[i]['CajasAlDia'])) ;
                 CajasACTUAL +=(Number(array[i]['CajasACTUAL'])) ;
                 CubCajas +=(Number(array[i]['CubCajas'])) ;
                 MgnANTERIOR +=(Number(array[i]['MgnANTERIOR'])) ; 

                 NcresANTERIOR +=(Number(array[i]['NcresANTERIOR'])) ;
                 MgnACTUAL +=(Number(array[i]['MgnACTUAL'])) ;
                 NcresACTUAL +=(Number(array[i]['NcresACTUAL'])) ;
                 Mgn_NcreANTERIOR +=(Number(array[i]['Mgn_NcreANTERIOR'])) ;
                 Mgn_NcreACTUAL +=(Number(array[i]['Mgn_NcreACTUAL'])) ;
                 Objetivo +=(Number(array[i]['Objetivo'])) ;
                 CubObjetivo +=(Number(array[i]['CubObjetivo'])) ;
                 DifVSventa +=(Number(array[i]['DifVSventa'])) ; 
                 DifVSobjetivo +=(Number(array[i]['DifVSobjetivo'])) ; 
            }
            //console.log(totFac);
            document.getElementById("VentaANTERIOR").innerHTML = separator(VentaANTERIOR.toFixed(2));
            document.getElementById("VentaAlDia").innerHTML = separator(VentaAlDia.toFixed(2));
            document.getElementById("VentaACTUAL").innerHTML = separator(VentaACTUAL.toFixed(2));
            //document.getElementById("CubVenta").innerHTML = separator(CubVenta.toFixed(2));
            document.getElementById("CajasANTERIOR").innerHTML = separator(CajasANTERIOR.toFixed(2));
            document.getElementById("CajasAlDia").innerHTML = separator(CajasAlDia.toFixed(2));
            document.getElementById("CajasACTUAL").innerHTML = separator(CajasACTUAL.toFixed(2));
            //document.getElementById("CubCajas").innerHTML = separator(CubCajas.toFixed(2));
            //document.getElementById("MgnANTERIOR").innerHTML = separator(MgnANTERIOR.toFixed(2)); 

            document.getElementById("NcresANTERIOR").innerHTML = separator(NcresANTERIOR.toFixed(2));
            //document.getElementById("MgnACTUAL").innerHTML = separator(MgnACTUAL.toFixed(2));
            document.getElementById("NcresACTUAL").innerHTML = separator(NcresACTUAL.toFixed(2));
            //document.getElementById("Mgn_NcreANTERIOR").innerHTML = separator(Mgn_NcreANTERIOR.toFixed(2));
            //document.getElementById("Mgn_NcreACTUAL").innerHTML = separator(Mgn_NcreACTUAL.toFixed(2));
            document.getElementById("Objetivo").innerHTML = separator(Objetivo.toFixed(2));
            //document.getElementById("CubObjetivo").innerHTML = CubObjetivo(Dif.toFixed(2));
            document.getElementById("DifVSventa").innerHTML = separator(DifVSventa.toFixed(2)); 
            document.getElementById("DifVSobjetivo").innerHTML = separator(DifVSobjetivo.toFixed(2));
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

            