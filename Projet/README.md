Pour comprendre le but de ce projet, je vous laisse ouvrir le .pdf qui fait état du sujet de ce projet.
L'intégralité de ce site Web (base de données, API, backend, frontend) a été créé par ma camarade Camille Gourdier et moi-même.

Pour faire tourner notre projet sur votre navigateur:

Regardez le fichier config dans le backend et entrez vos informations. Utilisez le fichier db_init.php dans backend pour copier notre base de données. Ajoutez, dans le dossier config du frontend, votre lien vous redirigeant vers l'interieur de votre dossier backend.

Ensuite ouvrez simplement le dossier frontend du projet dans votre navigateur et connectez vous avec le login "fabluc".

En ce qui concerne la partie théorique:

La quantité de kcal par aliment est calculée par la formule suivante: kcal=9quantité_glucide + 4(quantité_proteine+quantitélipide)

Pour chaque utilisateur les besoins journaliers sont calculés via la formule suivante: Hommes=[(10 * POIDS) + (6.25 * TAILLE) - (5 * AGE_MOYENNE_DE_LA_TRANCHE8AGE) + 5] Femmes=[(10 * POIDS) + (6.25 * TAILLE) - (5 * AGE_MOYENNE_DE_LA_TRANCHE8AGE) - 161] Que l'utilisateur soit un homme ou une femme, le tout est multiplié par :

1.3 si l'intensité de la pratique sportive est faible
1.6 si l'intensité de la pratique sportive est modérée
1.75 si l'intensité de la pratique sportive est élevée (formule de Mittflin St Jeor adaptée)