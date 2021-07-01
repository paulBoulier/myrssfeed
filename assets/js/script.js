//On recupere tous les bouton des cards
const selectButtonCard = document.querySelectorAll("button[id=modalButton]");
//On recupere l'id du titre de la modal
const selectTitleModal = document.getElementById("exampleModalLabel");
//On recupere l'id de l'image de la modal
const selectImgModal = document.getElementById("imgModal");
//On recupere l'id pour la description de la modal
const selectDescModal = document.getElementById("descModal")
//On recupere l'id pour mettre le lien de l'article dans la modal
const selectLinkModal = document.getElementById("linkArticle");


selectButtonCard.forEach(element => {
    element.addEventListener("click", function() {
       selectTitleModal.innerHTML = this.dataset.title
       selectImgModal.setAttribute("src", this.dataset.img);
       selectDescModal.innerHTML = this.dataset.desc
       selectLinkModal.setAttribute("href", this.dataset.link)
    })
});