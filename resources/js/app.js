import "./bootstrap";
import Alpine from "alpinejs";
import axios from "axios";

// Setup global objects
window.Alpine = Alpine;
window.axios = axios;

// Alpine start
Alpine.start();

window._ = _;

// Axios config
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
