# $IGMA $ELL

<img src="img/icon.png" alt="SigmaSellIcon" width="500"/>


## Group ltw06g01


- Gonçalo Sampaio (up202206636) 33,3%

- João Proença (up202207835) 33,3%

- Tiago Santos (up202207073) 33,3%



## Install Instructions


    git clone https://github.com/FEUP-LTW-2024/ltw-project-2024-ltw06g01.git

    git checkout final-delivery-v1

    sqlite3 database.db > .read createdb.sql > .read populatedb.sql

    php -S localhost:9000


## Screenshots



(2 or 3 screenshots of your website)



## Implemented Features



**General**:



- [X] Register a new account.

- [X] Log in and out.

- [X] Edit their profile, including their name, username, password, and email.



**Sellers**  should be able to:



- [X] List new items, providing details such as category, brand, model, size, and condition, along with images.

- [X] Track and manage their listed items.

- [X] Respond to inquiries from buyers regarding their items and add further information if needed.

- [X] Print shipping forms for items that have been sold.



**Buyers**  should be able to:



- [X] Browse items using filters like category, price, and condition.

- [X] Engage with sellers to ask questions or negotiate prices.

- [X] Add items to a wishlist or shopping cart.

- [X] Proceed to checkout with their shopping cart (simulate payment process).



**Admins**  should be able to:



- [X] Elevate a user to admin status.

- [X] Introduce new item categories, sizes, conditions, and other pertinent entities.

- [ ] Oversee and ensure the smooth operation of the entire system.



**Security**:

We have been careful with the following security aspects:



- [X] **SQL injection**

- [X] **Cross-Site Scripting (XSS)**

- [X] **Cross-Site Request Forgery (CSRF)**



**Password Storage Mechanism**: hash_password&verify_password



**Aditional Requirements**:



We also implemented the following additional requirements (you can add more):



- [ ] **Rating and Review System**

- [ ] **Promotional Features**

- [ ] **Analytics Dashboard**

- [ ] **Multi-Currency Support**

- [ ] **Item Swapping**

- [ ] **API Integration**

- [ ] **Dynamic Promotions**

- [ ] **User Preferences**

- [ ] **Shipping Costs**

- [ ] **Real-Time Messaging System**
