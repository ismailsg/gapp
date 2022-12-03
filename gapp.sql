DROP TABLE IF EXISTS `Apps`;
CREATE TABLE IF NOT EXISTS `Apps` (
  `AppID` int(11) NOT NULL AUTO_INCREMENT,
  `AppName` varchar(250) NOT NULL,
   AppNumber int(11) NOT NULL,
   AppType  varchar(250) NOT NULL,
  `DateCreation` date NOT NULL,
  `JsonFileName` varchar(250) DEFAULT NULL,
  `JsonFileURL` varchar(250) DEFAULT NULL,
  `RessourcesLink` varchar(250) DEFAULT NULL,
  `MetaDataLink` varchar(250) DEFAULT NULL,
  `ContentLink` varchar(250) DEFAULT NULL,
  `JsonContentLink` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`AppID`)
);

DROP TABLE IF EXISTS `Publishing`;
CREATE TABLE IF NOT EXISTS `Publishing` (
	PublishingID int(11) NOT NULL AUTO_INCREMENT,
	PublisherName varchar(250) NOT NULL,
	StoreLink varchar(250) NOT NULL,
	StoreID varchar(250) NOT NULL,
	PackageName varchar(250) NOT NULL,
	Status varchar(250) NOT NULL,
	AdAccount varchar(250) NOT NULL,
	MakeOrder DATE NOT NULL,
	Published DATE DEFAULT NULL,
	Terminated DATE DEFAULT NULL,
	Price int(11) NOT NULL,
	OrderStatus varchar(250) NOT NULL,
	UnsignedApk varchar(250) NOT NULL,
	KeyApk varchar(250) NOT NULL,
	SignedApk varchar(250) NOT NULL,
	PRIMARY KEY (`PublishingID`)
);
-- --------------------------------------------------------

DROP TABLE IF EXISTS `Blocs`;
CREATE TABLE IF NOT EXISTS `Blocs` (
  `BlocID` int(11) NOT NULL AUTO_INCREMENT,
  `BlocName` varchar(250) NOT NULL,
  `BlocValue` varchar(250) NOT NULL,
  `AppKey` int(11) NOT NULL,
  KEY `AppKey` (`AppKey`),
  PRIMARY KEY (`BlocID`)
);

ALTER TABLE `Blocs`
  ADD CONSTRAINT `const_apps_blocs` FOREIGN KEY (`Appkey`) REFERENCES `Apps` (`AppID`) ON DELETE CASCADE ON UPDATE CASCADE;
  
DROP TABLE IF EXISTS `Content`;
CREATE TABLE IF NOT EXISTS `Content` (
  `ContentID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(250) NOT NULL,
  `Details` TEXT NOT NULL,
  `ContentAppKey` int(11) NOT NULL,
  KEY `ContentAppKey` (`ContentAppKey`),
  PRIMARY KEY (`ContentID`)
);

ALTER TABLE `Content`
  ADD CONSTRAINT `const_apps_content` FOREIGN KEY (`ContentAppKey`) REFERENCES `Apps` (`AppID`) ON DELETE CASCADE ON UPDATE CASCADE;
  
ALTER TABLE Apps ADD ContentFileName varchar(250);
ALTER TABLE Apps ADD ContentFileURL varchar(250);

 COMMIT;
-- --------------------------------------------------------

DROP TABLE IF EXISTS `Utilisateur`;
CREATE TABLE IF NOT EXISTS `Utilisateur` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(250) NOT NULL,
  `Prenom` varchar(250) NOT NULL,
  `Login` varchar(250) NOT NULL,
  `Mdp` varchar(250) NOT NULL,
  `Profil` varchar(250) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `Utilisateur` (`UserID`, `Nom`, `Prenom`, `Login`, `Mdp`, `Profil`) VALUES
(1, 'OUKDOUR', 'Lahcen', 'lahcen', 'c42ab3ef0b795ad1f8f700b3f38089b49247a7f1', 'Admin');

COMMIT;

