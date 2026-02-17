
# CS2 Tournament API

Backend API для турнира по Counter-Strike 2. Построен на Laravel.

## Технологии

- Laravel 12
- MySQL
- PHP 8.4+

## Функционал

- Регистрация команд (капитан + 5 игроков)
- Получение списка команд
- Удаление команд (с паролем)

## Установка и запуск

# Клонировать репозиторий
git clone https://github.com/ВАШ_АККАУНТ/CS2_backend.git
cd CS2_backend

# Установить зависимости
composer install

# Настроить окружение
cp .env.example .env

Отредактируйте .env файл (база данных, порт и т.д.)

# Запустить миграции
php artisan migrate

# Запустить сервер
php artisan serve --port=8000


### API Endpoints

| Метод | URL | Описание |
|-----|-------------|----------|
| POST | `/api/register-team` | Регистрация команды |
| GET | `/api/teams` | Получить все команды |
| DELETE | `/api/teams/{id}` | Удалить команду |

## Безопасность

Удаление команд защищено паролем 123456
Все данные хранятся в БД
Пример запроса регистрации

POST /api/register-team
{
  "team_name": "DreamTeam",
  "captain_name": "Иван Иванов",
  "phone": "+79991234567",
  "email": "team@mail.com",
  "players": [
    {
      "full_name": "Петр Петров",
      "birth_date": "2000-01-01",
      "nickname": "s1mple",
      "steam_link": "https://steamcommunity.com/id/player",
      "phone": "+79991234568",
      "is_captain": true,
      "is_contact_person": true
    }
  ]
}
## Структура базы данных

Таблица teams

id
team_name
captain_name
phone
email
status (pending/approved/rejected)
created_at
updated_at
Таблица players

id
team_id
full_name
birth_date
nickname
steam_link
phone
is_captain
is_contact_person
created_at
updated_at
