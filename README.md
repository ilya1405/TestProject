1. Выполнить composer update
2. Создать .env
    2.1. Изменить в .env BROADCAST_DRIVER на pusher и в параметры PUSHER_APP_ID, PUSHER_APP_KEY, PUSHER_APP_SECRET ввести любые значения (напр. 123456)
3. Создать базу данных
4. Выполнить php artisan migrate и php artisan db:seed
5. Запустить сервер php artisan serve 
6. В каталоге test/http-requests находятся тестовые запросы
7. Чтобы получить для пользователя роль admin надо вручную добавить запись в табл. 'model_has_roles' для нужного пользователя
8. Выполнить php artisan websockets:serve 
9. Перейти по ссылке http://127.0.0.1:8000/laravel-websockets для просмотра событий websocket
