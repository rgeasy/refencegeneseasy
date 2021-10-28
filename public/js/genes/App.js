/**
 * Main application element, simply registers the web components
 */
const app = async () => {
    console.log("App\n");
    alert(document.getElementsByTagName("html")[0].getAttribute("lang"));
    let gene = new Gene();
	gene.execute();
};

document.addEventListener("DOMContentLoaded", app);