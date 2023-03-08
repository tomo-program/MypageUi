MAMPなどphpが動く環境下
- cd MypageUi
- composer install
- npm install
- npm run dev

.env.example をコピーして .env ファイルを作成
.envファイルの中の下記をご利用の環境に合わせて変更。

.envファイル
- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=laravel_mypage
- DB_USERNAME=mypage
- DB_PASSWORD=password123


php artisan migrate:fresh --seed
php artisan key:generate
php artisan serve

loginuser
email
test@test.com
pw
00000000



