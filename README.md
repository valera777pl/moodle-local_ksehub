# local_ksehub — Moodle → KSE Hub лише на читання, без копіювання посилань

[![Moodle plugin CI](https://github.com/valera777pl/moodle-local_ksehub/actions/workflows/ci.yml/badge.svg)](https://github.com/valera777pl/moodle-local_ksehub/actions/workflows/ci.yml)

*A Moodle local plugin that lets a student connect Moodle to KSE Hub (a Telegram bot for KSE students) with a read-only web service key, without copying links. GPL v3.*

**Завантажити:** [Releases](https://github.com/valera777pl/moodle-local_ksehub/releases) → `local_ksehub.zip`. Zip збирає GitHub Actions прямо з коду цього репозиторію, поруч лежить його SHA-256. Перед встановленням увесь код можна прочитати тут, у браузері: основне — [`connect.php`](connect.php) і [`classes/issuer.php`](classes/issuer.php).

Кожну зміну автоматично перевіряють на справжньому Moodle 4.2 і 4.5 ([CI](https://github.com/valera777pl/moodle-local_ksehub/actions/workflows/ci.yml)): синтаксис, стиль коду Moodle, документація, валідація плагіна, тести PHPUnit і Behat.

Плагін для Moodle KSE (4.2, перевірено також на 4.5). Він додає одну сторінку, `/local/ksehub/connect.php`, на якій студент підключає Moodle до KSE Hub:

1. У KSE Hub (Telegram) студент натискає «Підключити Moodle».
2. Відкривається сторінка плагіна в Moodle. Якщо студент не увійшов, Moodle веде його на вхід через Google (як `launch.php` з `oauthsso`).
3. Плагін показує, що саме отримає KSE Hub, і чекає, поки студент натисне «Дозволити».
4. Moodle видає ключ **лише для сервісу `kse_hub_readonly`**. Браузер студента передає ключ формою (POST) на адресу з налаштувань плагіна, і більше нікуди.

## Що плагін робить і чого не робить

- Видає ключ стандартною функцією Moodle `\core_external\util::generate_token()`. Термін дії такий самий, як у ядра (`tokenduration`, за замовчуванням 12 тижнів). Якщо в студента вже є дійсний ключ, плагін повертає його, а не робить другий.
- **Не видає ключ взагалі**, якщо в сервісі `kse_hub_readonly` є хоч одна функція, яка в Moodle не позначена як `read`. Додати туди функцію запису не вийде навіть випадково.
- **Не видає ключ адміністраторам сайту**, як і ядро Moodle: такий ключ читав би дані всіх.
- Студентам **не потрібне** право `moodle/webservice:createtoken`. Плагін має власне право `local/ksehub:connect`, і воно дає ключ лише для `kse_hub_readonly`.
- Не створює таблиць, не змінює файлів Moodle, не бачить паролів і нічого не зберігає сам. Ключ зберігає ядро Moodle в `external_tokens`.
- Ключ діє з правами самого студента: його курси, його оцінки, його дедлайни.

## Налаштування в Moodle (приблизно 15 хвилин)

**1. Сервіс.** Site administration → Server → Web services → External services → *Add*:

| Поле | Значення |
|---|---|
| Name | KSE Hub (read-only) |
| Short name | `kse_hub_readonly` |
| Enabled | так |
| Authorised users only | ні |
| Required capability | порожньо |
| Can upload files / Can download files | ні |

**2. Функції сервісу:** *Functions* → *Add functions*. Рівно ці 10, і всі вони лише читають:

```
core_webservice_get_site_info
core_enrol_get_users_courses
gradereport_overview_get_course_grades
gradereport_user_get_grade_items
core_calendar_get_calendar_events
mod_assign_get_assignments
mod_assign_get_submission_status
mod_quiz_get_quizzes_by_courses
mod_quiz_get_user_attempts
core_course_get_contents
```

**3. Встановити плагін** одним зі способів:
- Site administration → Plugins → *Install plugins* → завантажити `local_ksehub.zip`;
- або розпакувати папку `ksehub` у `local/` (вийде `local/ksehub`) і відкрити Site administration → *Notifications*.

**4. Налаштування плагіна:** Site administration → Plugins → Local plugins → *KSE Hub*. Адреса повернення вже стоїть: `https://kse-hub.vercel.app/api/moodle-plugin/return`. Нічого міняти не треба.

**5. Права:** нічого міняти не треба.
- `webservice/rest:use` у ролі *Authenticated user* уже є, бо в KSE увімкнено «Enable mobile web services» і працює застосунок Moodle. Якщо цього права немає, плагін так і напише.
- `local/ksehub:connect` після встановлення є в *Authenticated user* за замовчуванням.

## Перевірка

Увійдіть **студентським акаунтом** (адміністратор ключ не отримає) і відкрийте:

```
https://teaching.kse.org.ua/local/ksehub/connect.php?state=check.only.test
```

Має відкритися сторінка «Підключити Moodle до KSE Hub» з кнопкою «Дозволити». Після «Дозволити» браузер перейде на сторінку KSE Hub зі словами «Посилання застаріло». Для перевірочного посилання це правильно, бо справжнє посилання дає сам KSE Hub. Ключ «KSE Hub (read-only)» з'явиться в Manage tokens (Site administration → Server → Web services).

Якщо щось налаштовано не так, плагін не покаже загальну помилку, а напише, що саме змінити: немає сервісу, сервіс вимкнено, у сервісі є функція запису, вимкнено REST тощо.

## Як вимкнути

- **Ключ одного студента:** Site administration → Server → Web services → *Manage tokens*. Студент може й сам: Налаштування → Ключі безпеки.
- **Усе одразу:** вимкнути сервіс `kse_hub_readonly`, або очистити адресу повернення в налаштуваннях плагіна, або видалити плагін (Plugins overview → Uninstall).

## Файли

| Файл | Що в ньому |
|---|---|
| `version.php` | назва й версія |
| `connect.php` | сторінка: вхід → «Дозволити» → повернення в KSE Hub |
| `classes/issuer.php` | перевірки й видача ключа |
| `settings.php` | одне поле: адреса повернення |
| `db/access.php` | право `local/ksehub:connect` |
| `classes/privacy/provider.php` | що залишає Moodle (Privacy API) |
| `lang/en`, `lang/uk` | тексти |
| `tests/` | PHPUnit і Behat; на кожну зміну проганяються на справжньому Moodle 4.2 і 4.5 |
| `LICENSE` | GNU GPL v3, як і сам Moodle |
