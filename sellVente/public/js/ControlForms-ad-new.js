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

			// par défaut au départ == produit
			// --------------------------------------------------------------------
				// puisque produit alors enlever les div realisation_place et duration
				$(".if_product_hide_slow").hide("slow");

				// sélectionner les radios product et service pour gérer le checked
				var elmRadioProduct = document.querySelector("input[type='radio']#choice-product");
				var elmRadioService = document.querySelector("input[type='radio']#choice-service");
				elmRadioProduct.setAttribute("checked", "");

				// sélectionner le label price pour gérer son for et innerhtml
				var elmLabelPrice = document.querySelector("label#price");
				elmLabelPrice.innerHTML = "Prix :";
				elmLabelPrice.setAttribute("for", "price_produit");

				// sélectionner le input type text name="price" pour gérer son id et placeholder
				var elmInputTextPrice = document.querySelector("input[type='text'].price");
				elmInputTextPrice.setAttribute("id", "price_produit");
				elmInputTextPrice.setAttribute("placeholder", "Prix du produit");

			// ./par défaut au départ == produit
			
			// pour enlever les champs de saisie qui ne sont pas présents pour un produit 
			// et modifier le champs de saisie price
			// --------------------------------------------------------------------------
			$("#choice-product").click(function () {

				if (elmRadioService.getAttribute("checked", "")) { elmRadioService.removeAttribute("checked", "") }
				elmRadioProduct.setAttribute("checked", "");

				$("#realization_place").defaultValue = "Un produit n'a pas de place de réalisation";
				$("#duration").defaultValue = 0;

				// label price, gérer son innerhtml, son id et placeholder
				elmLabelPrice.innerHTML = "Prix :";
				elmLabelPrice.setAttribute("for", "price_produit");

				// input type text name="price", gérer son id et placeholder
				elmInputTextPrice.setAttribute("id", "price_produit");
				elmInputTextPrice.setAttribute("placeholder", "Prix du produit");

				// enlever les div realisation_place et durée
				$(".if_product_hide_slow").hide("slow");

			});
			
			// pour mettre les champs de saisie qui sont présents pour un service 
			// et modifier le champs de saisie price
			// ------------------------------------------------------------------
				$("#choice-service").click(function () {

					if (elmRadioProduct.getAttribute("checked", "")) { elmRadioProduct.removeAttribute("checked", "") }
					elmRadioService.setAttribute("checked", "");

					// label price, gérer son innerhtml, son id et placeholder
					elmLabelPrice.innerHTML = "Budget :";
					elmLabelPrice.setAttribute("for", "price_service");

					// input type text name="price", gérer son id et placeholder
					elmInputTextPrice.setAttribute("id", "price_service");
					elmInputTextPrice.setAttribute("placeholder", "Valeur estimée du service");

					// rendre visible les div realisation_place et durée
					$(".if_product_hide_slow").show("slow");

				});
			// ./pour mettre et enlever les labels et champs voulu

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
