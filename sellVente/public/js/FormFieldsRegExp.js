// Expressions régulières javascript pour valider les champs
var champsFormulaire = {
// usager
   name :
					   { exp    : /^[A-Za-zÀÇÉÈàçéèëêô\’\'\-\ ]{2,}([A-Za-zÀÇÉÈàçéèëêô\’\'\-\ ]{2,})*$/,
						 mesErr :  "Un ou plusieurs mots alphabétiques séparés par un espace, un tiret ou une apostrophe.",
						 requis : true },
   last_name :
					   { exp    : /^[A-Za-zÀÇÉÈàçéèëêô\’\'\-\ ]{2,}([A-Za-zÀÇÉÈàçéèëêô\’\'\-\ ]{2,})*$/,
						 mesErr :  "Un ou plusieurs mots alphabétiques séparés par un espace, un tiret ou une apostrophe.",
						 requis : true },
   first_name :
					   { exp    : /^[A-Za-zÀÇÉÈàçéèëêô\’\'\-\ ]{2,}([A-Za-zÀÇÉÈàçéèëêô\’\'\-\ ]{2,})*$/,
						 mesErr :  "Un ou plusieurs mots alphabétiques séparés par un espace, un tiret ou une apostrophe.",
						 requis : true },
   company :
					   { exp    : /^[A-Za-z0-9ÀÇÉÈàçéèëêô\’\'\-\,\ ]{2,}([A-Za-z0-9ÀÇÉÈàçéèëêô\’\'\-\,\ ]{2,})*$/,
						 mesErr :  "Un ou plusieurs mots alphanumériques séparés par un espace, un tiret ou une apostrophe.",
						 requis : false },
   company_nb :
					   { exp    : /^\d+$/,
						 mesErr : "Un nombre entier, le NEQ par exemple.",
						 requis : false },
   address :
					   { exp    : /^[A-Za-z0-9ÀÇÉÈàçéèëêô\’\'\-\,\ ]{2,}([A-Za-z0-9ÀÇÉÈàçéèëêô\’\'\-\,\ ]{2,})*$/,
						 mesErr :  "Un ou plusieurs mots alphanumériques séparés par un espace, un tiret ou une apostrophe, un point ou une virgule.",
						 requis : false },
   phone :
					   { exp    : /^[+]?(1\-|1\s|1|\d{3}\-|\d{3}\s|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/g,
						 mesErr :  "Ce n'est pas un format de numéro de téléphone reconnu.",
						 requis : false },
   email :
					   { exp    : /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9]([a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(\.[a-zA-Z0-9]([a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
						 mesErr : "Ce n'est pas un format d'adresse courriel reconnu.",
						 requis : true },
// pour un username différent de l'adresse courriel
   username :
					   { exp    : /^(?=.*\d.*)(?=.*[A-Z].*)(?=.*[a-z].*)\S{8,}$/,
						 mesErr : "8 caractères minimum sans espace, avec au moins un chiffre, une majuscule et une minuscule.",
						 requis : true },
   password :		   {          },
   password_confirmation : {      },
   join_preference :   {          },
   link_website :
					   { exp    : /(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/,
						 mesErr : "Ce n'est pas un format d'URL reconnu.",
						 requis : false },
   link_facebook :
					   { exp    : /(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/,
						 mesErr : "Ce n'est pas un format d'URL reconnu.",
						 requis : false },
   link_linkedin :
					   { exp    : /(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/,
                         mesErr : "Ce n'est pas un format d'URL reconnu.",
						 requis : false },
// annonce, d'un produit ou d'un service
   type :   		   {          },
   name :
					   { exp    : /^[A-Za-zÀÇÉÈàçéèëêô\’\'\-\ ]{2,}([A-Za-zÀÇÉÈàçéèëêô\’\'\-\ ]{2,})*$/,
						 mesErr :  "Un ou plusieurs mots alphabétiques séparés par un espace, un tiret ou une apostrophe.",
						 requis : true },
   description :
					   { exp    : /^[A-Za-z0-9ÀÇÉÈàçéèëêô\’\'\-\,\ ]{2,}([A-Za-z0-9ÀÇÉÈàçéèëêô\’\'\-\,\ ]{2,})*$/,
						 mesErr :  "Un ou plusieurs mots alphanumériques séparés par un espace, un tiret ou une apostrophe.",
						 requis : true },
   price :
					   { exp    : /^\d+(\.\d{1,2})?$/gm,
                         mesErr : "Des chiffres avec un point pour séparateur décimal, pas de virgule ni d'espace.",
						 requis : true },
   categories : 	   {          },
   realization_place :
					   { exp    : /^[A-Za-z0-9ÀÇÉÈàçéèëêô\’\'\-\,\ ]{2,}([A-Za-z0-9ÀÇÉÈàçéèëêô\’\'\-\,\ ]{2,})*$/,
						 mesErr :  "Un ou plusieurs mots alphanumériques séparés par un espace, un tiret ou une apostrophe.",
						 requis : false },
   duration :
					   { exp    : /^\d+$/,
						 mesErr : "Un nombre entier, un nombre de jours.",
						 requis : false },
   message :
					   { exp    : /^[A-Za-z0-9ÀÇÉÈàçéèëêô\’\'\-\,\ ]{2,}([A-Za-z0-9ÀÇÉÈàçéèëêô\’\'\-\,\ ]{2,})*$/,
					 	 mesErr:  "Un ou plusieurs mots alphanumériques séparés par un espace, un tiret ou une apostrophe, aucun des caractères !/$%?&*()<>{}:;#«»\"",
						 requis : true },
   
};
