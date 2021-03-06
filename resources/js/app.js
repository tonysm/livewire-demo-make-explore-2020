/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

const Turbolinks = require("turbolinks");
Turbolinks.start();

document.addEventListener('turbolinks:load', () => {
    window.livewire.rescan();
});
