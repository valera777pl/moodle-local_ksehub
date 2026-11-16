<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Ukrainian strings for local_ksehub.
 *
 * @package    local_ksehub
 * @copyright  2026 KSE Hub
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allow'] = 'Дозволити';
$string['badstate'] = 'Посилання пошкоджене або неповне. Відкрий підключення ще раз з KSE Hub.';
$string['consentrevoke'] = 'Вимкнути можна будь-коли: у KSE Hub або в Moodle → Налаштування → Ключі безпеки.';
$string['consenttitle'] = 'Підключити Moodle до KSE Hub';
$string['consentwhat'] = 'KSE Hub зможе читати твої курси, оцінки, дедлайни завдань і спроби тестів. Здавати роботи, писати повідомлення чи щось змінювати в Moodle він не зможе.';
$string['consentwho'] = 'Вхід виконано як {$a}.';
$string['ksehub:connect'] = 'Підключати Moodle до KSE Hub ключем лише на читання';
$string['noadmins'] = 'Адміністратори сайту так ключ не отримують: їхній ключ читав би дані всіх. Скористайтеся студентським акаунтом.';
$string['norestuse'] = 'Цьому акаунту не можна користуватися REST веб-сервісом: ролі «Authenticated user» потрібне право webservice/rest:use.';
$string['notconfigured'] = 'Плагін KSE Hub не налаштований: адреса повернення порожня або не починається з https:// (Site administration → Plugins → Local plugins → KSE Hub).';
$string['pluginname'] = 'KSE Hub';
$string['privacy:metadata:ksehub'] = 'Щоб підключити Moodle до KSE Hub, ключ веб-сервісу користувача лише на читання передається в KSE Hub, який читає ним курси, оцінки й дедлайни самого користувача.';
$string['privacy:metadata:ksehub:state'] = 'Службове значення від KSE Hub: з якого акаунта KSE Hub почали підключення.';
$string['privacy:metadata:ksehub:token'] = 'Ключ користувача для веб-сервісу лише на читання kse_hub_readonly.';
$string['restdisabled'] = 'Протокол REST вимкнено (Site administration → Server → Web services → Manage protocols).';
$string['returnbutton'] = 'Повернутися в KSE Hub';
$string['returning'] = 'Повертаємось у KSE Hub…';
$string['returnurl'] = 'Адреса повернення';
$string['returnurl_desc'] = 'Сторінка KSE Hub, яка отримує ключ лише на читання. Працюють лише адреси https://. Очистіть поле, щоб вимкнути плагін.';
$string['serviceempty'] = 'У веб-сервісі «{$a}» немає функцій (Site administration → Server → Web services → External services → Functions).';
$string['servicemissing'] = 'Веб-сервіс «{$a}» не існує або вимкнений (Site administration → Server → Web services → External services).';
$string['servicenotreadonly'] = 'У веб-сервісі «kse_hub_readonly» є функції, які не лише читають: {$a}. Приберіть їх: плагін видає лише ключі на читання.';
