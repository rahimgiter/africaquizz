# Base de données Africa Quizz

Backup PostgreSQL complet : questions publiées, users, admins, pays, catégories, badges.

## Restauration

### Étape 1 : Lancer Docker

docker-compose up -d

### Étape 2 : Attendre que Postgres soit prêt

Attendre 10 secondes après le démarrage.

### Étape 3 : Décompresser le backup

Expand-Archive africaquizz_YYYYMMDD_HHMM.sql.zip -DestinationPath .

### Étape 4 : Restaurer dans Postgres

Get-Content africaquizz_YYYYMMDD_HHMM.sql | docker-compose exec -T postgres psql -U root africaquizz

### Étape 5 : Vérifier

docker-compose exec api php artisan tinker --execute="echo App\Models\Question::where('status','PUBLIEE')->count();"

Doit retourner : 1709

## Contenu

- 1709 questions publiées (11 catégories)
- 54 pays africains
- 12 catégories
- 8 badges
- 5 admins
- 0 brouillon

## Comptes admin

| Rôle | Email | Mot de passe |
|------|-------|--------------|
| SuperAdmin | superadmin@africaquizz.com | super12345 |
| Admin | admin@africaquizz.com | admin12345 |
| Relecteur | relecteur@africaquizz.com | relecteur123 |
| Éditeur | editeur@africaquizz.com | editeur123 |

## Notes

- Les 7 lots défectueux (750 questions) n'ont pas été importés.
- Ils seront re-générés avec un prompt amélioré (sans ';' dans les textes).
- 1745 questions au total ont été importées, 1709 publiées avec succès.
