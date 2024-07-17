import './bootstrap';
import 'bootstrap';
import '../sass/app.scss'

import '../css/app.css';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

document.addEventListener('DOMContentLoaded', () => {
    ClassicEditor
        .create(document.querySelector('#content'), {
            language: 'ru'
        })
        .catch(error => {
            console.error(error);
        });
});
