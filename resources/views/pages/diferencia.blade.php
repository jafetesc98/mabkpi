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
        <h4 class="card-title"><b> ULTIMAS ENTRADAS CON DIFERENCIA DE PRECIOS</b></h4>
        </div>
        
<div class="tableFixHead1 box">
    <!-- comianza el formulario de fecha -->
    <div class="container-fluid cew-9 ">
    <form action="buscaDif" method="GET">
        @csrf
        <div class="row px-2">
        <div class="col-12 col-md-8 my-4">
            <div class="row">
                <div class="columna" >
                    <label for="num_registros" class="">FECHA INICIO: </label>
                    <input type="date" class=" " id="ini" name="ini"  required>
                </div>
                <div class="">
                    <label for="num_registros" class=" ">FECHA FINAL:  </label>
                    <input type="date" class=" " id="fin" name="fin"  required>
                </div>
            </div>
            <div class="row my-4">
                <div class="columna">
                    <label for="num_registros" class=" ">SUCURSAL:  </label>
                    <input type="number" class=" " id="suc" name="suc"  required>
                </div>
                <div class="columna">
                    <label for="num_registros" class=" ">ALMACEN:  </label>
                    <input style="text-transform: uppercase;" type="text" class=" " id="alm" name="alm"  required>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 py-1">
            <div class=" col-md-4">
                <button type="submit" class="btn btn-primary  ml-4  " name="search" tittle="BUSCAR">BUSCAR</button>
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
            <table class="table" id="datos"  style="font-size:70% ">
                <thead class="">
                    <th class="text-center py-0" >Comprador</th>
                    <th class="text-center py-0">Fecha</th>
                    <th class="text-center py-0">Rec</th>
                    <th class="text-center py-0">Almacen</th>
                    <th class="text-center py-0">Proveedor</th>
                    <th class="text-center py-0">Articulo</th>
                    <th class="text-center py-0">Descripcion</th>
                    <th class="text-center py-0">Unidades</th>
                    <th class="text-center py-0">Factor</th>
                    <th class="text-center py-0">Recibidas</th>
                    <th class="text-center py-0">Costo U. Entrada</th>
                    <th class="text-center py-0">Costo U.Ant</th>
                    <th class="text-center py-0">Cto. Catalogo</th>
                    <th class="text-center py-0">Cto. Cat. Oax</th>
                    <th class="text-center py-0">Cto. Ptom</th>
                    <th class="text-center py-0">Usuario</th>
                    <th class="text-center py-0">Precio Vta</th>
                    <th class="text-center py-0">Id</th>
                </thead>
                <tbody id="filas" >
                @foreach($array1 as $key=>$res)
                    <tr >
                        <td class="text-center p-0 pt-1 pl-0">{{ $res['Comprador']}}</td>
                        <td class="text-center p-0 pt-1 pl-0">{{ $res['fecha']}}</td>
                        <td class="text-center p-0 pt-1 pl-0">{{ $res['rec'] }}</td>
                        <td class="text-center p-0 pt-1 pl-0">{{ $res['almacen'] }}</td>
                        <td class="text-center p-0 pt-1 pl-0">{{ $res['Proveedor'] }}</td>
                        <td class="text-center p-0 pt-1 pl-0">{{ $res['articulo'] }}</td>
                        <td class="sammy-nowrap-1 py-0">{{ $res['descripcion'] }}</td>
                        <td class="text-center p-0 pt-1 pl-0">{{ $res['unidades'] }}</td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['factor'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['recibidas'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['costo_u_entrada'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['costos_u_entrada_ant'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Cto_Catalogo'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Cto_Cat_OAX'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['Cto_Prom'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0">{{ $res['Usuario'] }}</td>
                        <td class="text-center p-0 pt-1 pl-0"><?php echo round( $res['precio_vta'],2) ?></td>
                        <td class="text-center p-0 pt-1 pl-0"> {{$res['Id']}}</td>
                    </tr>
                @endforeach 
                <tr class="total" id="totales" style="background-color: #d6d6d6; padding-top: 5px !important; padding-bottom: 20px !important;">
                        <td id="tNum" class="text-center py-0" style="background-color: #d6d6d6;padding-top: 5px !important; padding-bottom: 20px !important;"></td>
                        <td style="background-color: #d6d6d6;padding-top: 5px !important; padding-bottom: 20px !important;">Totales</td>
                        <td style="background-color: #d6d6d6;padding-top: 5px !important; padding-bottom: 20px !important;"></td>
                        <td style="background-color: #d6d6d6;padding-top: 5px !important; padding-bottom: 20px !important;"></td>
                        <td style="background-color: #d6d6d6;padding-top: 5px !important; padding-bottom: 20px !important;"> </td>
                        <td style="background-color: #d6d6d6;padding-top: 5px !important; padding-bottom: 20px !important;"> </td>
                        <td class="text-center py-0" style="background-color: #d6d6d6;padding-top: 5px !important; padding-bottom: 20px !important;"></td>
                        <td class="text-center py-0" style="background-color: #d6d6d6;padding-top: 5px !important; padding-bottom: 20px !important;"></td>
                        <td id="factor" class="text-center py-0" style="background-color: #d6d6d6; padding-top: 5px !important; padding-bottom: 20px !important;">Total </td>
                        <td id="recibidas" class="text-center py-0" style="background-color: #d6d6d6; padding-top: 5px !important; padding-bottom: 20px !important;">Total</td>
                        <td id="costoE" class="text-center py-0" style="background-color: #d6d6d6; padding-top: 5px !important; padding-bottom: 20px !important;">Total</td>
                        <td id="costoAnt" class="text-center py-0" style="background-color: #d6d6d6; padding-top: 5px !important; padding-bottom: 20px !important;">Total</td>
                        <td id="catalogo" class="text-center py-0" style=" background-color: #d6d6d6; padding-top: 5px !important; padding-bottom: 20px !important;">Total</td>
                        <td id="catOax" class="text-center py-0" style="background-color: #d6d6d6;padding-top: 5px !important; padding-bottom: 20px !important;">Total </td>
                        <td id="promocion" class="text-center py-0" style="background-color: #d6d6d6;padding-top: 5px !important; padding-bottom: 20px !important;">Total </td>
                        <td class="text-center py-0" style="background-color: #d6d6d6;padding-top: 5px !important; padding-bottom: 20px !important;"></td>
                        <td id="precio" class="text-center py-0" style="background-color: #d6d6d6;padding-top: 5px !important; padding-bottom: 20px !important;">Total </td>
                        <td id="" class="text-center py-0" style="background-color: #d6d6d6;padding-top: 5px !important; padding-bottom: 20px !important;"></td>
                    </tr>
                            <tr class='noSearch hide'>
                                <td colspan="5"></td>
                            </tr>


                </tbody>
            </table>
        </div>
</div>

<script type="text/javascript">
                var array = {{Js::from($array1)}};
                
                //console.log( array.length)
                const th=document.getElementsByTagName("th");
        window.addEventListener("load", function(){
            for(let i=0; i<th.length; i++){
                th[i].addEventListener("click",headerclicken)
            }
            sumaTotales()
        });

        function sumaTotales(){
            var totFac=0;
            var totRec=0;
            var totCosE=0;
            var totCosAnt=0;
            var catalogo=0;
            var catOax=0;
            var promocion=0;
            var precio=0;
            for (let i = 0; i < array.length; i++) {
              console.log(array[i]['recibidas']);
                totFac +=(Number(array[i]['factor'])) ;
                totRec +=(Number(array[i]['recibidas'])) ;
                totCosE +=(Number(array[i]['costo_u_entrada'])) ;
                totCosAnt +=(Number(array[i]['costos_u_entrada_ant'])) ;
                catalogo +=(Number(array[i]['Cto_Catalogo'])) ;
                catOax +=(Number(array[i]['Cto_Cat_OAX'])) ;
                promocion +=(Number(array[i]['Cto_Prom'])) ;
                precio +=(Number(array[i]['precio_vta'])) ;
            }
            //console.log(totFac);
            document.getElementById("factor").innerHTML = separator(totFac);
            document.getElementById("recibidas").innerHTML = separator(totRec);
            document.getElementById("costoE").innerHTML = separator(totCosE.toFixed(2));
            document.getElementById("costoAnt").innerHTML = separator(totCosAnt.toFixed(2));
            document.getElementById("catalogo").innerHTML = separator(catalogo.toFixed(2));
            document.getElementById("catOax").innerHTML = separator(catOax.toFixed(2));
            document.getElementById("promocion").innerHTML = separator(promocion.toFixed(2));
            document.getElementById("precio").innerHTML = separator(precio.toFixed(2));
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

            