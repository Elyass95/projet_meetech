-- Table pour les utilisateurs
CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    sexe ENUM('Homme', 'Femme') NOT NULL,
    date_de_naissance DATE NOT NULL,
    profession VARCHAR(255),
    lieu_de_residence VARCHAR(255),
    situation_amoureuse VARCHAR(255),
    description_physique TEXT,
    informations_personnelles TEXT,
    photo VARCHAR(255),
    est_abonne BOOLEAN DEFAULT FALSE, -- Indique si l'utilisateur est abonné ou non
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table pour les équipes
CREATE TABLE equipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table pour les réservations de matchs
CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_utilisateur INT,
    id_equipe INT,
    date_resa DATETIME NOT NULL,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id),
    FOREIGN KEY (id_equipe) REFERENCES equipes(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table pour les messages entre utilisateurs
CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_emetteur INT,
    id_destinataire INT,
    contenu TEXT NOT NULL,
    lu BOOLEAN DEFAULT FALSE,
    date_envoi DATETIME NOT NULL,
    FOREIGN KEY (id_emetteur) REFERENCES utilisateurs(id),
    FOREIGN KEY (id_destinataire) REFERENCES utilisateurs(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table pour les offres d'abonnement
CREATE TABLE offres_abonnement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    description TEXT,
    duree_en_jours INT NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table pour enregistrer les abonnements des utilisateurs
CREATE TABLE abonnements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_utilisateur INT,
    id_offre_abonnement INT,
    date_debut DATETIME NOT NULL,
    date_fin DATETIME NOT NULL,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id),
    FOREIGN KEY (id_offre_abonnement) REFERENCES offres_abonnement(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table pour gérer les signalements de messages suspects
CREATE TABLE signalements_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_message INT,
    motif VARCHAR(255) NOT NULL,
    details TEXT,
    FOREIGN KEY (id_message) REFERENCES messages(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
