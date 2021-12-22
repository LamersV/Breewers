<?php

/**
 * @return \PDO
 */
session_start();
global $conn;
$conn = getConnection();

function getConnection()
{
    $dsn = "mysql:host=localhost;charset=utf8";
    $user = "root";
    $password = "";

    try {
        $pdo = new PDO($dsn, $user, $password);
        
        if(verifyDatabase($pdo)){ createTables($pdo); }

        $dsn = "mysql:host=localhost;dbname=breewers;charset=utf8";
        $pdo = new PDO($dsn, $user, $password);

        return $pdo;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function verifyDatabase($conn){
    $database = ("Create Database breewers");
    $database = $conn->prepare($database);
    if($database->execute()){
        return true;
    }else{
        return false;
    }
}

function createTables($conn){
    $database = ("Use breewers;
    
    Create Table TAdmUser (
        ID_AdmUser int auto_increment,
        FirstName varchar(30),
        SurName varchar(60),
        Email varchar(50),
        Psswrd varchar(65),
        Image varchar(40),
        LastUpdate timestamp,
        primary key (ID_AdmUser)
    );
    
    Insert into TAdmUser values (1, 'Admin', 'Istrator', 'admin@admin.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'pic-1.jpg', NOW());
    
    Create Table TUser (
        ID_User int auto_increment,
        Uname varchar(30),
        Email varchar(50),
        Passwrd varchar(64),
        Uimage varchar(40),
        SigninDate date,
        LastUpdate timestamp,
        primary key (ID_User)
    );
    
    Insert into TUser values	(1, 'Victor Lamers', 'victor.lamers@email.com', SHA2('1234', 256), 'pic-1.jpg', NOW(), NOW()),
                                (2, 'Administrator', 'admin@email.com', SHA2('1234', 256), 'pic-0.jpg', '2021-10-29', NOW()),
                                (3, 'Mario Alberto', 'marioalberto@email.com', SHA2('1234', 256), 'pic-2.jpg', '2021-10-31', NOW()),
                                (4, 'Bruno Celso', 'brunocelso@email.com', SHA2('1234', 256), 'pic-3.jpg', '2021-11-01', NOW());
    
    Create Table TCountry (
        ID_Country int auto_increment,
        CName varchar(20),
        primary key (ID_Country)
    );
    
    Insert into TCountry values (1, 'Paraná'), (2, 'São Paulo');
    
    Create Table TCity (
        ID_City int auto_increment,
        ID_Country int,
        CName varchar(20),
        primary key (ID_City),
        foreign key (ID_Country) references TCountry (ID_Country)
    );
    
    Insert into TCity values (1, 1, 'Curitiba'), (2, 2, 'São Paulo');
    
    Create Table TBrand (
        ID_Brand int auto_increment,
        BName varchar(50),
        primary key (ID_Brand)
    );
    
    Insert into TBrand values (1, 'Breewers´s Mead'), (2, 'Skall'), (3, 'Odin Drinks');
    
    Create Table TCategory (
        ID_Category int auto_increment,
        CName varchar(50),
        primary key (ID_Category)
    );
    
    Insert into TCategory values (1, 'Hidromel'), (2, 'Cerveja'), (3, 'Vinho'), (4, 'Vodka'), (5, 'Whisky');
    
    Create Table TCreditCard (
        N_Credit char(16),
        ID_User int,
        CName varchar(60),
        CDate date,
        CCode char(3),
        primary key (N_Credit),
        foreign key (ID_User) references TUser (ID_User)
    );
    
    Insert into TCreditCard values ('5555444433332222', 1, 'Victor Lamers', '2028-10-01', '123');
    
    Create Table TAddress (
        ID_Address int auto_increment,
        ID_User int,
        ID_City int,
        Address1 varchar(60),
        Address2 varchar(50),
        Number char(6),
        primary key (ID_Address),
        foreign key (ID_City) references TCity (ID_City),
        foreign key (ID_User) references TUser (ID_User)
    );
    
    Insert into TAddress values (1, 1, 1, 'Rua Presidente Laurindo', 'Sobrado 1', '320');
    
    Create Table TPhone (
        DDD char(3),
        PNumber char(9),
        ID_User int,
        primary key (DDD, PNumber)
    );
    
    Insert into TPhone values ('001', '999220132', 1);
    
    Create Table TShipping (
        ID_Shipping int auto_increment,
        SName varchar(50),
        Price float,
        Days int,
        primary key (ID_Shipping)
    );
    
    Insert into TShipping values (1, 'Sedex', 15.00, 3), (2, 'BR Entregas', 19.00, 2);
    
    Create Table TProduct (
        ID_Product int auto_increment,
        ID_Brand int,
        Pname varchar(50),
        Info varchar(30),
        Descrip varchar(200),
        Image varchar(100),
        Price float,
        Rating int,
        RatingCount int,
        primary key (ID_Product),
        foreign key (ID_Brand) references TBrand (ID_Brand)
    );
    
    Insert into TProduct values (1, 1, 'Hidromel Tradicional', '500ml', 'Hidromel tradicional de 500ml fermentado a partir do mel mais puro e gostoso. Uma verdadeira DELICIA!', 'tradicional.png', 57.00, 10, 2),
                                (2, 1, 'Hidromel Redfruits', '500ml', 'Hidromel de 500ml fermentado a partir de mel e frutas vermelhas!', 'redfruits.png', 62.00, 9, 1),
                                (3, 2, 'Cerveja AngBeer', '250ml', 'Cerveja a base de lupulo feito da mais pura agua!', 'angbeer.png', 8.50, 9, 1),
                                (4, 3, 'BlackCrow´s Wine', '300ml', 'Vinho tinto suave.', 'blackcrow.png', 11.00, 8, 1),
                                (5, 2, 'SnowSpirit Vodka', '500ml', 'A mais pura vodka, um verdadeiro espirito da neve atiçando seu paladar.', 'snowspirit.png', 49.00, 0, 0),
                                (6, 1, 'Hidromel OakAged', '500ml', 'Hidromel fermentado a partir do mel em um barril de carvalho. Um sabor irresistivel', 'oakaged.png', 68.00, 10, 1),
                                (7, 3, 'Bjorn IronWhisky', '300ml', 'Whisky para um verdadeiro viking', 'bjorn.png', 82.00, 9, 1);
    Create Table TWishlist (
        ID_User int,
        ID_Product int,
        primary key (ID_User, ID_Product),
        foreign key (ID_Product) references TProduct (ID_Product),
        foreign key (ID_User) references TUser (ID_User)
    );
    
    Insert into TWishlist values (1, 1), (1, 3), (1, 5);
    
    Create Table TReview (
        ID_User int,
        ID_Product int,
        Rating int,
        Review varchar (200),
        Rdate date,
        primary key (ID_User, id_product),
        foreign key (ID_Product) references TProduct (ID_Product),
        foreign key (ID_User) references TUser (ID_User)
    );
    
    Insert into TReview values 	(1, 1, 10, 'Incrivel, o sabor é suave e delicioso', '2021-10-30'),
                                (4, 1, 10, 'Delicioso, sabor fantastico', '2021-10-30'), 
                                (3, 3, 9, 'Incrivel, a textura e o amargor da cerveja são incriveis', '2021-10-31'), 
                                (1, 2, 9, 'O sabor de frutas vermelhas é fantastico', '2021-10-30'), 
                                (3, 4, 9, 'Vinho suave e gostoso', '2021-11-01'), 
                                (4, 7, 9, 'Sabor fantantistco, otimo para uma noite incrivel', '2021-11-03'), 
                                (4, 6, 10, 'O leve sabor de carvalho traz o que existe de melhor em um hidromél', '2021-11-01');
    
    Create Table TProductCategory (
        ID_Product int,
        ID_Category int,
        primary key (ID_Category, ID_Product),
        foreign key (ID_Category) references TCategory (ID_Category),
        foreign key (ID_Product) references TProduct (ID_Product)
    );
    
    Insert into TProductCategory values (1, 1), (2, 1), (3, 2), (4, 3), (5, 4), (6, 1), (7, 5);
    
    Select TProduct.PName
    from TProduct, TCategory, TProductCategory
    where TProduct.ID_Product = TProductCategory.ID_Product
    and TCategory.ID_Category = TProductCategory.ID_Category
    and TCategory.CName = 'Hidromel';
    
    Create Table TStock (
        ID_Product int,
        Quantity int,
        primary key (ID_Product)
    );
    
    Insert into TStock values (1, 100), (2, 45), (3, 99), (4, 13);
    
    Create Table TOrder (
        ID_Order int auto_increment,
        ID_User int,
        ID_Shipping int,
        TotalValue float,
        Status boolean,
        OrderDate date,
        DueDate date,
        primary key (ID_Order),
        foreign key (ID_User) references TUser (ID_User),
        foreign key (ID_Shipping) references TShipping (ID_Shipping)
    );
    
    Create Table TCartProduct (
        ID_User int,
        ID_Product int,
        Quantity int,
        primary key (ID_Product, ID_User),
        foreign key (ID_Product) references TProduct (ID_Product),
        foreign key (ID_User) references TUser (ID_User)
    );
    
    Insert into TCartProduct values (1, 1, 1), (1, 3, 2);
    
    Create Table TPayment (
        ID_Payment int auto_increment,
        ID_User int,
        ID_Order int,
        TotalValue float,
        DueDate date,
        Status boolean,
        PaymentDate date,
        primary key (ID_Payment),
        foreign key (ID_User) references TUser (ID_User),
        foreign key (ID_Order) references TOrder (ID_Order)
    )
    ");

    $database = $conn->prepare($database);
    $database->execute();
}