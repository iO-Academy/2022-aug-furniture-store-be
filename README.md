# 2022-aug-furniture-store-be

## Furniture Store OOP API

## 1. About
### Content
This is an OOP API built to work with an existing [front-end](https://github.com/iO-Academy/furniture-store-fe) as part of
Project 5 for the [iO Academy Full Stack Track course](https://io-academy.uk/).

### Objective
We were tasked with building an OOP API for use with an existing front-end. The components of this build include:
+ Writing a script to construct a database from an existing JSON file
+ Creating an OOP API based on an exising [API documentation](https://github.com/iO-Academy/furniture-api-template)

This project was designed to test our knowledge pertaining to the following:
+ OOP programming working to SOLID principles
+ Agile best practices (SCRUM)
+ Git workflow and best practices as a development team
---

## 2. Getting Started
### Dependencies
To use this app you will require the following dependencies

    - PHP version 7.4.0+, 
    - MySQL version 5.6 + 
    - Composer version 1+
    - PHPUnit version 6.5+
---

## 3. Install and Setup
### 3.1 Backend

1. Clone this repo: `git clone git@github.com:iO-Academy/2022-aug-furniture-store-be.git`
2. Navigate into the newly created repo: `cd 2022-aug-furniture-store-be`
3. From the root of the project run: `composer install`

### 3.2 Frontend
This backend is to be used in conjunction with an existing front-end. If you wish to use this, navigate to
`https://github.com/iO-Academy/furniture-store-fe` and follow the instructions.
The repo contains six branches, to use the front-end with this API you need to checkout to branch `story-3`.

### 3.3 Database

This project was built within a docker environment with a custom configuration for the database connection. As such you
may need to update your local settings to connect to the database. If so complete the following within `2022-aug-furniture-store-be`:

1. Navigate to `docs/json_toDB.php` and change `$host = 'db'` to `$host = '127.0.0.1'`
2. Then navigate to `src/DataAccess/Database.php` and change `$host = 'db'` to `$host = '127.0.0.1'`

To set the database up locally:

1. Create a new database in your MySQL Database GUI called `furniture`. You may need to refresh the Database in your GUI
to see the changes.
2. In Terminal navigate to the repo and run the command `php docs/json_to_DB.php`
3. You should now have two new tables in this database called `categories` and `products`
---

## 4. Using the API
This API only supports GET requests.
### Return all product categories

* **URL**

  /categories.php

* **Method:**

  `GET`

* **URL Params**

  There are no URL params

  **Example:**

  `/categories.php`

* **Success Response:**

    * **Code:** 200 <br />
      **Content:** <br />

  ```json
  {
    "message": "Successfully retrieved categories",
    "data":
    [
        {
            "id": "1",
            "name": "Chair",
            "products": "82"
        },
        {
            "id": "2",
            "name": "Table",
            "products": "37"
        }
    ]
  }
  ```

* **Error Response:**

    * **Code:** 500 SERVER ERROR <br />
      **Content:** `{"message": "Unexpected error", "data": []}`
---

### Return all products in a category

* **URL**

  /products.php

* **Method:**

  `GET`

* **URL Params**

  **Required:**

  `cat` - category ID for the required products

  **Optional:**

  `currency` - currency unit to provide price in. Choose from: `GBP`,`USD`,`EUR`,`YEN`. Default is `GBP`  
  `instockonly` - `boolean` choose to only return in-stock products. Default is `0`

  **Example:**

  `/products.php?cat=2&currency=GBP&instockonly=0`

* **Success Response:**

    * **Code:** 200 <br />
      **Content:** <br />

  ```json
  {
    "message": "Successfully retrieved products",
    "data":
    [
        {
          "id": 1,
          "price": "48.61",
          "stock": 8,
          "color": "Teal"
        },
        {
          "id": 2,
          "price": "182.08",
          "stock": 2,
          "color": "Green"
        }
    ]
  }
  ```

* **Error Response:**

    * **Code:** 400 BAD REQUEST <br />
      **Content:** `{"message": "Invalid category id", "data": []}`

    * **Code:** 400 BAD REQUEST <br />
      **Content:** `{"message": "Invalid currency", "data": []}`

    * **Code:** 500 SERVER ERROR <br />
      **Content:** `{"message": "Unexpected error", "data": []}`

## Authors

Carina Volkes - [@Carinav](https://github.com/Carinav)

Fatima Seghir - [@fatimaseghir](https://github.com/fatimaseghir)

Henry Percy - [@henryppercy](https://github.com/henryppercy)

Owen May (Scrum Master) - [@O-MAY](https://github.com/O-MAY)

Pedro Nunes- [@TherealGuah](https://github.com/TherealGuah)

Phone Naing - [@PNaing107](https://github.com/PNaing107)

Richard Bingham - [@RBingham99](https://github.com/RBingham99)