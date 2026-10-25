# Africa Quizz API v1.1.0

Documentation et contrats API pour l'application Africa Quizz.

## Comptes de test

| Role | Email | Mot de passe |
|------|-------|--------------|
| SuperAdmin | superadmin@africaquizz.com | super12345 |
| Admin | admin@africaquizz.com | admin12345 |
| Relecteur | relecteur@africaquizz.com | relecteur123 |
| Editeur | editeur@africaquizz.com | editeur123 |
| Redacteur | redacteur@africaquizz.com | redacteur123 |

## Base URL

http://localhost:8000

## Authentification

1. POST /api/v1/auth/login ou /api/v1/admin/auth/login
2. Recuperer le token dans la reponse
3. Header : Authorization: Bearer <token>

## Modules disponibles

- Auth utilisateur (register, login, guest, logout, verify-email, forgot-password)
- Quiz (sessions, answers, finish)
- Defi du jour (daily-challenge)
- Classements (leaderboards)
- Progression (me/progress, me/export, me)
- Revision (review/queue, review/sessions)
- Defis amis (challenges)
- Duels (duels)
- Ligues (leagues)
- Push notifications (push/vapid-key, push/subscribe)
- Admin (auth, dashboard, questions, imports, media, reports)
- SuperAdmin (users, admins, badges, categories, countries, regions)

## Fichiers de documentation

- routes.json : Toutes les routes Laravel en JSON
- postman_collection.json : Collection Postman importable
- docs.html : Documentation HTML a ouvrir dans le navigateur
- openapi.json : (si disponible) specification OpenAPI

## Etat de la base

- 19 questions (dont 8 importees par IA)
- 5 admins, 54 pays, 12 categories, 8 badges
