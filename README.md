## 關於專案

這是一個簡單的帳號管理練習。

## 開發工具

這個專案使用以下工具進行開發:

- Laravel 6
- jQuery
- Bootstrap 4
- jQuery Validation Plugin

## 環境需求

要建構這個專案需要具備以下工具：

- Composer
- npm

## 建構方法

首先將移動到要放置專案的資料夾，之後執行：
```
git clone https://github.com/Magixube/AccountManager.git .
```
之後安裝專案必須的套件
```
composer install
npm install
```
複製`.env.example`並命名為`.env`
```
cp .env.example .env
```
產生金鑰
```
php artisan key:generate
```
修改`.env`，重點在於資料庫設定，建議為專案建立一個空的資料庫。
之後建立需要的資料表
```
php artisan migrate
```
最後執行
```
php artisan serve --host <your_host> --port <your_port>
```