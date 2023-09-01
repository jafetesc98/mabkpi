

function doSearch()

        {

            const tableReg = document.getElementById('filas');

            const searchText = document.getElementById('searchTerm').value.toLowerCase();

            let total = 0;

            console.log(tableReg)

 

            // Recorremos todas las filas con contenido de la tabla

            for (let i = 0; i < tableReg.rows.length; i++) {

                // Si el td tiene la clase "noSearch" no se busca en su cntenido

                if (tableReg.rows[i].classList.contains("noSearch")) {

                    continue;

                }

 

                let found = false;

                const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');

                // Recorremos todas las celdas

                for (let j = 0; j < cellsOfRow.length && !found; j++) {

                    const compareWith = cellsOfRow[j].innerHTML.toLowerCase();

                    // Buscamos el texto en el contenido de la celda

                    if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {

                        found = true;

                        total++;

                    }

                }

                if (found) {
                    tableReg.rows[i].style.display = '';
                    //tableReg.rows[i].style.visibility = 'visible';
                    

                } else {

                    // si no ha encontrado ninguna coincidencia, esconde la
                    // fila de la tabla
                    tableReg.rows[i].style.display = 'none';
                    //tableReg.rows[i].style.visibility = 'collapse';
                    

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

        }


