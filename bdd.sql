-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 06 fév. 2023 à 20:33
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo_auteur` varchar(255) NOT NULL,
  `date_publication` datetime DEFAULT CURRENT_TIMESTAMP,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_article` text NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_category` (`id_category`),
  KEY `pseudo_auteur` (`pseudo_auteur`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `pseudo_auteur`, `date_publication`, `titre`, `description`, `image_article`, `id_category`) VALUES
(40, 'florian', '2023-02-05 15:56:45', 'html', 'html', 'data:image/png;base64,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', 1),
(41, 'florian', '2023-02-06 15:19:18', 'css', 'aide css', 'data:image/png;base64,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', 2),
(42, 'florian', '2023-02-06 21:15:41', 'Tshirtcolv', 'vcxvcx', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxITEBUQEhMVFhUVFRUXFxgXFRUVFxgVFRYWFxUVFxUYHSggGBolHRUVITEhJSkrLi4vFx80OTQtOCgtLisBCgoKDg0OGhAQGi0lHyUtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLy0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIALcBEwMBIgACEQEDEQH/xAAbAAABBQEBAAAAAAAAAAAAAAAAAQIDBAUGB//EAEMQAAECAwQFCQYEBQIHAAAAAAEAAgMEERIhMVEFQWFxoQYTIjKBkbHB0QdCUnLh8CNig8JEgrLD8ZKjFBUkM2Nzov/EABoBAAIDAQEAAAAAAAAAAAAAAAABAgMEBQb/xAA5EQACAQIDBAkBBgYDAQAAAAAAAQIDEQQhMQUSQXETUWGBkaGxwfDRIjKisuHxBhQjNFKCJFOjFf/aAAwDAQACEQMRAD8A8jSpELQQBCEqAEQhCABCEqAEQlSJDBCEIAEoClhwCbzcFHFnGtuYKnP7xT01ESc0AKvNAq8af1MFBnr+irkueampPh6KxClgMbzwQlKX3RSko6kEOC51/E/d6twYAGF5U7YakAAVkaaiUuUpchjYeaeSAmmJkmqV29BqKQpeUlEJVJRXEbYJEqEPUXAb4oQNiExACgbEHahAAmzPUdu805Nmeo7d5qMvusa1KMriVYVeVxKsLNHQ0MEIQmIEIQgAQhCYgSpEIAVCRKgASISpDESpWtJuCkcGsveb8k7BcbDhE4JYkZjPzO8PRVpiec64dEbMe9JAkibzcOKSfCKFlxI4sd0Q07gMFJDlfi7lowoLWigHqlLBWqsjT4yzK5TfAghw9QFApmwwErnqJzs1O/BEVG2pK5+SiJ70UTk1G+o720Eop5SWMR1kXaycgoVa0dMBj6nAiye3Wpq1ymq5KDcdbZFr/lbXDoRASN3lgs+Zl3MNHCmR1HcVLOS5hvuwxadm/NTw9KdGzFbb7uPqpZciiLqpKUXvp8k/L04GciootURJZ9xaW7bh4FRzOiyBahm2OyvDFRcXcsWJjpNOLfWsvEzeCBsQdqEjQHFG9G5HFAhyimOo7d5p9Ekx1HbkpaMa1KEtiVYVeWxKsLLHQ0MEIQmIEIQgASpEJiBCEqABIhCQwT4TKmiYp5PE7vMJrUGRTc3Z6DLqYn0VWFAc817yfu9RtvdvPiVtMbQURFb+bIye7kiKBKtbtOZ8slMkJTS9XZLJFebzHF1FG5yaChO19QugCBRGKcFJIQIQSm70xBVFM0qAEgNOTPOwnQzi0Wm57vvNZ8AtDgXC00G8VIqMq6lPo+NYiNOrA7j9juSaRglkRw1dYbj9lSeauUQ+zVceDzXv7Ml0xLw2PHNGrHMa4DEi1qUErNuYatO8HA9ihSHC9Q0Ze4qUbPQ13w2RwXM6MQYjPfn8yyHsoaOxGrJPgxXNcHNuI++5akwwR4fOM64xHl6Kz73MyXeHaT+4/wAPY+wx05IAglQNgqjmOo7d5p4TZjqO3JS0YLUoS2JVhVpXEqyssdDQwQhCYgQhCAFQkQgBUiEIAEIQgAU8p1ju8woFPJdY7vMKUdRMzIXWHzDxWw5+Sx4fWHzDxWqQiismRqZCa0b0A5JKDtV6SWhW3cVKAlTapiHJqKd6EAG5FM05ISgBU2qUhJXJABvWra5yXLnChZcDnhdxCy6LQmejLw2/EbZ++0dylHiUV1dwXHe/fyKCRKhQepo4DTtVvRs1YfU9U3H17FUBSEZpp2ITgpxcXozR0xL2X1GDr+3X69qzh3lbJ/Gl/wAzPL1HFZGquAUpLiU4abcN2Wscn7CqKaNGGusXbVDGnQLm37T5BQQ4T4hrjtOCzzqrRZmyMHqxJXEqynGWDBmTifomqtKxZe4IQhAAhCEACVIhMQqRCEhghCEACsyfWO7zCrKeS63Z5hSjqDM1nWHzDxWo/asth6Q+YeK1HJ0NGQqcBAUBCAcleVBTNCEb0AG5CAUVogARXJCUFAAAlQhMAV+ebWFBOTA3g30VBaMoOchGF7zTbb3fU96kuoor/ZcZvRPPk8h0po+1Cc73iDZ2UPnRZRwvW7MxjChwhrBFobA3pjiqOk4ADg9t7X3jecUpIqw9aUpPe0k3bu4eGa5MoBK1qbFitbib8taoxppzrhcMhr9VTKoom5RbNvRU+1kUMr1uicgfdv4dqp6dlHiNZFS13SbkMx2HxCqy8gTe67YMfouih6RusxGhwz19x1pJ78bSyKZwlTqdJTV8rNXtya+hhy8gBe6/Zq+qugK+6VY8VhG/4XfRUXtINCKEJ7m6i2nWjUulquDya7itNYDeqymmIlTQalCqnqXIEIQkMEIQgASoSIECEIQMEIqiiBXEqrEmOl2eYUCnkut2eYTWoNGazrD5h4rUcstnWHzDxWo5SoaMjU4CUzRfuR4o3q8qAIpmjchACpBsRTNOQA2ichCYAhCEACcxxBqDQjWE2irRp0C5t5z1fVRlNR1Gk3oXJiYJ6T3d/kFBD0qADDIPNnX74Pxt9FRZDfENcdpwCvy8k1t5vPDsCp6SUnkSdKG7uv51eBVbIuJvN2Id8QzH1V6BLtbgL89anSIUEiV3bMEJHvAxVZ0wa3XJt2GaMKXiXFrXbDc3/wCirj5R8VhEUNa4dVwPB4TmTJjw+g+w8Yj7938wWFOQ4jTZiW+0kg7s1bK0VfVPlY5qdSvOzajKPY95eia5ZW4Ihe0gkHEGmeG1MSpFmOoCEIQAIQhAAhCWqABCSiEC1LMvIRHi0xtRWlatF43lLHkIrBacygzq047it7QbaQBtLjxKszkG3DczMXb9XFaVQTjfjY5M9oThVcbLdTt22vzt5HHqaS63Z5hRKWS63Z5hZ46o67KknJviPIY2tkgm8CgrtK2Iuj4oBJFALyatwHarfJiXswi/W957mXDjVasdtWuGbSOC00KKULvicjEY+SquMUrJ8b9/FcTk9gQUA5IQdAEqSicgQISEroeRmh2zEcmIKw4YDnD4ieq07LiTu2qqvXhQpyqz0Sv85vLmWUqUqs1COrKOjdAzEcWocMlvxGjW9hOPZVaLuRE2BWkM7A+/iKLutN6XhysIPcK16LGC6pphsAzXIxfaFEbeYUMDK04u7/ouBS2htLEp1KFOKhfj9XJX7kl33OtPCYKg9yrNuXZ9EnbvdznJ/RcaCaRYbmbSKtO5wqD3rOjTLW3YnIeZXWaT9oLI0rEhCC5sV7bIvD2UJoTW41pWl2K4uBIE3uuGWv6Lp4TFYirBqrT3ZXtlo+1a5d7v1mGvQo05f053Xzl6IifEfENLzkAuj0XyImogDnQ7I1W3BneOtwXa8i+TbIMNsZ7RzjhUA+404fzEa9WGak05yvZBeYUNnOObc41stB1itDU/dVy6u0a1Ss6OEipNat6dXWlrldvN6LS+6ng6dOmqleW6nolr+/Gy0OcPIyaaLmwzTU1/qAFjzslEhOsxWOYdouO44HsXWyfLvpUiwqN+JjiSP5SL+9dRMQIUzBo6j4bwCCNuDmnUdqjLaeNwsksVTW6+K9mm0+TsTjgsPXi+gnmuD/ZPvV0eREqfR+j48xaEvDt2KWjaY2lqtOu4V6p7lX09IPgR3wXmtk1acLTD1XU+7wV1nssxmf0f7q6WNxjpYV16Vno1e9ndpcGuDvqYsNh1OuqU7rW/cn9Dk9KaImIFnn2FlutmrmOrSleq40xCoLu/al/D/q/sXBowOIliMPGrNK7vppk2uLfV1hiaSpVXCOitr2pMex5BqCQRgRctJmlQ9tiM2o+IdYHP/CykLbGTjoY6lGFT7yzWj0a5MnmYNk4gg3tcMCPvUoEtdSRInG9swQhCQwQhCAETkiECsKhIhBJHW6Mugwvkae8VRo6YtwwdYJaew3cKKSA2zCYMmN4NWPybjXuYdYDxvFx8u5bt7dlFdnsjzahvwqz6mn3O5T0tBsRnDUemP5seNVHJNq+g1jzC1uUcHotfkbJ3auPiqegYdYtdTQXd1KfexZ5QtUsdajiF/LdI+C818Rqz7+ZlyBqYGN3noD1V1t65/lVMXw4QztnvozzW9LGrGH8jfBaYyvNx6rHGqUmqMZvVt/PU5lrRbo65tuhpjStOxbETRDKGlutDS8Y6tSx5xvTiA4W3+JXRSMW1Da7XSh3i4pQSd0zfi6k4xhUg7fLnMkqxIwLcQNNQL60xuB80ukIVmK4Z9IbjerWgofTc7JlO8/QqKWdmaKtX+i5x6vUdPaPhshlwt1uAqR6LpfZq8Ujt11YezpD73rmeUs5YaxtKk1d3Xeay9AaVjwZhseH0iLnA3NLDi05YDtAXP2rS6ehOjDV2tzTTNOx6sqbjWm75vwzR6D7R9HRYkFkWEC4wi60AKmw+zVwGyyOw7F5dBlnPv1ZnyzXt2h9OQZgdB1H0vY65w9RtCp6Z5LQY1XN/DiZtHRJ/M3XvFCvOYDaH8r/xsTFpLszV3fNdV7u6u+a09BisH076ai07+dlbXklkzy6BLNbgL8zj9FraDlBFmYUM4OeK/K2rnDtDSO1LpbQ0aXNIjeiTc8XtPbqOwrQ5CtrODYx54Aea9DXrxWFnVpu63W01129mcqlSbrxpzVs1dPn7neaYm+al4kUYtYSPmwbxIXkESKBianjvK9M5cuIkYlP/ABj/AHGLyd+JXK/h+CjQnJauVu5JW9WbtrSvVjHqV/Fv6IdEjE7l6L7NJwul4kEn/tvq3Y2ICaf6g89q82Xbey934scZsYe5zvVadsQU8JNvhZ+aXo2U7Plu4iNuN15X9ib2nyo/BjDHpQz/AFN/cj2WYzP6P91XvaaP+lhnKMOLHqj7K8Zn9H+6uUpuWx5J8Gl/6RfubnG20YvrV/wsPaj/AA/6v7Fwa7z2o/w/6v7Fwa6uyP7OH+35mYMf/cz7vyoEIQukYwQhCABCEIAEIQgAQhCABFEKSEOkBtHigd7ZnXx7mO2MP9K5SQjWIjXZG/cbiuonz+FE/wDW/wDpK5BasQ7SVjj7LipU5p6O3ozr52DbhuZm27fi3jRUuT8CkMu1uPAXDjVWtFx7cJrtdKHe24+CkjvDGEi6gu3nBXWTan2GJSnGMqHFteKy+ngcdpWYtzDnag4NG5t3qe1dhIn8NvyrhPe/m813OjT+G3794rNhneUmzftGCjShFcMvJmHpNoEZ2/xAV3QMXrMPzjwPkqmmC1sVziaVpv6owVOQ0nSMygo2tk5kOu869im6ijLMslSdXDf6p+VzV5RUaGxCMmeY81LycJMIvN1p5oNgu8aqzpeXESC5p+bb0b1JAhiFCDdTGf54qzdfSX4WOe618NGmtb27tfVmHpiCHxySbmgMA+W88SmNaAKAUCc51SSdd6WHCc6tlpNBU0BNBhU01XrM2rtncpQ3IKC4Ia1xBBBIIwINCDmCMF1eg+WL2EMmOkzC37zdrviHHeuRMQJrWlxDQCSTQAYknAAayqMThKWIjuVY39VyfD5e6L6NedF71N29H3fLcMz2iNCZEYWuAcx43gg61wfJyV5jSroJNaCI0E6wWh7e2zRdroeXdDl4UN3WbDa07wBVcDpXSQZpV0cdVkVoNMmsbDieDl5TZcJ1OnoQd04St2u6UX3pnex0ow6KrJWaku5WdzseWEK1IxhkGu/0Pa48AV5REh1XtceE2JDcw3te0g7WOFPAryTSGj3wIjoUQXtwOpw1OGwrd/DtaLhOlxvveKSfhZX5mTa9NqUanC1u/wDUyjCOS7X2XwjbjuybDb2kvPkuXA1fdcl6dyS0WYEvR4o95tuGVQA1vYB3krXtupGnhXF6yaS7mm3ysvFoo2ZBzrprRZ+TS9fIxfafF/Bgs1mIXdjWkfuCreyzGZ/R/urP5eTYjTNlpuggsGRcTV/Gg/lWh7LMZn9H+6sNSi6Wx2pavdfjOPtY0xqKe0U1wuvCLD2pfw/6v7Fwi7v2pfw/6v7Fwi6OyE/5KH+35mY9oNLEz7vyoRCVC6VjHcRCEJDFA1KzDls+5RyvW7FeU4oTYzmxkO5CehTImWhCFSTBSwD02V+Nn9QUSVANXR1E/NQ3QoobEYSWPFA9utpXLoSKypUc2ZsLhVQTSd7m1oCaa0OY5wAucLRA2HHsVjSc202WNcDi42SDhSgu38FzymlOt2eilGq93dIvBx6bpr93bYy3dbt812OjZ6FzYrFhi84vAOJ1Fcg2EXOIArefFX5eQAvdeeH1VVGUovJE8VQVaCi3azuT6cg85HtMILSxvSBqOGKbLyrW7TmfLJW4UMuNGipViFo95N4sjM08FZuXd7ApwowUZSWS7L+H6GvLvtMac2hUtLx7gzPpHdq+9itRo7YTKm4AUGZ2LmpmcLnE5/dyvqz3VbicvA0N+o6lvsp5e3gvMe+IBit3kfyjhy73NiMNIhHTbeWgYAt1ipJuXKlROmAMLyufiKMMRTdOp91/PnDrO/SqSpTU4ao9hELR0ybVID3HHBr+0XO71ZgScnL9NrYMOg6xLQafM41XkpoQDqN6GwxkuTLYba3FXlu9Wq9UvwnQW1LZ9HG/X8V/M7/lByxYGmHLG083W/dbtbXrHguDDc04BC6mDwVLCw3aa11b1fP553ZhxGJnXlvT7uz58yyOt5LcqhDYIEetkXMeKmyPhcBfQaiF1jnS0doqYUVuq9rqHxBXkyaWjWFhxWxaVWp0lOThLXLS/WldWff5mmjtKpThuSSku3L2dz1eFJSkA2w2Cw6nGyDfkTgrOk4cV0JzYLwx5FziCabqYHbfReP2QL7gtTRPKyNL0a38SGPccTh+V2LfDYsVfYdVWqQqb8l/ktezNy8HlyNNLacH9mUN1Pqengl5ZkOlNFxZc/jMIyOLXbnD/K2PZvOwoZmOciMZa5mlt7W1pztaVN+I71X5Xcq2zMJkKEHNaelEDhQ1HVZdiNddy5QCq6LhVxuEcMQtyT6uySfF8bdbyafYY9+nh66lSe8l19qtr2X/AEPYJqdkIlOciSj6YW3wHUrjSpuwUbW6NOAkf9heVQ5X4u5WAALgsS/h9f8Aa/D9TV/9Z/4Lx/Q6LlkyXEWE6AINA0k82IZbUOBFprbjuKmhx5fnhzjIBhiWaSBDhNBiOEO31Re/r0Gq+lFy5SVO5dOOz4KlGm28k1fjm0/S65NmN4yW/KaWrTtwyXx9yNjlDJwGwYcOBzZdDe9rnts2onRY60SLyLTngVuuXMOaRcVohNc0OC0UaHRw3d67u3d8W22/Uoq1Okle1tMuSsUQVPDmM02LLEYX+KhU80QsaFpCoJFLeFYRCEKBIEIQgAQhCABTynW7PRQKaUPS7E1qDLTWgXAUSoUUSMBtKsIFiBGLHWhS7NWIunjg1ormTd3UWNEiE4qF8QBLpGskyueGpVHvTV33+zLUzMOiG081PAbgqkSMBvUMSK47FHRVOWZfGKirLQe+KSo0tEKIy7o6Zp0DgcNhyWmueWnIzgIsuN4wJ1/VWQlwZFouoS0UcSIB6KwiSKGJHAwvPBQRIxOwZKNRcuolYV7ycU1SQ4JO7NWocIN3pJXC5BDlycbvFWmtAwSkppKklYVxapK5IpmhMQUzQSi87PFFEANIz+/VOqEEoAQA4OUcSEHJa5Xp7WoGVf8AhnbEK3VCW6guZiEIVZIEIQgAQhCABCEIAeYhpSqYhCABKhCABCRCAFSIQgBUlEIQA5IkQgSHAEmgVmHLgXm/wQhTikInLkjikQpCEOf+U4BIhACA5JWhCEABN6LOaEIAHFKGZ931SIQA/BRxYoCEIegyDnzsQhCruwsf/9k=', 5);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'JAVA-SCRIPT'),
(4, 'PHP'),
(5, 'MYSQL'),
(6, 'SQL'),
(7, 'VS-CODE'),
(8, 'BOOTSTRAP'),
(9, 'LINUX');

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_speudo` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`id`, `sender_speudo`, `content`, `date`) VALUES
(36, 'florian', 'florianokss', '2023-02-06 20:49:59'),
(35, 'florian', 'ggg', '2023-02-06 16:52:39'),
(34, 'florian', 'ggg', '2023-02-06 16:52:37'),
(33, 'florian', 'vcvcx', '2023-02-06 16:52:34'),
(32, 'florian', 'ccc', '2023-02-06 16:51:40'),
(31, 'florian', 'cxwcxw', '2023-02-06 16:51:37'),
(30, 'florian', 'cxcxw', '2023-02-06 16:51:36');

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

DROP TABLE IF EXISTS `messagerie`;
CREATE TABLE IF NOT EXISTS `messagerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_pseudo` varchar(255) NOT NULL,
  `receiver_pseudo` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` int(11) NOT NULL DEFAULT '0',
  `delete_msg` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messagerie`
--

INSERT INTO `messagerie` (`id`, `sender_pseudo`, `receiver_pseudo`, `subject`, `content`, `date`, `is_read`, `delete_msg`) VALUES
(1, 'florian', 'admin', 'fdd', 'fdsf', '2023-02-05 16:26:29', 1, 0),
(2, 'florian', 'florian', 'fddgg', 'gfd', '2023-02-05 16:42:01', 1, 1),
(3, 'florian', 'florian', 'gdfg', 'gfdgdf', '2023-02-05 16:46:06', 1, 1),
(4, 'florian', 'florian', 'coucou florian', 'salur j\'espere que tu vas bien mon ami', '2023-02-05 17:32:23', 1, 1),
(5, 'florian', 'florian', 'fdd', 'gfddd', '2023-02-05 17:50:37', 1, 0),
(6, 'florian', 'admin', 'fddgg', 'gfg', '2023-02-05 18:32:32', 0, 0),
(7, 'florian', 'florian', 'bvcb', 'bvcbcv', '2023-02-05 18:58:53', 1, 0),
(8, 'admin', 'florian', 'fdsfsd', 'fdsfds', '2023-02-06 14:20:32', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_auteur` varchar(255) NOT NULL,
  `pseudo_profil` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(500) NOT NULL DEFAULT 'bienvenu sur mon profil',
  `nombre_de_clic` int(11) NOT NULL DEFAULT '1',
  `profil_image` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_auteur` (`id_auteur`),
  KEY `pseudo_profil` (`pseudo_profil`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id`, `id_auteur`, `pseudo_profil`, `date_inscription`, `description`, `nombre_de_clic`, `profil_image`) VALUES
(5, '114', 'florian', '2023-02-02 15:32:32', 'bienvenu sur mon profildddd', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRS1lLgyjanPJdH0E7sDq83-Q6H1BQWG0E-eA&usqp=CAU'),
(6, '115', 'admin', '2023-02-02 15:32:49', 'bienvenu sur mon profil', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6QtOt1lXuHsUC1fncf7PpGDmooIsuiE2fnvr4mDRMvYxHCAtMMT8va8tY-J13TM_Kw4s&usqp=CAU'),
(7, '116', 'rodolf', '2023-02-02 15:34:03', 'bienvenu sur cxxdsmon profilvdsvds', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSEdRWx5r7mGPYHXnS4op0R50QPyCbwFmyAVA&usqp=CAU');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  `contenu` text NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `pseudo_auteur` varchar(255) NOT NULL,
  `date_publication` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_auteur` (`id_auteur`),
  KEY `pseudo_auteur` (`pseudo_auteur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mdp` text NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `nom`, `prenom`, `mdp`, `email`) VALUES
(115, 'admin', 'admin', 'admin', '$2y$10$pWf1V0u7C4ukHYIt/ruBReM6FuiR57OaohEGUD8MZuGDYMV12lWAi', 'admin'),
(116, 'rodolf', 'rodolf', 'rodolf', '$2y$10$aM1MxUv3lJ4T16Vk.3VzUOIXFtMGbEptZP9Tc.v2j6QCLAHf0q1fi', 'fdsfds@msn.fr'),
(114, 'florian', 'florian', 'florian', '$2y$10$P6E6f/9L57v0e1nBK/VRJOlx37l.ZO4sQHGj25Xk40oZANZ/sgli6', 'florian');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
