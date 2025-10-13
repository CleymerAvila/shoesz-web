# Shoesz Web 👟

## Description
An e-commerce web application specialized in shoe sales, offering a modern and user-friendly interface for customers to browse and purchase footwear.


## Main Sections
<img width="1897" height="830" alt="image" src="https://github.com/user-attachments/assets/5c0fa991-940c-4c28-bd52-a07adccc4a00" />
<img width="1886" height="829" alt="image" src="https://github.com/user-attachments/assets/2f9d4273-d829-41e1-bf8c-02f37ba129db" />
<img width="1895" height="833" alt="image" src="https://github.com/user-attachments/assets/9198421d-da85-40ce-b242-9ef16f94a8eb" />
<img width="1884" height="823" alt="image" src="https://github.com/user-attachments/assets/3dd6031e-a80d-4196-8a07-fac0fbd37668" />


## Login and Register
<img width="1886" height="982" alt="image" src="https://github.com/user-attachments/assets/7101cf0a-743e-4095-9ae7-eafbb345c871" />
<img width="1883" height="979" alt="image" src="https://github.com/user-attachments/assets/cb3eb99c-a5bc-4ae6-92ed-b39aa182d516" />


## Admin Dashboard Products CRUD Operations
<img width="1886" height="985" alt="image" src="https://github.com/user-attachments/assets/1b3cc311-70fc-4818-aa5f-4aece590e2e4" />


## Technologies Used
- HTML5
- CSS3
- JavaScript
- PHP
- MySQL
- XAMPP

## Features
- User authentication
- Responsive design
- Admin panel for product management
- Http Requets

## Prerequisites
- XAMPP installed on your system
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web browser (Chrome, Firefox, Safari, etc.)

## Installation
1. Clone the repository
```bash
git clone git@github-personal:CleymerAvila/shoesz-web.git
```

2. Move the project to your XAMPP htdocs folder
```bash
mv shoesz-web C:/xampp/htdocs/
```

3. Start XAMPP Apache and MySQL services

4. Import the database
- Open phpMyAdmin (http://localhost/phpmyadmin)
- Create a new database named 'shoesz_db'
- Import the database file from `database/shoesz_db.sql`

5. Configure database connection
- Open `config/database.php`
- Update database credentials if needed

6. Access the application
```
http://localhost/shoesz-web
```

## Project Structure
```
shoesz-web/
├── config/
│   ├── config.php
│   └── db.php
├── controllers/
│   ├── productController.php
│   └── userController.php
├── middlewares/
│   ├── auth.php
│   ├── guest.php
│   └── role.php
├── models/
│   ├── Product.php
│   └── User.php
├── public/
│   ├── css/
│   ├── img/
│   └── js/
├── views/
│   ├── layout/
│   ├── products/
│   └── users/
└── index.php
```

## Contributing
1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details

## Contact
Your Name - [@cleycode](https://twitter.com/cleycode)
Project Link: [https://github.com/CleymerAvila/shoesz-web](https://github.com/CleymerAvila/shoesz-web)
