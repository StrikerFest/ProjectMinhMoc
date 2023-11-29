import './bootstrap';

// Import Summernote CSS
import 'summernote/dist/summernote-bs4.css';

// Import Summernote JS
import 'summernote/dist/summernote-bs4.js';

// Initialize Summernote
$(document).ready(function() {
    $('.summernote').summernote();
});