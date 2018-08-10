# Project-eMove

## Entités 

- User (Utilisateur)
- Vehicle (Véhicule)
- Brand (Marque)
- Model (Modèle)
- Classification (Gamme)
- Reservation (Réservation)
- Pricing (Tarif)
- Status (Status)
- Bill (Facture)
- Type (Type véhicule)


## A propos

 - Admin :
    username : admin
    password : admin
 - User :
    username : user
    password : test
    
## Fixtures

### User
```
INSERT INTO `user` (`id`, `username`, `email`, `password`, `isAdmin`, `image`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$13$ww0FmoH.RcjAQuXgc9iT/eQrvEIxS.V/CqyV.rERzoaD.upw6fvhK', 1, NULL),
(2, 'user', 'user@gmail.com', '$2y$13$jL13EtObjRoH/HtVkslIwOzibHWANami70QKoj.6P6UslCn9ApjEq', NULL, NULL);
```

### Brand
```
INSERT INTO `brand` (`id`, `name`, `image`) VALUES
(1, 'Renault', ''),
(2, 'BMW', ''),
(3, 'Hyundai', ''),
(4, 'Tesla', ''),
(5, 'Vastro', ''),
(6, 'Matra', ''),
(7, 'Govecs', ''),
(8, 'E-max', '');
```

### Model
```
INSERT INTO `model` (`id`, `brand_id`, `name`, `hour_rate`, `kilometer_rate`, `type_id`, `classification_id`, `image`) VALUES
(1, 1, 'ZOE', 1, 1, 1, 4, NULL),
(2, 1, 'TWIZY', 1, 1, 1, 4, NULL),
(3, 2, 'i8', 1.5, 1.5, 1, 3, NULL),
(4, 2, 'i3', 1.3, 1.2, 1, 4, NULL),
(5, 3, 'IONIQ', 1.2, 1.2, 1, 1, NULL),
(6, 4, 'Model S', 1.7, 1.6, 1, 3, NULL),
(7, 4, 'Model X', 1.5, 1.5, 1, 3, NULL),
(8, 5, 'Geco', 1, 1, 2, 4, NULL),
(9, 5, 'Sixtys', 1, 1, 2, 4, NULL),
(10, 5, 'Tres', 1, 1, 2, 4, NULL),
(11, 6, 'e-Mo', 1, 1, 2, 4, NULL),
(12, 7, 'GO!S 1.5', 1, 1, 2, 4, NULL),
(13, 7, 'GO!S 12.6', 1, 1, 2, 4, NULL),
(14, 8, 'E-max 50', 1, 1, 2, 4, NULL);
```

### Status
```
INSERT INTO `status` (`id`, `name`) VALUES
(1, 'En cours'),
(2, 'Attente paiement'),
(3, 'Rendu'),
(4, 'Rendu avec pénalité'),
(5, 'Libre'),
(6, 'Occupé');
```

### Type
```
INSERT INTO `type` (`id`, `name`) VALUES
(1, 'Voiture'),
(2, 'Scooter');
```

### Classification
```
INSERT INTO `classification` (`id`, `name`) VALUES
(1, 'Familiale'),
(2, 'Sport'),
(3, 'Luxe'),
(4, 'Comfort');
```

### Vehicle
```
INSERT INTO `vehicle` (`id`, `model_id`, `status_id`, `serial_number`, `color`, `license_plate`) VALUES
(1, 1, 5, '111', 'bleu', '111'),
(2, 2, 5, '222', 'Rouge', '222'),
(3, 3, 5, '333', 'Rouge', '333'),
(4, 4, 5, '123', 'Noir', '132'),
(5, 6, 5, '432', 'Noir', '1342'),
(6, 7, 5, '4323', 'Blanc', '13423'),
(7, 7, 5, '432334', 'Blanc', '1342343');
```

### Pricing
```
INSERT INTO `pricing`(`period`,`hour_price`, `kilometer_price`) VALUES ('Global','20','10')
```