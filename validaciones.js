// Función para validar el formulario de vuelos
function validarVuelo() {
    // Obtener y limpiar los valores de los campos del formulario
    const origen = document.forms["formVuelo"]["origen"].value.trim(); // Campo de origen
    const destino = document.forms["formVuelo"]["destino"].value.trim(); // Campo de destino
    const fecha = document.forms["formVuelo"]["fecha"].value.trim(); // Campo de fecha
    const plazas = document.forms["formVuelo"]["plazas_disponibles"].value.trim(); // Campo de plazas disponibles
    const precio = document.forms["formVuelo"]["precio"].value.trim(); // Campo de precio

    // Validar que el campo de origen no esté vacío
    if (!origen) {
        alert("Por favor, ingresa el origen del vuelo.");
        return false; // Detener el envío del formulario
    }
    // Validar que el campo de destino no esté vacío
    if (!destino) {
        alert("Por favor, ingresa el destino del vuelo.");
        return false; // Detener el envío del formulario
    }
    // Validar que el campo de fecha no esté vacío
    if (!fecha) {
        alert("Por favor, selecciona una fecha para el vuelo.");
        return false; // Detener el envío del formulario
    }
    // Validar que el número de plazas sea válido (no vacío, numérico, y mayor que 0)
    if (!plazas || isNaN(plazas) || plazas <= 0) {
        alert("Por favor, ingresa un número válido de plazas disponibles.");
        return false; // Detener el envío del formulario
    }
    // Validar que el precio sea válido (no vacío, numérico, y mayor que 0)
    if (!precio || isNaN(precio) || precio <= 0) {
        alert("Por favor, ingresa un precio válido.");
        return false; // Detener el envío del formulario
    }

    return true; // Si todas las validaciones son correctas, permite enviar el formulario
}

// Función para validar el formulario de hoteles
function validarHotel() {
    // Obtener y limpiar los valores de los campos del formulario
    const nombre = document.forms["formHotel"]["nombre"].value.trim(); // Campo del nombre del hotel
    const ubicacion = document.forms["formHotel"]["ubicacion"].value.trim(); // Campo de la ubicación del hotel
    const habitaciones = document.forms["formHotel"]["habitaciones_disponibles"].value.trim(); // Campo de habitaciones disponibles
    const tarifa = document.forms["formHotel"]["tarifa_noche"].value.trim(); // Campo de tarifa por noche

    // Validar que el campo del nombre no esté vacío
    if (!nombre) {
        alert("Por favor, ingresa el nombre del hotel.");
        return false; // Detener el envío del formulario
    }
    // Validar que el campo de ubicación no esté vacío
    if (!ubicacion) {
        alert("Por favor, ingresa la ubicación del hotel.");
        return false; // Detener el envío del formulario
    }
    // Validar que el número de habitaciones sea válido (no vacío, numérico, y mayor que 0)
    if (!habitaciones || isNaN(habitaciones) || habitaciones <= 0) {
        alert("Por favor, ingresa un número válido de habitaciones disponibles.");
        return false; // Detener el envío del formulario
    }
    // Validar que la tarifa sea válida (no vacía, numérica, y mayor que 0)
    if (!tarifa || isNaN(tarifa) || tarifa <= 0) {
        alert("Por favor, ingresa una tarifa válida por noche.");
        return false; // Detener el envío del formulario
    }

    return true; // Si todas las validaciones son correctas, permite enviar el formulario
}
