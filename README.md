# Commandes symfony

## Initialisation d'un projet
>composer create-project symfony/skeleton sf4

### Server local symfony
>composer require server --dev

### Installer les commandes maker
>composer require maker --dev

#### Exemple d'utilisation
>.\bin\console make:entity

### Installer les annotations
>composer require annotations

### Installer les méthodes de débug
>composer require debug --dev

### Installer Twig
>composer require twig

### Installation de l'ORM (DOCTRINE)
>composer require orm

## Commande Maker

### Créer un controller
>.\bin\console make:controller

### Créer une entité (Entity)
>.\bin\console make:entity
>
>>*Peut être réutiliser pour modifier une entité*

### Créer un formulaire
>.\bin\console make:form

## Doctrine

### Création de la base de données
>.\bin\console doctrine:database:create

### Création du fichier de migration
>.\bin\console make:migration

### Migration des données (Entré en base de données)
>.\bin\console doctrine:migrations:migrate


