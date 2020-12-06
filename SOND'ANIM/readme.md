Projet réalisé par:

* Karen Azoulay
* Benjamin Burstein
* Alexandre Caramel

1. Ajout / Suppression d'amis:

   Ajout: Pour Ajouter des amis, il faut se rendre sur le profil, cliquer sur le bouton MES AMIS et Ajouter de nouveaux amis.

   Suppression : Pour supprimer des amis, il faut se rendre sur le profil MES AMIS et sur le bouton supprimer.

2. Recherche d'Amis:

    se rendre sur le profil -> MES AMIS -> et utiliser la barre de recherche.

3. Page sondage: 

    enregistrer un sondage : se connecter -> cliquer sur le menu burger -> nouveau sondage. seulement des liens d'images internet sont enregistrable

    voir un sondage : se connecter -> se rendre sur la page HOME (Accueil) -> cliquer sur le sondage souhaité.

    archiver les sondages : les sondages sont automatiquement archivés, dès lors que la date de fin rentré par le créateur est depassé.

    répondre au sondage : Se connecter -> cliquer sur le sondage -> cliquer sur la reponse. PS: le créateur du sondage ne peut répondre a son propre sondage.

    Voir les résultats en temps réel : les résultats sont automatiquement mise a jour tous les 0.5s.

    Commenter un sondage : Se connecter -> cliquer sur un sondage -> se rendre en bas de page -> ajouter un commentaire. résultats actualisé toutes les 0.5s

    Partager le Sondage : Se connecter -> se rendre sur le sondage -> PARTAGER le sondage.


Les utilisateurs :
Nous vous avons exporté notre base de donnée et nous avons créé 3 membres avec comme pseudo et mdp :
- alex 
- karen
- benji


    4.Parti explication BDD
    Nom: projetphp  'si l'importation bug créer une bdd avec ce nom en utf-8-general-ci puis importer le fichier'
    Détail des tables:

    -user : id de la table, information de l'utilisateur, statut->permet de savoir si l'utilisateur est connecté(false: 0, true: 1), date_inscription

    -question: id de la table, varchar de la question, le lien internet des images, date_fin et user_id_author qui est une clé étrangère de user

    -friend: id de la table, 
                            user_id_A->clé étrangère de user, correspond à l'utilisateur de la session qui fait l'ajout d'amis
                             user_id_B->clé étrangère de user, correspond à l'utilisateur qui se fait ajouté en ami

    -answer: id de la table, 
                            id_question_id->clé étrangère de question 
                            le choix en varchar,nombre correspond au nombre de foix qu'une réponse s'est fait voté
                            résultat, NULL d'origin prend une valeur booléenne de 0 si elle n'est pas la réponse gagnante sinon 1
    -user-answer: id de  la table, 
                                user_id->clé étrangère de user
                                answer_id->clé étrangère de answer
                                id_question->clé étrangère de question
-user_comment: id de la table, user_id clé étrangère user, id_question_id clé étrangère question, le commenatire en varchar et la date du post






