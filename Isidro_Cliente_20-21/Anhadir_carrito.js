

			//var listadoAlumnos = new Array();
			var listadoProductos = new Array();

			function insertar() {
				//var nuevoNombre,nuevaEdad,numMat;
				var nombreProducto,precioProducto,numProducto;
				//nuevoNombre = document.frmDatos.nombre.value;
				//nuevaEdad = document.frmDatos.edad.value;
				//numMat = new Date();
				numProducto = new Date();
				//var al = new producto(nuevoNombre,nuevaEdad);
				var produ = new producto(nombreProducto,precioProducto);
				//al.matricular(numProducto.getTime());
				produ.comprar(numProducto.getTime());
				//listadoAlumnos.push(al);
				listadoProductos.push(produ);
			}

			function mostrarLista() {
				//var alumnos;
				document.getElementById("resultado").innerHTML = "Listado Productos: <br>";
				for (var i=0;i<listadoProductos.length;i++) {
					document.getElementById("resultado").innerHTML=document.getElementById("resultado").innerHTML+listadoProductos[i].datosAlumno()+"</br>";
				}
			}
		
			document.getElementById("crear").addEventListener("click",function(){insertar();});
			document.getElementById("mostrar").addEventListener("click",function(){mostrarLista();});

			function producto(nombre,precio) {
				this.nombre = nombre;
				this.precio = precio;
				this.numProducto=null;
				this.comprar = function(numProducto) {
					this.numProducto = numProducto;
				};
				this.datosProducto = function() {
					return "nombre: "+this.nombre+", precio:"+this.precio+", matricula: "+ this.numProducto;
				}

			}


