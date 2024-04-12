PRAGMA foreign_keys = ON;
INSERT INTO BRAND (IdBrand, Brand_Name) VALUES 
(1, 'Zara'),
(2, 'H&M'),
(3, 'Forever 21'),
(4, 'Gap'),
(5, 'Hollister'),
(6, 'Abercrombie & Fitch'),
(7, 'American Eagle'),
(8, 'Ralph Lauren'),
(9, 'Tommy Hilfiger'),
(10, 'Calvin Klein'),
(11, 'Levi''s'),
(12, 'Diesel'),
(13, 'Guess'),
(14, 'Burberry'),
(15, 'Gucci'),
(16, 'Versace'),
(17, 'Prada'),
(18, 'Armani'),
(19, 'Hugo Boss'),
(20, 'Lacoste'),
(21, 'Fendi'),
(22, 'Dolce & Gabbana'),
(23, 'Balenciaga'),
(24, 'Yves Saint Laurent'),
(25, 'Givenchy'),
(26, 'Moschino'),
(27, 'Balmain'),
(28, 'Kenzo'),
(29, 'Alexander McQueen'),
(30, 'Stella McCartney'),
(31, 'Christian Louboutin'),
(32, 'Jimmy Choo'),
(33, 'Salvatore Ferragamo'),
(34, 'Valentino'),
(35, 'Bottega Veneta'),
(36, 'Dior'),
(37, 'Celine'),
(38, 'Coach'),
(39, 'Michael Kors'),
(40, 'Marc Jacobs'),
(41, 'Tory Burch'),
(42, 'Kate Spade'),
(43, 'Tommy Bahama'),
(44, 'Ted Baker'),
(45, 'Paul Smith'),
(46, 'Vivienne Westwood'),
(47, 'Ralph Lauren'),
(48, 'Ted Baker'),
(49, 'Paul Smith'),
(50, 'Hugo Boss'),
(51, 'The North Face'),
(52, 'Patagonia'),
(53, 'Columbia'),
(54, 'Arc''teryx'),
(55, 'Timberland'),
(56, 'Carhartt');

-- Insert sample data into the SIZE table
INSERT INTO SIZE (IdSize,Size) VALUES 
(1,'Xs'),
(2,'S'),
(3,'M'),
(4,'L'),
(5,'XL');


-- Insert sample data into the COLOUR table
INSERT INTO COLOUR (IdColour,Colour) VALUES 
(1,'Red'),
(2,'Blue'),
(3,'Green');

-- Insert sample data into the STATE table
INSERT INTO STATE (IdState,State) VALUES 
(1,'New with tags'),
(2,'New without tags'),
(3,'Very Good'),
(4,'Good'),
(5,'Satisfactory');


-- Insert sample data into the GENDER table
INSERT INTO GENDER (IdGender,Gender) VALUES
(1,'Men'),
(2,'Women'),
(3,'Kids');
INSERT INTO LISTINGS (IdListing,IdBrand,IdSize,IdColour,IdState,IdGender)VALUES
(1,1,1,1,1,1),
(2,1,1,1,1,2),
(3,1,1,1,1,3),
(4,1,1,1,1,1),
(5,6,1,1,1,1);