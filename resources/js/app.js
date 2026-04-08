import './bootstrap';

import tinymce from 'tinymce';

// Elementos básicos necesarios
import 'tinymce/themes/silver/theme';
import 'tinymce/icons/default/icons';
import 'tinymce/models/dom/model';

window.addEventListener('DOMContentLoaded', () => {
    tinymce.init({
        selector: '#txtEditor', // ID de tu <textarea>
        license_key: 'gpl',     // Necesario en versiones 7+ para modo free
        language: 'es',         // Si quieres el idioma en español
        promotion: false,       // Quita el botón de "Upgrade"
        base_url: '/build/assets/js/tinymce', // Ruta donde Vite copió los archivos
        suffix: '.min',
        plugins: 'lists link image table code help wordcount',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | removeformat | help'
    });
});

