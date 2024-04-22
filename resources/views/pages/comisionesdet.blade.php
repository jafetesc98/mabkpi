@extends('../layout/' . $layout)

@section('subhead')
    <title>Comisiones </title>
 
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
        <h4 class="card-title"><b> Comisiones</b></h4>
        </div>
        
<div class="tableFixHead1 box">

        <div  class="carga" id="carga">
        </div>  

<br>

        <div class=" box ">
        <table class="table  table-report" id="datos"  style="font-size:70% ">
            <thead id="cabecera">
                <tr>
                    <th class="text-center ">CveVen</th>
                    <th class="text-center sammy-nowrap">Nombre Vendor</th>
                    <th class="text-center "> .. </th>
                    <th class="text-center ">VtaAnterior</th>
                    <th class="text-center ">Factor%</th>
                    <th class="text-center ">CuotaVta</th>
                    <th class="text-center ">Venta</th>
                    <th class="text-center ">Ind</th>
                    <th class="text-center sammy-nowrap">Base 1%</th>
                    <th class="text-center ">PorcVta</th>
                    <th class="text-center ">PagoVta</th>
                    <!--<th class="text-center "> - </th>
                    <th class="text-center ">SaldoVencido</th>
                    <th class="text-center ">PorcCartera</th>
                    <th class="text-center ">PagoCartera</th> -->
                    <th class="text-center sammy-nowrap"> -- </th>
                    <th class="text-center ">CuotaMgn</th>
                    <th class="text-center ">Margen</th>
                    <th class="text-center ">PorcMgn</th>
                    <th class="text-center ">PagoMgn</th>
                    <th class="text-center "> __ </th>
                    <th class="text-center ">CliTotal</th>
                    <th class="text-center ">CliLogro</th>
                    <th class="text-center ">PorcCli</th>
                    <th class="text-center ">PagoCli</th>
                    <th class="text-center "> ,, </th>
                    <th class="text-center ">TotalPago</th>
                </tr>
                    
                </thead>
                <tbody id="filas" >
                    @foreach($array as $key=>$res)
                        <tr>
                            <td class=" text-center p-0 pt-1 pl-0">{{ $res['CveVen']}}</td>
                            <td class="sammy-nowrap text-center p-0 pt-1 pl-0">{{ $res['NomVen']}}</td>
                            <td class=" text-center p-0 pt-1 pl-0">{{ $res[' .. '] }}</td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round($res['VtaAnterior'],2),2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round($res['Factor%'],2),2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round($res['CuotaVta'],2),2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['Venta'],2),2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0">{{$res['Ind']}}</td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['Base 1%'],2),2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['PorcVta'],2),2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['PagoVta'],2),2) ?></td>
                            <!--<td class=" text-center p-0 pt-1 pl-0">{{$res[' - ']}}</td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['SaldoVencido'],2),2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['PorcCartera'],2),2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['PagoCartera'],2),2) ?></td> -->
                            <td class=" text-center p-0 pt-1 pl-0">{{ $res[' -- '] }}</td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['CuotaMgn'],2),2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['Margen'],2),2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['PorcMgn'],2),2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['PagoMgn'],2),2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0">{{ $res[' __ '] }}</td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['CliTotal'],2),2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['CliLogro'],2),2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['PorcCli'],2),2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['PagoCli'],2),2) ?></td>
                            <td class=" text-center p-0 pt-1 pl-0">{{ $res[' ,, '] }}</td>
                            <td class=" text-center p-0 pt-1 pl-0"><?php echo number_format(round( $res['TotalPago'],2),2) ?></td>
                        </tr>
                    @endforeach 
                            <tr class='noSearch hide'>
                                <td colspan="5"></td>
                            </tr>
                </tbody>
            </table>
        </div>
</div>


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
padding-left: 0 !important;
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
         





            