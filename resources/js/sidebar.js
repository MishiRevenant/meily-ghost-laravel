// Espera a que todo el HTML esté cargado antes de ejecutar el script
document.addEventListener('DOMContentLoaded', function() {

    const sidebar = document.getElementById('sidebar');

    // Solo si el sidebar existe en esta página
    if (sidebar) {
      
      sidebar.addEventListener('mouseenter', () => {
        sidebar.classList.add('expanded');
        document.body.classList.add('sidebar-expanded');
      });
      
      sidebar.addEventListener('mouseleave', () => {
        sidebar.classList.remove('expanded');
        document.body.classList.remove('sidebar-expanded');
      });
    }

});