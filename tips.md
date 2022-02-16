### 路由链接
routes/web.php
```php
Route::get('/students','StudentController@index');
```
#### 创建控制器
命令行:
```
php artisan make:controller(参数 创建控制器) StudentController(参数 控制器名)
```
#### 创建模型
```
php atrisan make:model(参数 创建模型) Student(参数 模型名)