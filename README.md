## Установка

1.  Клонировать репозиторий:
    ```bash
    git clone [https://github.com/your-username/laravel-product-api.git](https://github.com/your-username/laravel-product-api.git)
    ```
2.  Перейти в каталог проекта:
    ```bash
    cd laravel-product-api
    ```
3.  Установить зависимости с помощью Composer:
    ```bash
    composer install
    ```
4.  Создать файл `.env` из `.env.example`:
    ```bash
    cp .env.example .env
    ```
5.  Сгенерировать ключ приложения:
    ```bash
    php artisan key:generate
    ```
6.  Настроить подключение к базе данных в файле `.env`:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=product_catalog
    DB_USERNAME=root
    DB_PASSWORD=your_password
    ```
7.  Выполнить миграции и сидирование данных (если сидеры настроены):
    ```bash
    php artisan migrate --seed
    ```
8.  Запустить сервер разработки:
    ```bash
    php artisan serve
    ```
    API будет доступен по адресу: `http://127.0.0.1:8000`.

## Маршруты API

Ниже приведены основные маршруты, доступные в API.

### 1. Получить список продуктов

Запрос для получения полного списка продуктов.

-   **URL**: `/api/products`
-   **Метод**: `GET`
-   **Пример запроса**:
    ```bash
    curl [http://127.0.0.1:8000/api/products](http://127.0.0.1:8000/api/products)
    ```

### 2. Фильтрация продуктов по свойствам

Позволяет фильтровать продукты по одному или нескольким свойствам. Параметры фильтрации передаются в строке запроса.

-   **URL**: `/api/products`
-   **Метод**: `GET`
-   **Параметры запроса**:
    -   `properties[ИмяСвойства1]=Значение1`
    -   `properties[ИмяСвойства2]=Значение2`
-   **Пример запроса** (фильтрация по цвету "Красный" и бренду "Samsung"):
    ```bash
    curl "[http://127.0.0.1:8000/api/products?properties](http://127.0.0.1:8000/api/products?properties)[Цвет]=Красный&properties[Бренд]=Samsung"
    ```

### Пример ответа API

```json
[
    {
        "id": 1,
        "name": "Товар 1",
        "price": 2000,
        "quantity": 10,
        "property_values": [
            {
                "property": {
                    "name": "Цвет"
                },
                "value": "Красный"
            },
            {
                "property": {
                    "name": "Бренд"
                },
                "value": "Samsung"
            }
        ]
    }
    // ... другие продукты
]