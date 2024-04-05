# beberapa command yang digunakan untuk membuat aplikasi CRUD sederhana

- php artisan make:controller NamaController --resource --model=NamaModel
- php artisan make:model NamaModel
- php artisan make:migration create_nama_table
- php artisan migrate
- php artisan migrate:rollback
- php artisan route:list