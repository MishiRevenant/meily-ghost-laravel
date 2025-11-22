document.addEventListener('DOMContentLoaded', function() {
    // 1. Capturamos los elementos del HTML
    const inputBuscador = document.getElementById('buscador');
    const selectCategoria = document.getElementById('filtro-categoria');
    const selectEstilo = document.getElementById('filtro-estilo');
    const productos = document.querySelectorAll('.producto-item');
    const mensajeNoResultados = document.getElementById('no-results');

    // 2. Función maestra de filtrado
    function filtrar() {
        const textoBusqueda = inputBuscador.value.toLowerCase().trim();
        const categoriaSeleccionada = selectCategoria.value; // ID o 'todos'
        const estiloSeleccionado = selectEstilo.value;       // ID o 'todos'

        let contadorVisibles = 0;

        productos.forEach(producto => {
            // Leemos los datos guardados en el HTML (data-nombre, data-categoria...)
            const nombreProd = producto.dataset.nombre; 
            const catProd = producto.dataset.categoria; 
            const estiloProd = producto.dataset.estilo;

            // Verificamos las 3 condiciones
            const coincideNombre = nombreProd.includes(textoBusqueda);
            const coincideCategoria = (categoriaSeleccionada === 'todos') || (catProd === categoriaSeleccionada);
            const coincideEstilo = (estiloSeleccionado === 'todos') || (estiloProd === estiloSeleccionado);

            // Si cumple TODO, se muestra. Si falla algo, se oculta.
            if (coincideNombre && coincideCategoria && coincideEstilo) {
                producto.classList.remove('hidden');
                contadorVisibles++;
            } else {
                producto.classList.add('hidden');
            }
        });

        // Mostramos mensaje si no hay nada visible
        if (contadorVisibles === 0) {
            mensajeNoResultados.classList.remove('hidden');
        } else {
            mensajeNoResultados.classList.add('hidden');
        }
    }

    // 3. Escuchamos los eventos (cuando el usuario toca algo)
    inputBuscador.addEventListener('input', filtrar); // Al escribir
    selectCategoria.addEventListener('change', filtrar); // Al cambiar categoría
    selectEstilo.addEventListener('change', filtrar);    // Al cambiar estilo

    // 4. Función extra para el botón "Ver todo de nuevo"
    window.resetFiltros = function() {
        inputBuscador.value = '';
        selectCategoria.value = 'todos';
        selectEstilo.value = 'todos';
        filtrar(); // Vuelve a mostrar todo
    };
});