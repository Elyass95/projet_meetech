# GALACTECH FOOTBALL

![image](https://github.com/Elyass95/projet_meetech/assets/133212281/f75be5a0-138a-4094-9255-ae0c3172a341)


## Bienvenue sur le dépôt GitHub de GALACTECH FOOTBALL

Un site web dédié à la gestion et à l'organisation d'équipes de football. Ce projet permet aux utilisateurs de s'inscrire, de rejoindre des équipes et de consulter les informations sur les différentes équipes disponibles.

---

## Fonctionnalités

- **Inscription et Connexion des Utilisateurs** : Les utilisateurs peuvent s'inscrire et se connecter pour accéder aux fonctionnalités du site.
- **Gestion des Équipes** : Les utilisateurs peuvent consulter les équipes disponibles, en rejoindre une ou en créer une nouvelle.
- **Affichage des Équipes** : Les informations sur les équipes, telles que le nom, le nombre de joueurs maximum et le terrain, sont affichées sur la page d'accueil.
- **Recherche de Joueurs** : Les utilisateurs peuvent rechercher d'autres joueurs par pseudo.

---

## Technologies Utilisées

### Frontend :

- HTML5, CSS3
- Bootstrap pour la mise en page réactive et les composants UI
- Google Fonts et Font Awesome pour les polices et les icônes

### Backend :

- PHP pour la logique côté serveur
- PDO pour l'interaction avec la base de données MySQL

### Base de Données :

- MySQL

---

## Installation et Configuration

### Prérequis

- Serveur web (Apache, Nginx, etc.)
- PHP 7.4 ou supérieur
- MySQL 5.7 ou supérieur

### Étapes d'Installation

1. **Cloner le dépôt** :

    ```sh
    git clone https://github.com/Elyass95/projet_meetech.git
    ```

2. **Configurer la base de données** :

    - Créez une base de données MySQL nommée `projet`.
    - Importez le fichier `projet.sql` pour créer les tables nécessaires.
    - Mettez à jour les informations de connexion à la base de données dans le fichier `index.php` :

      ```php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "projet";
      ```

3. **Déployer les fichiers** :

    - Placez les fichiers du projet dans le répertoire racine de votre serveur web.

4. **Accéder au site** :

    - Ouvrez votre navigateur et accédez à `http://localhost/projet_meetech`.

---

## Structure du Projet

- **`index.php`** : Page d'accueil affichant les équipes disponibles.
- **`connexion.php`** : Page de connexion des utilisateurs.
- **`inscription.php`** : Page d'inscription des utilisateurs.
- **`ajouter_equipe.php`** : Script pour ajouter une nouvelle équipe.
- **`ajouter_utilisateur_equipe.php`** : Script pour ajouter un utilisateur à une équipe.
- **`profil.php`** : Page de profil de l'utilisateur.
- **`deconnexion.php`** : Script pour déconnecter un utilisateur.
- **`css/`** : Dossier contenant les fichiers CSS.
- **`img/`** : Dossier contenant les images utilisées sur le site.
- **`js/`** : Dossier contenant les fichiers JavaScript.

---

## Contribuer

Les contributions sont les bienvenues ! Si vous souhaitez améliorer ce projet, veuillez suivre les étapes suivantes :

1. **Fork ce dépôt**.
2. **Créez une branche pour votre fonctionnalité** :

    ```sh
    git checkout -b fonctionnalite/amélioration
    ```

3. **Commitez vos modifications** :

    ```sh
    git commit -am 'Ajout d'une nouvelle fonctionnalité'
    ```

4. **Pushez la branche** :

    ```sh
    git push origin fonctionnalite/amélioration
    ```

5. **Créez une Pull Request**.

---

## Licence

Ce projet est sous licence MIT. Veuillez consulter le fichier [LICENSE](LICENSE) pour plus d'informations.

---

## Contact

Pour toute question ou suggestion, veuillez contacter l'équipe à [contact@galactechfootball.com](mailto:contact@galactechfootball.com).

Merci d'utiliser **GALACTECH FOOTBALL** ! Nous espérons que vous apprécierez notre plateforme pour gérer vos équipes de football.
