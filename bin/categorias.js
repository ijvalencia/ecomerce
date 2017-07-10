/*
0 Computo 
1 Electrónica 
2 Almacenamiento 
3 Audio/Video
4 Software/Juegos 
5 Redes/Telefonia 
6 Impresoras/Escaner 
7 Accesorios/Personal 
8 Hogar/Muebles 
9 Seguridad 
10 Garantias */

function cargarLista(index) {
	$('#lista_subcat').empty();
	$('#lista_subcat2').empty();

	var categoria;
	console.log(index);
	switch (index) {
		case 0:
			categoria = [
				"MOUSE",
				"BOCINAS",
				"ALMACENAMIENTO",
				"MEMORIAS",
				"GAMES",
				"CONMUTADORES",
				"GABINETES",
				"IMPRESORAS",
				"MONITORES",
				"MULTIFUNCIONALES",
				"PIEZAS",
				"PORTATILES",
				"PROCESADORES",
				"REPRODUCTORES",
				"SCANNER",
				"SOFTWARE",
				"TABLETAS",
				"TARJETA CONTROLADORA",
				"TARJETA MADRE",
				"TECLADO Y MOUSE",
				"TECLADOS",
				"VIDEO",
				"VIDEOCONFERENCIA",
				"VIDEOPROYECTOR"];
			break;
		case 1:
			categoria = ["CABLES","CABLEADO ESTRUCTURADO","ENERGIA","HERRAMIENTAS"];
			break;
		case 2:
			categoria = ["ALMACENAMIENTO","DISCOS DUROS","MEMORIAS","SERVIDORES","TARJETA CONTROLADORA","TARJETA MADRE"];
			break;
		case 3:
			categoria = ["ACCESORIOS",
						 "AUDIFONOS Y MICRO",
						 "BACK PACK (MOCHILA)",
						 "CONSUMIBLES",
						 "FUNDAS",
						 "HERRAMIENTAS",
						 "MALETINES",
						 "MEMORIAS",
						 "PIZARRON",
						 "PRODUCTOS DE LIMPIEZA",
						 "RELOJES"];
			break;
		case 4:
			categoria = ["VIDEOJUEGOS","JUGUETES","SOFTWARE"];
			break;
		case 5:
			categoria = ["FAX",
						 "CABLEADO ESTRUCTURADO",
						 "ALARMAS",
						 "DIGITALIZADOR",
						 "CONMUTADORES",
						 "CABLES",
						 "CAMARAS",
						 "CONTROL DE ACCESO Y ASISTENCIA",
						 "CONTROLES",
						 "DISCOS DUROS",
						 "MULTIFUNCIONALES",
						 "OPTICOS",
						 "PRESENTADOR",
						 "PUNTO DE VENTA",
						 "RACK",
						 "REDES",
						 "SERVICIOS METROCARRIER",
						 "TELEFONIA",
						 "VIDEOGRABADORES"];
			break;
		case 6:
			categoria = ["FAX","SCANNER","TELEVISOR","IMPRESORAS","PLOTTER"];
			break;
		case 7:
			categoria = [
			"ACCESORIOS",
			"AUDIFONOS Y MICRO",
			"BACK PACK (MOCHILA)",
			"CONSUMIBLES",
			"FUNDAS",
			"HERRAMIENTAS",
			"MALETINES",
			"MEMORIAS",
			"PIZARRON",
			"PRODUCTOS DE LIMPIEZA",
			"RELOJES",
			"VENTILADORES"];
			break;
		case 8:
			categoria = ["AIRE ACONDICIONADO",
						 "CAMARAS",
						 "IMPRESORAS",
						 "LINEA BLANCA",
						 "MAQUINAS DE COSER",
						 "MUEBLES PARA OFICINA",
						 "TELEFONIA",
						 "TELEVISOR",
						 "VENTILADORES"];
			break;
		case 9:
			categoria = ["MALETINES","ENERGIA","ALARMAS","CABLEADO ESTRUCTURADO","CABLES","CAMARAS"];
			break;
		case 10:	// Garantias, revisar
			categoria = ["POLIZA DE GARANTIAS COMPUTO GHIA 2 A&Ntilde;OS",
						 "POLIZA DE GARANTIAS COMPUTO GHIA 1 A&Ntilde;O",
						 "POLIZA DE SERVICIO",
						 "POLIZAS DE GARANTIA",
						 "POLIZA DE SERVICIO"];
			break;
	}
	
	var inicio = "<li><a href=";
	var link = '"#">';
	var fin = "</a></li>"
	for(var i = 0; i < categoria.length; i++) {
		if (i >= 12) {
			for (var j = i; j < categoria.length; j++) 
				$('#lista_subcat2').append(inicio + link + categoria[j] + fin);
			break;
		}
		$('#lista_subcat').append(inicio + link + categoria[i] + fin);
	}
}