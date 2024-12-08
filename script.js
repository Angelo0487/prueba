// Función para mostrar notificaciones
function showNotifications() {
    // Realiza una solicitud a un archivo llamado 'notificaciones.php'
    fetch('notificaciones.php') // Corregido el nombre del archivo
        .then(response => response.json()) // Convierte la respuesta a formato JSON
        .then(notifications => {
            // Selecciona el contenedor donde se mostrarán las notificaciones
            const notificationsContainer = document.getElementById('notifications-container');

            // Recorre cada mensaje recibido en el array 'notifications'
            notifications.forEach(message => {
                // Crea un elemento 'div' para cada notificación
                const notification = document.createElement('div');
                // Agrega una clase CSS al elemento para estilos
                notification.className = 'notification';
                // Establece el texto del mensaje como el contenido del elemento
                notification.innerText = message;
                // Agrega el elemento de la notificación al contenedor en el DOM
                notificationsContainer.appendChild(notification);

                // Configura un temporizador para eliminar la notificación después de 5 segundos
                setTimeout(() => {
                    // Elimina el elemento de la notificación del contenedor
                    notificationsContainer.removeChild(notification);
                }, 5000); // Tiempo en milisegundos (5 segundos)
            });
        })
        // Captura y muestra errores en caso de que la solicitud falle
        .catch(error => console.error('Error al cargar las notificaciones:', error));
}

// Agrega un evento al documento para que la función se ejecute una vez que la página esté completamente cargada
document.addEventListener('DOMContentLoaded', showNotifications);

// Función para agregar contenido al HTML del índice primario
function agregarContenido() {
    // Obtener el contenedor principal
    const mainContainer = document.querySelector('main');

    // Crear el encabezado
    const header = document.createElement('header');
    header.classList.add('header-center'); // Añadir la clase para centrar
    header.innerHTML = `
        <h1>Bienvenido a la Agencia de Viajes</h1>
        <p>Encuentra los mejores destinos, vuelos y hoteles para tus próximas vacaciones.</p>
    `;
    mainContainer.prepend(header); // Agregar el encabezado al inicio del contenedor principal

    // Crear el pie de página
    const footer = document.createElement('footer');
    footer.innerHTML = `
        <p>© 2024 Agencia de Viajes. Todos los derechos reservados.</p>
        <nav>
            <ul>
                <li><a href="#privacy">Política de Privacidad</a></li>
                <li><a href="#terms">Términos y Condiciones</a></li>
                <li><a href="#contact">Contacto</a></li>
            </ul>
        </nav>
    `;
    document.body.appendChild(footer); // Agregar el pie de página al final del body
}

// Iniciar al cargar la página
window.onload = () => {
    agregarContenido(); // Llamar a la función para agregar contenido
};
