// code JavaScript pour contrôler valider les champs de formulaire on change et submit
// -----------------------------------------------------------------------------------
class ControlerFormulaire {
	
	f;
	controles;
	regExp;
	erreur = false;

	/**
	 * méthode constructor
     * d'instanciation d'un objet qui gère les contrôles d'un formulaire
	 *  
	 * @params eFormulaire       = élément formulaire
	 *         champsFormulaire  = champs et paramètres des contrôles
	 */
	constructor(eFormulaire, champsFormulaire) {

		this.f = eFormulaire;
		this.controles = champsFormulaire;
		
		// validation on change
		// --------------------
		this.f.addEventListener("change", (evt) => { // fonction fléchée pour pouvoir utiliser this
			
			let nomChamp = evt.target.name;
			let c = this.controles[nomChamp];

			// requis gère l'affichage du mot Obligatoire
			this.valider(this.f.elements[nomChamp], c.requis, c.exp, c.mesErr, c.min, c.max);

		});

		// validation on submit
		// --------------------
		this.f.addEventListener("submit", function(evt) {

			this.erreur = false;

			// validation de tous les champs
			// -----------------------------
			for (let nomChamp in this.controles) {
				let c = this.controles[nomChamp];
				this.valider(this.f.elements[nomChamp], c.requis, c.exp, c.mesErr, c.min, c.max);
			}

			// envoi du formulaire si aucune erreur
			// ------------------------------------
			if (this.erreur) evt.preventDefault();
						
		}.bind(this)); // fonction bind pour associer this de l'objet à cette fonction
	}

	/**
	 * méthode de validation d'un champ
	 * équivaut à une méthode privée
	 *  
	 * @params e         = élément du formulaire à contrôler
	 *         requis    = true si champ obligatoire, false sinon
	 *         regExp    = expression régulière (optionnel)
	 *         msgRegExp = message d'erreur si les conditions ne sont pas respectées (optionnel)
	 *         min       = valeur minimale (optionnel) 
	 *         max       = valeur maximale (optionnel)
	 */
	valider(e, requis = true, regExp = null , msgRegExp = null, min = null, max = null) {

		var msgErr = "";

		// contrôles successifs selon les paramètres
		// -----------------------------------------
		var val = e.value.trim();
		if (val === "") {
			if (requis) msgErr = "Obligatoire";
		} else {
			if (regExp !== null) {
				if (!regExp.test(val)) {
					msgErr = msgRegExp;
				} else {
					if ((min !== null  && val < min) || (max !== null && val > max)) {
						msgErr = msgRegExp;
					}
				}
			}
		}

		// création dynamique d'un élément SPAN s'il n'existe pas
		// pour y insérer le message d'erreur (msgErr)
		// qui est réinitialisé à vide s'il n'y a pas d'erreur 
		// ------------------------------------------------------
		if (typeof e.length !== "undefined" && e.nodeName !== "SELECT") { // radio boutons
			e = e[e.length - 1].nextElementSibling;
		} else {
			if (e.nodeName !== "SELECT") e.value = val; // éléments autres que select et radio boutons, recadrage de la saisie
		}

		if (e.nextSibling.nodeName !== "SPAN") {
			e.parentNode.insertBefore(document.createElement("span"), e.nextSibling);
		}

		e.nextSibling.innerHTML = msgErr;
		e.nextSibling.classList.add('text-danger');

		// si erreur (message d'erreur non vide)
		// on met la variable globale erreur à true
		// pour signifier qu'il y a au moins un champ erroné
		// et empêcher l'envoi des données au serveur
		// -------------------------------------------------
		if (msgErr !== "") this.erreur = true;

	}
}
