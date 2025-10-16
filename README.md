# Shoesz Web 👟

## Description
An e-commerce web application specialized in shoe sales, offering a modern and user-friendly interface for customers to browse and purchase footwear.


## Main Sections
<img width="943" height="398" alt="image" src="https://github.com/user-attachments/assets/b5e059d3-e573-4287-9c9c-dcbd02f14fef" />
<img width="939" height="485" alt="image" src="https://github.com/user-attachments/assets/a47bff39-e558-42bc-8731-6357faeccb04" />
<img width="942" height="487" alt="image" src="https://github.com/user-attachments/assets/90b2dda1-c807-4840-907e-aec0b9bd96a4" />
<img width="945" height="488" alt="image" src="https://github.com/user-attachments/assets/1095d0d8-a488-4a4e-b88f-cc676efd0f08" />



## Login and Register
<img width="942" height="492" alt="image" src="https://github.com/user-attachments/assets/5e29bfdd-e056-4ab5-9751-6f7bdb2f6fd8" />
<img width="937" height="487" alt="image" src="https://github.com/user-attachments/assets/ed58640e-87cd-42b9-aa8b-976c8755ce46" />



## Admin Dashboard Products CRUD Operations
<img width="941" height="492" alt="image" src="https://github.com/user-attachments/assets/cebb8e78-39bf-4406-9adf-385a1fadc8e1" />



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
