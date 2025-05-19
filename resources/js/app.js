import './bootstrap';
import Alpine from 'alpinejs';
import deskDropHandler from './desk-drop-handler';

window.Alpine = Alpine;
Alpine.data('deskDropHandler', deskDropHandler);
Alpine.start();