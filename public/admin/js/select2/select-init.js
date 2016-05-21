$(document).ready(function() {
    $("#proceso_tipo_id").select2();
    $("#departamento_id").select2();
    $("#municipio_id").select2();
    $("#despacho_id").select2();
    $("#instancia_id").select2();
    $("#publicacion_id").select2();
    $("#etapa_id").select2();
    $("#actuacion_tipo_id").select2();
    $("#rama_id").select2();
    $("#e9").select2();
    $("#cliente_lista").select2();
    $("#e2").select2({
        placeholder: "Select a State",
        allowClear: true
    });
    $("#e3").select2({
        minimumInputLength: 2
    });
});

