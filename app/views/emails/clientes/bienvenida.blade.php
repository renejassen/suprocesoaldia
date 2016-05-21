<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Cuenta Activada</h2>

		<div>
			Señores {{ $empresa }}, <br/> 
			<br/>
			Les damos la bienvenida a Suprocesoaldia.com
		</div>

		<h4>Datos de la cuenta:</h4>

		<ul style="
			margin-top: 1px;
			margin-bottom: 0;
			padding-left: 0;
			list-style: none;
			line-height: 1.428571429;
			color: #767676;
			font-family: 'Open Sans',sans-serif;
			font-size: 13px;
		">
            <li style="
            	border-bottom: 1px solid #ebeae6;
				margin-top: 0;
				line-height: 30px;
				list-style: none;
            ">Nombre: {{ $nombres }}</li>

            <li style="
            	border-bottom: 1px solid #ebeae6;
				margin-top: 0;
				line-height: 30px;
				list-style: none;
            ">Apellidos: {{ $apellidos }}</li>

            <li style="
            	border-bottom: 1px solid #ebeae6;
				margin-top: 0;
				line-height: 30px;
				list-style: none;
            ">Teléfono: {{ $telefono }}</li>

            <li style="
            	border-bottom: 1px solid #ebeae6;
				margin-top: 0;
				line-height: 30px;
				list-style: none;
            ">Celular: {{ $celular }}</li>

            <li style="
            	border-bottom: 1px solid #ebeae6;
				margin-top: 0;
				line-height: 30px;
				list-style: none;
            ">Dirección: {{ $direccion }}</li>

            <li style="
            	border-bottom: 1px solid #ebeae6;
				margin-top: 0;
				line-height: 30px;
				list-style: none;
            ">Facturación: {{ $facturacion }}</li>
            
            <li>
            	Servicios contratados: 
                <a href="javascript:;"> 
                	<i class="fa fa-briefcase"></i>
                	@foreach ($servicios as $servicio)
                	<span class="label label-success">{{ $servicio->servicio }}, </span>
                    @endforeach
                </a>
            </li>
        </ul>

        <h4>Datos de acceso:</h4>

        <ul style="
			margin-top: 1px;
			margin-bottom: 0;
			padding-left: 0;
			list-style: none;
			line-height: 1.428571429;
			color: #767676;
			font-family: 'Open Sans',sans-serif;
			font-size: 13px;
		">
        	<li style="
            	border-bottom: 1px solid #ebeae6;
				margin-top: 0;
				line-height: 30px;
				list-style: none;
            ">Email: {{ $email }}</li>

            <li style="
            	border-bottom: 1px solid #ebeae6;
				margin-top: 0;
				line-height: 30px;
				list-style: none;
            ">Contraseña: {{ $password }}</li>

            <li style="
            	border-bottom: 1px solid #ebeae6;
				margin-top: 0;
				line-height: 30px;
				list-style: none;
            ">
            	Para ver la información de sus procesos y/o modificar sus datos de acceso ingrese haciendo clic en: <a href="http://www.suprocesoaldia.com/app">Suprocesoaldia.com</a>
            </li>

        </ul>
	</body>
</html>