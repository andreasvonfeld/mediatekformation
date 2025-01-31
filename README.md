# Mediatekformation
Readme d'origine : https://github.com/CNED-SLAM/mediatekformation
## Présentation
Ce site, développé avec Symfony 6.4, permet d'accéder aux vidéos d'auto-formation proposées par une chaîne de médiathèques et qui sont aussi accessibles sur YouTube.<br> 
Voici ce que peut faire l'utilisateur dans la partie front office :<br>
![img1](https://github.com/user-attachments/assets/9c5c503b-738d-40cf-ba53-36ba4c0209e8)

Voici ce que peut faire l'utilisateur dans la partie back office :<br>
![schema categories](https://github.com/user-attachments/assets/4fa007d5-c6ce-4d1f-891a-cbfa38527159)
![schema formations](https://github.com/user-attachments/assets/9ec470d2-e855-41f5-938e-68441cb556ef)
![schema playlists](https://github.com/user-attachments/assets/c1808f0e-2631-409c-bbeb-4eea8cf92f06)

## Partie Front Office

### Page 1 : l'accueil
Cette page présente le fonctionnement du site et les 2 dernières vidéos mises en ligne.<br>
La partie du haut contient une bannière (logo, nom et phrase présentant le but du site) et le menu permettant d'accéder aux 3 pages principales (Accueil, Formations, Playlists).<br>
Le centre contient un texte de présentation avec, entre autres, les liens pour accéder aux 2 autres pages principales.<br>
La partie basse contient les 2 dernières formations mises en ligne. Cliquer sur une image permet d'accéder à la page 3 de présentation de la formation.<br>
Le bas de page contient un lien pour accéder à la page des CGU : ce lien est présent en bas de chaque page excepté la page des CGU.<br>
![image](https://github.com/user-attachments/assets/790e3882-0a45-41e0-9c2c-d454d64f9dea)

### Page 2 : les formations
Cette page présente les formations proposées en ligne (accessibles sur YouTube).<br>
La partie haute est identique à la page d'accueil (bannière et menu).<br>
La partie centrale contient un tableau composé de 5 colonnes :<br>
•	La 1ère colonne ("formation") contient le titre de chaque formation.<br>
•	La 2ème colonne ("playlist") contient le nom de la playlist dans laquelle chaque formation se trouve.<br>
•	La 3ème colonne ("catégories") contient la ou les catégories concernées par chaque formation (langage…).<br>
•	La 4ème colonne ("date") contient la date de parution de chaque formation.<br>
•	LA 5ème contient la capture visible sur YouTube, pour chaque formation.<br>
Au niveau des colonnes "formation", "playlist" et "date", 2 boutons permettent de trier les lignes en ordre croissant ("<") ou décroissant (">").<br>
Au niveau des colonnes "formation" et "playlist", il est possible de filtrer les lignes en tapant un texte : seuls les lignes qui contiennent ce texte sont affichées. Si la zone est vide, le fait de cliquer sur "filtrer" permet de retrouver la liste complète.<br> 
Au niveau de la catégorie, la sélection d'une catégorie dans le combo permet d'afficher uniquement les formations qui ont cette catégorie. Le fait de sélectionner la ligne vide du combo permet d'afficher à nouveau toutes les formations.<br>
Par défaut la liste est triée sur la date par ordre décroissant (la formation la plus récente en premier).<br>
Le fait de cliquer sur une miniature permet d'accéder à la troisième page contenant le détail de la formation.<br>
![image](https://github.com/user-attachments/assets/53db42a9-6d0e-4d60-b0ab-5f77e5c7fe2e)

### Page 3 : détail d'une formation
Cette page n'est pas accessible par le menu mais uniquement en cliquant sur une miniature dans la page "Formations" ou une image dans la page "Accueil".<br>
La partie haute est identique à la page d'accueil (bannière et menu).<br>
La partie centrale est séparée en 2 parties :<br>
•	La partie gauche contient la vidéo qui peut être directement visible dans le site ou sur YouTube.<br>
•	La partie droite contient la date de parution, le titre de la formation, le nom de la playlist, la liste des catégories et sa description détaillée.<br>
![image](https://github.com/user-attachments/assets/4d33febb-1175-42f9-a069-18bc6ec77829)

### Page 4 : les playlists
Cette page présente les playlists.<br>
La partie haute est identique à la page d'accueil (bannière et menu).<br>
La partie centrale contient un tableau composé de 3 colonnes :<br>
•	La 1ère colonne ("playlist") contient le nom de chaque playlist.<br>
•	La 2ème colonne ("catégories") contient la ou les catégories concernées par chaque playlist (langage…).<br>
•	La 3ème contient un bouton pour accéder à la page de présentation de la playlist.<br>
Au niveau de la colonne "playlist", 2 boutons permettent de trier les lignes en ordre croissant ("<") ou décroissant (">"). Il est aussi possible de filtrer les lignes en tapant un texte : seuls les lignes qui contiennent ce texte sont affichées. Si la zone est vide, le fait de cliquer sur "filtrer" permet de retrouver la liste complète.<br> 
Au niveau de la catégorie, la sélection d'une catégorie dans le combo permet d'afficher uniquement les playlists qui ont cette catégorie. Le fait de sélectionner la ligne vide du combo permet d'afficher à nouveau toutes les playlists.<br>
Par défaut la liste est triée sur le nom de la playlist.<br>
Cliquer sur le bouton "voir détail" d'une playlist permet d'accéder à la page 5 qui présente le détail de la playlist concernée.<br>
![image](https://github.com/user-attachments/assets/65fd56cb-83b3-4859-beba-95b0585715cc)

### Page 5 : détail d'une playlist
Cette page n'est pas accessible par le menu mais uniquement en cliquant sur un bouton "voir détail" dans la page "Playlists".<br>
La partie haute est identique à la page d'accueil (bannière et menu).<br>
La partie centrale est séparée en 2 parties :<br>
•	La partie gauche contient les informations de la playlist (titre, liste des catégories, description).<br>
•	La partie droite contient la liste des formations contenues dans la playlist (miniature et titre) avec possibilité de cliquer sur une formation pour aller dans la page de la formation.<br>
![image](https://github.com/user-attachments/assets/80b7d2d9-b326-4a0d-addd-ed5da8b40701)

## Partie Back Office

### Page 6 : L'authentification
![schema auth](https://github.com/user-attachments/assets/9e42428a-6a1f-42a0-b4a4-4c8e6ba58d40)<br>
Cette page permet d'accéder à la partie admin.<br>
Voici les informations pour se connecter :<br>
•	identifiant : LudovicBlanc<br>
•	mot de passe : 0000<br>
![image](https://github.com/user-attachments/assets/69622c86-10c3-490f-8e30-b71833f89f86)

### Page 7 : Les formations (partie admin)
Cette page permet la gestion des formations.<br>
Chaque page de la partie administrateur contient une partie cliquable permettant la déconnexion de l'utilisateur.
La partie haute contient désormais un bouton permettant l'ajout de formations.<br>
La partie centrale contient un tableau composé de 6 colonnes :<br>
•	La 1ère colonne ("formation") contient le titre de chaque formation.<br>
•	La 2ème colonne ("playlist") contient le nom de la playlist dans laquelle chaque formation se trouve.<br>
•	La 3ème colonne ("catégories") contient la ou les catégories concernées par chaque formation (langage…).<br>
•	La 4ème colonne ("date") contient la date de parution de chaque formation.<br>
•	LA 5ème contient la capture visible sur YouTube, pour chaque formation.<br>
•	LA 6ème contient deux boutons : un pour modifier et l'autre pour supprimer une formation.<br>
Au niveau des colonnes "formation", "playlist" et "date", 2 boutons permettent de trier les lignes en ordre croissant ("<") ou décroissant (">").<br>
Au niveau des colonnes "formation" et "playlist", il est possible de filtrer les lignes en tapant un texte : seuls les lignes qui contiennent ce texte sont affichées. Si la zone est vide, le fait de cliquer sur "filtrer" permet de retrouver la liste complète.<br> 
Au niveau de la catégorie, la sélection d'une catégorie dans le combo permet d'afficher uniquement les formations qui ont cette catégorie. Le fait de sélectionner la ligne vide du combo permet d'afficher à nouveau toutes les formations.<br>
Par défaut la liste est triée sur la date par ordre décroissant (la formation la plus récente en premier).<br>
Le fait de cliquer sur une miniature permet d'accéder à la troisième page contenant le détail de la formation.<br>
Le fait de cliquer sur le bouton d'ajout d'une formation permet d'accéder au formulaire d'ajout d'une formation.<br>
Le fait de cliquer sur le bouton de modification d'une formation permet d'accéder au formulaire de modification d'une formation.<br>
Le fait de cliquer sur le bouton de suppression d'une formation affichera une fenêtre de validation de suppression.<br>

![image](https://github.com/user-attachments/assets/346a5805-4798-4601-aff1-cf99536f566c)

### Page 8 : Ajout d'une formation (partie admin)
Cette page permet la création d'une formation via un formulaire de 6 champs.<br>
•	Le 1er champs ("Date") contient la date de création de la formation et elle ne peut être postérieure à aujourd'hui.<br>
•	Le 2ème champs ("Title") contient le titre de la formation.<br>
•	Le 3ème champs ("Description") contient la description complète de la formation.<br>
•	Le 4ème champs ("Video_ID") contient l'ID Youtube de la vidéo permettant d'y accéder (on le trouve dans l'URL après le "v=").<br>
•	Le 5ème champs ("Playlist") contient toutes les playlists du site.<br>
•	Le 6ème champs ("Categories") contient toutes les catégories du site.<br>
A la fin du formulaire, si toutes les informations sont bien remplies, l'administrateur peut appuyer sur "Submit" pour créer la formation.<br>

![image](https://github.com/user-attachments/assets/894a1294-1777-4010-bddb-6ab9fa3c849b)

### Page 9 : Modification d'une formation (partie admin)
Cette page est identique à la page d'ajout sauf que les informations concernant la formation en cours de modification sont déjà préremplies.<br>
•	Le 1er champs ("Date") contient la date de création de la formation et elle ne peut être postérieure à aujourd'hui.<br>
•	Le 2ème champs ("Title") contient le titre de la formation.<br>
•	Le 3ème champs ("Description") contient la description complète de la formation.<br>
•	Le 4ème champs ("Video_ID") contient l'ID Youtube de la vidéo permettant d'y accéder (on le trouve dans l'URL après le "v=").<br>
•	Le 5ème champs ("Playlist") contient toutes les playlists du site.<br>
•	Le 6ème champs ("Categories") contient toutes les catégories du site.<br>
A la fin du formulaire, si toutes les informations sont bien remplies, l'administrateur peut appuyer sur "Submit" pour créer la formation.<br>

![image](https://github.com/user-attachments/assets/33e547f9-03b4-464b-b308-bb1752faa312)

### Page 10 : Les playlists (partie admin)
Cette page présente les playlists.<br>
La partie centrale contient un tableau composé de 4 colonnes :<br>
•	La 1ère colonne ("playlist") contient le nom de chaque playlist.<br>
•	La 2ème colonne ("catégories") contient la ou les catégories concernées par chaque playlist (langage…).<br>
•	La 3ème contient un bouton pour accéder à la page de présentation de la playlist.<br>
•	La 4ème contient deux boutons, un pour modifier et l'autre pour supprimer une playlist.<br>
Au niveau de la colonne "playlist", 2 boutons permettent de trier les lignes en ordre croissant ("<") ou décroissant (">"). Il est aussi possible de filtrer les lignes en tapant un texte : seuls les lignes qui contiennent ce texte sont affichées. Si la zone est vide, le fait de cliquer sur "filtrer" permet de retrouver la liste complète.<br> 
Au niveau de la catégorie, la sélection d'une catégorie dans le combo permet d'afficher uniquement les playlists qui ont cette catégorie. Le fait de sélectionner la ligne vide du combo permet d'afficher à nouveau toutes les playlists.<br>
Par défaut la liste est triée sur le nom de la playlist.<br>
Cliquer sur le bouton "voir détail" d'une playlist permet d'accéder à la page 5 qui présente le détail de la playlist concernée.<br>
Le fait de cliquer sur le bouton de modification d'une playlist permet d'accéder au formulaire de modification d'une playlist.<br>
Le fait de cliquer sur le bouton de suppression d'une playlist affichera une fenêtre de validation de suppression.<br>

![image](https://github.com/user-attachments/assets/049fdd02-d380-42ec-a21c-d6037b9d6db2)

### Page 11 : Modification d'une playlist (partie admin)
Cette page est identique à la page d'ajout sauf que les informations concernant la playlist en cours de modification sont déjà préremplies.<br>
•	Le 1er champs ("Title") contient le titre de la playlist.<br>
•	Le 2ème champs ("Description") contient la description complète de la formation.<br>
A la fin du formulaire, si toutes les informations sont bien remplies, l'administrateur peut appuyer sur "Submit" pour créer la playlist.<br>

![image](https://github.com/user-attachments/assets/12d37fab-c768-4844-a1c9-4bdc776e1f46)

### Page 12 : Les catégories (partie admin)
Cette page présente les catégories.<br>
La partie haute de la page contient un petit formulaire pour créer une catégorie.
La partie centrale contient un tableau composé de 2 colonnes :<br>
•	La 1ère colonne ("nom") contient le nom de chaque catégorie.<br>
•	La 2ème colonne ("actions") contient le bouton d'action de suppression.<br>

![image](https://github.com/user-attachments/assets/6d937864-84a1-4a18-b8cd-f328c707664b)

## La base de données
La base de données exploitée par le site est au format MySQL.
### Schéma conceptuel de données
Voici le schéma correspondant à la BDD.<br>
![img7](https://github.com/user-attachments/assets/f3eca694-bf96-4f6f-811e-9d11a7925e9e)
<br>video_id contient le code YouTube de la vidéo, qui permet ensuite de lancer la vidéo à l'adresse suivante :<br>
https://www.youtube.com/embed/<<<video_id>>>
### Relations issues du schéma
<code><strong>formation (id, published_at, title, video_id, description, playlist_id)</strong>
id : clé primaire
playlist_id : clé étrangère en ref. à id de playlist
<strong>playlist (id, name, description)</strong>
id : clé primaire
<strong>categorie (id, name)</strong>
id : clé primaire
<strong>formation_categorie (id_formation, id_categorie)</strong>
id_formation, id_categorie : clé primaire
id_formation : clé étrangère en ref. à id de formation
id_categorie : clé étrangère en ref. à id de categorie</code>

Remarques : 
Les clés primaires des entités sont en auto-incrémentation.<br>
Le chemin des images (des 2 tailles) n'est pas mémorisé dans la BDD car il peut être fabriqué de la façon suivante :<br>
"https://i.ytimg.com/vi/" suivi de, soit "/default.jpg" (pour la miniature), soit "/hqdefault.jpg" (pour l'image plus grande de la page d'accueil).

## Test de l'application en local
- Vérifier que Composer et Git (ou équivalent) sont installés sur l'ordinateur.
- Cloner le code dans un IDE via GitHub.<br>
- Une fois les modifications effectuées un commit et push devrait mettre à jour le site.
- De préférence, ouvrir l'application dans un IDE professionnel. L'adresse pour la lancer est : https://mediatekformation.worldlite.fr/mediatekformation/public/index.php<br>
