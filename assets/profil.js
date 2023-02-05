

    // Cacher le bloc au chargement de la page
document.getElementById("blockNewPhoto").style.display = "none";

// Afficher le bloc lors d'un clic sur une image
document.getElementById("myImage").addEventListener("click", function(){
    document.getElementById("blockNewPhoto").style.display = "block";
});