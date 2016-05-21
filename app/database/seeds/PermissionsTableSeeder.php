<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PermissionsTableSeeder extends Seeder {

	public function run()
	{
		$ver_usuarios = new Permission();
	    $ver_usuarios->name = 'ver_usuarios';
	    $ver_usuarios->display_name = 'ver usuarios';
	    $ver_usuarios->save();
	    
	    $ver_roles = new Permission();
	    $ver_roles->name = 'ver_roles';
	    $ver_roles->display_name = 'ver roles';
	    $ver_roles->save();
	    
	    $crear_roles = new Permission();
	    $crear_roles->name = 'crear_roles';
	    $crear_roles->display_name = 'crear roles';
	    $crear_roles->save();
	    
	    $crear_usuarios = new Permission();
	    $crear_usuarios->name = 'crear_usuarios';
	    $crear_usuarios->display_name = 'crear usuarios';
	    $crear_usuarios->save();
	    
	    $editar_roles = new Permission();
	    $editar_roles->name = 'editar_roles';
	    $editar_roles->display_name = 'editar roles';
	    $editar_roles->save();
	    
	    $editar_usuarios = new Permission();
	    $editar_usuarios->name = 'editar_usuarios';
	    $editar_usuarios->display_name = 'editar usuarios';
	    $editar_usuarios->save();
	    
	    $eliminar_usuarios = new Permission();
	    $eliminar_usuarios->name = 'eliminar_usuarios';
	    $eliminar_usuarios->display_name = 'eliminar usuarios';
	    $eliminar_usuarios->save();
	    
	    $eliminar_roles = new Permission();
	    $eliminar_roles->name = 'eliminar_roles';
	    $eliminar_roles->display_name = 'eliminar roles';
	    $eliminar_roles->save();

	    // nuevos

	    $ver_clientes = new Permission();
	    $ver_clientes->name = 'ver_clientes';
	    $ver_clientes->display_name = 'ver clientes';
	    $ver_clientes->save();

	    $crear_clientes = new Permission();
	    $crear_clientes->name = 'crear_clientes';
	    $crear_clientes->display_name = 'crear clientes';
	    $crear_clientes->save();

	    $editar_clientes = new Permission();
	    $editar_clientes->name = 'editar_clientes';
	    $editar_clientes->display_name = 'editar clientes';
	    $editar_clientes->save();

	    $eliminar_clientes = new Permission();
	    $eliminar_clientes->name = 'eliminar_clientes';
	    $eliminar_clientes->display_name = 'eliminar clientes';
	    $eliminar_clientes->save();


	    $ver_procesos = new Permission();
	    $ver_procesos->name = 'ver_procesos';
	    $ver_procesos->display_name = 'ver procesos';
	    $ver_procesos->save();

	    $crear_procesos = new Permission();
	    $crear_procesos->name = 'crear_procesos';
	    $crear_procesos->display_name = 'crear procesos';
	    $crear_procesos->save();

	    $editar_procesos = new Permission();
	    $editar_procesos->name = 'editar_procesos';
	    $editar_procesos->display_name = 'editar procesos';
	    $editar_procesos->save();

	    $eliminar_procesos = new Permission();
	    $eliminar_procesos->name = 'eliminar_procesos';
	    $eliminar_procesos->display_name = 'eliminar procesos';
	    $eliminar_procesos->save();

	    $ver_actuaciones = new Permission();
	    $ver_actuaciones->name = 'ver_actuaciones';
	    $ver_actuaciones->display_name = 'ver actuaciones';
	    $ver_actuaciones->save();

	    $crear_actuaciones = new Permission();
	    $crear_actuaciones->name = 'crear_actuaciones';
	    $crear_actuaciones->display_name = 'crear actuaciones';
	    $crear_actuaciones->save();

	    $editar_actuaciones = new Permission();
	    $editar_actuaciones->name = 'editar_actuaciones';
	    $editar_actuaciones->display_name = 'editar actuaciones';
	    $editar_actuaciones->save();

	    $eliminar_actuaciones = new Permission();
	    $eliminar_actuaciones->name = 'eliminar_actuaciones';
	    $eliminar_actuaciones->display_name = 'eliminar actuaciones';
	    $eliminar_actuaciones->save();

	    $ver_instancias = new Permission();
	    $ver_instancias->name = 'ver_instancias';
	    $ver_instancias->display_name = 'ver instancias';
	    $ver_instancias->save();

	    $crear_instancias = new Permission();
	    $crear_instancias->name = 'crear_instancias';
	    $crear_instancias->display_name = 'crear instancias';
	    $crear_instancias->save();

	    $editar_instancias = new Permission();
	    $editar_instancias->name = 'editar_instancias';
	    $editar_instancias->display_name = 'editar instancias';
	    $editar_instancias->save();

	    $eliminar_instancias = new Permission();
	    $eliminar_instancias->name = 'eliminar_instancias';
	    $eliminar_instancias->display_name = 'eliminar instancias';
	    $eliminar_instancias->save();

	    $ver_actores = new Permission();
	    $ver_actores->name = 'ver_actores';
	    $ver_actores->display_name = 'ver actores';
	    $ver_actores->save();

	    $crear_actores = new Permission();
	    $crear_actores->name = 'crear_actores';
	    $crear_actores->display_name = 'crear actores';
	    $crear_actores->save();

	    $editar_actores = new Permission();
	    $editar_actores->name = 'editar_actores';
	    $editar_actores->display_name = 'editar actores';
	    $editar_actores->save();

	    $eliminar_actores = new Permission();
	    $eliminar_actores->name = 'eliminar_actores';
	    $eliminar_actores->display_name = 'eliminar actores';
	    $eliminar_actores->save();

	    $ver_cartelera = new Permission();
	    $ver_cartelera->name = 'ver_cartelera';
	    $ver_cartelera->display_name = 'ver cartelera';
	    $ver_cartelera->save();

	    $crear_cartelera = new Permission();
	    $crear_cartelera->name = 'crear_cartelera';
	    $crear_cartelera->display_name = 'crear cartelera';
	    $crear_cartelera->save();

	    $editar_cartelera = new Permission();
	    $editar_cartelera->name = 'editar_cartelera';
	    $editar_cartelera->display_name = 'editar cartelera';
	    $editar_cartelera->save();

	    $eliminar_cartelera = new Permission();
	    $eliminar_cartelera->name = 'eliminar_cartelera';
	    $eliminar_cartelera->display_name = 'eliminar cartelera';
	    $eliminar_cartelera->save();

	    $ver_servicios = new Permission();
	    $ver_servicios->name = 'ver_servicios';
	    $ver_servicios->display_name = 'ver servicios';
	    $ver_servicios->save();

	    $crear_servicios = new Permission();
	    $crear_servicios->name = 'crear_servicios';
	    $crear_servicios->display_name = 'crear servicios';
	    $crear_servicios->save();

	    $editar_servicios = new Permission();
	    $editar_servicios->name = 'editar_servicios';
	    $editar_servicios->display_name = 'editar servicios';
	    $editar_servicios->save();

	    $eliminar_servicios = new Permission();
	    $eliminar_servicios->name = 'eliminar_servicios';
	    $eliminar_servicios->display_name = 'eliminar servicios';
	    $eliminar_servicios->save();

	    $ver_departamentos = new Permission();
	    $ver_departamentos->name = 'ver_departamentos';
	    $ver_departamentos->display_name = 'ver departamentos';
	    $ver_departamentos->save();

	    $crear_departamentos = new Permission();
	    $crear_departamentos->name = 'crear_departamentos';
	    $crear_departamentos->display_name = 'crear departamentos';
	    $crear_departamentos->save();

	    $editar_departamentos = new Permission();
	    $editar_departamentos->name = 'editar_departamentos';
	    $editar_departamentos->display_name = 'editar departamentos';
	    $editar_departamentos->save();

	    $eliminar_departamentos = new Permission();
	    $eliminar_departamentos->name = 'eliminar_departamentos';
	    $eliminar_departamentos->display_name = 'eliminar departamentos';
	    $eliminar_departamentos->save();

	    $ver_municipios = new Permission();
	    $ver_municipios->name = 'ver_municipios';
	    $ver_municipios->display_name = 'ver municipios';
	    $ver_municipios->save();

	    $crear_municipios = new Permission();
	    $crear_municipios->name = 'crear_municipios';
	    $crear_municipios->display_name = 'crear municipios';
	    $crear_municipios->save();

	    $editar_municipios = new Permission();
	    $editar_municipios->name = 'editar_municipios';
	    $editar_municipios->display_name = 'editar municipios';
	    $editar_municipios->save();

	    $eliminar_municipios = new Permission();
	    $eliminar_municipios->name = 'eliminar_municipios';
	    $eliminar_municipios->display_name = 'eliminar municipios';
	    $eliminar_municipios->save();

	    $ver_despachos = new Permission();
	    $ver_despachos->name = 'ver_despachos';
	    $ver_despachos->display_name = 'ver despachos';
	    $ver_despachos->save();

	    $crear_despachos = new Permission();
	    $crear_despachos->name = 'crear_despachos';
	    $crear_despachos->display_name = 'crear despachos';
	    $crear_despachos->save();

	    $editar_despachos = new Permission();
	    $editar_despachos->name = 'editar_despachos';
	    $editar_despachos->display_name = 'editar despachos';
	    $editar_despachos->save();

	    $eliminar_despachos = new Permission();
	    $eliminar_despachos->name = 'eliminar_despachos';
	    $eliminar_despachos->display_name = 'eliminar despachos';
	    $eliminar_despachos->save();

	    $ver_tipos_proceso = new Permission();
	    $ver_tipos_proceso->name = 'ver_tipos_proceso';
	    $ver_tipos_proceso->display_name = 'ver tipos proceso';
	    $ver_tipos_proceso->save();

	    $crear_tipos_proceso = new Permission();
	    $crear_tipos_proceso->name = 'crear_tipos_proceso';
	    $crear_tipos_proceso->display_name = 'crear tipos proceso';
	    $crear_tipos_proceso->save();

	    $editar_tipos_proceso = new Permission();
	    $editar_tipos_proceso->name = 'editar_tipos_proceso';
	    $editar_tipos_proceso->display_name = 'editar tipos proceso';
	    $editar_tipos_proceso->save();

	    $eliminar_tipos_proceso = new Permission();
	    $eliminar_tipos_proceso->name = 'eliminar_tipos_proceso';
	    $eliminar_tipos_proceso->display_name = 'eliminar tipos proceso';
	    $eliminar_tipos_proceso->save();

	    $ver_publicaciones = new Permission();
	    $ver_publicaciones->name = 'ver_publicaciones';
	    $ver_publicaciones->display_name = 'ver publicaciones';
	    $ver_publicaciones->save();

	    $crear_publicaciones = new Permission();
	    $crear_publicaciones->name = 'crear_publicaciones';
	    $crear_publicaciones->display_name = 'crear publicaciones';
	    $crear_publicaciones->save();

	    $editar_publicaciones = new Permission();
	    $editar_publicaciones->name = 'editar_publicaciones';
	    $editar_publicaciones->display_name = 'editar publicaciones';
	    $editar_publicaciones->save();

	    $eliminar_publicaciones = new Permission();
	    $eliminar_publicaciones->name = 'eliminar_publicaciones';
	    $eliminar_publicaciones->display_name = 'eliminar publicaciones';
	    $eliminar_publicaciones->save();

	    $ver_etapas = new Permission();
	    $ver_etapas->name = 'ver_etapas';
	    $ver_etapas->display_name = 'ver etapas';
	    $ver_etapas->save();

	    $crear_etapas = new Permission();
	    $crear_etapas->name = 'crear_etapas';
	    $crear_etapas->display_name = 'crear etapas';
	    $crear_etapas->save();

	    $editar_etapas = new Permission();
	    $editar_etapas->name = 'editar_etapas';
	    $editar_etapas->display_name = 'editar etapas';
	    $editar_etapas->save();

	    $eliminar_etapas = new Permission();
	    $eliminar_etapas->name = 'eliminar_etapas';
	    $eliminar_etapas->display_name = 'eliminar etapas';
	    $eliminar_etapas->save();

	    $ver_tipos_actuacion = new Permission();
	    $ver_tipos_actuacion->name = 'ver_tipos_actuacion';
	    $ver_tipos_actuacion->display_name = 'ver tipos actuacion';
	    $ver_tipos_actuacion->save();

	    $crear_tipos_actuacion = new Permission();
	    $crear_tipos_actuacion->name = 'crear_tipos_actuacion';
	    $crear_tipos_actuacion->display_name = 'crear tipos actuacion';
	    $crear_tipos_actuacion->save();

	    $editar_tipos_actuacion = new Permission();
	    $editar_tipos_actuacion->name = 'editar_tipos_actuacion';
	    $editar_tipos_actuacion->display_name = 'editar tipos actuacion';
	    $editar_tipos_actuacion->save();

	    $eliminar_tipos_actuacion = new Permission();
	    $eliminar_tipos_actuacion->name = 'eliminar_tipos_actuacion';
	    $eliminar_tipos_actuacion->display_name = 'eliminar tipos actuacion';
	    $eliminar_tipos_actuacion->save();

	    $generar_listado_procesos = new Permission();
	    $generar_listado_procesos->name = 'generar_listado_procesos';
	    $generar_listado_procesos->display_name = 'generar listado procesos';
	    $generar_listado_procesos->save();


	}

}