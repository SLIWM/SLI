CREATE TABLE `user` (
    `ID` INT NOT NULL AUTO_INCREMENT,  -- Set ID to auto-increment
    `Username` VARCHAR(255) NOT NULL,  -- Assuming username is a string
    `Email` VARCHAR(255) NOT NULL,     -- Assuming email is a string
    `IsActive` INT NOT NULL,           -- Assuming IsActive is an integer (1 for active, 0 for inactive)
    `Password` VARCHAR(255) NOT NULL,  -- Assuming password is a string
    PRIMARY KEY (`ID`)                 -- Set ID as the primary key
) ENGINE = InnoDB;

CREATE TABLE `Role` (
    `ID` INT NOT NULL AUTO_INCREMENT,   -- Auto-increment ID
    `Label` TEXT NOT NULL,              -- Label as TEXT (for the role's label)
    `Description` TEXT,                 -- Description as TEXT (optional description of the role)
    PRIMARY KEY (`ID`)
) ENGINE = InnoDB;

CREATE TABLE `UserRole` (
    `ID` INT NOT NULL AUTO_INCREMENT,    -- Auto-increment ID
    `UserID` INT NOT NULL,               -- UserID as a foreign key reference to User.ID
    `RoleID` INT NOT NULL,               -- RoleID as a foreign key reference to Role.ID
    PRIMARY KEY (`ID`),                  -- Primary key for the UserRole table
    CONSTRAINT `fk_user` FOREIGN KEY (`UserID`) REFERENCES `sli`.`user` (`ID`) ON DELETE CASCADE, -- Foreign key constraint for UserID
    CONSTRAINT `fk_role` FOREIGN KEY (`RoleID`) REFERENCES `sli`.`Role` (`ID`) ON DELETE CASCADE  -- Foreign key constraint for RoleID
) ENGINE = InnoDB;

CREATE TABLE `Album` (
    `ID` INT NOT NULL AUTO_INCREMENT,   -- Auto-increment ID
    `Label` TEXT NOT NULL,              -- Label as TEXT (for the album label)
    `isActive` BOOLEAN NOT NULL,        -- isActive as BOOLEAN (0 = false, 1 = true)
    `CreatedDate` DATE NOT NULL,        -- CreatedDate as DATE
    `CreatedBy` INT NOT NULL,           -- CreatedBy as UserID (foreign key reference to User.ID)
    `UpdatedDate` DATE,                 -- UpdatedDate as DATE (optional, for when the album was last updated)
    `UpdatedBy` INT,                    -- UpdatedBy as UserID (foreign key reference to User.ID)
    PRIMARY KEY (`ID`),                 -- Set ID as primary key
    CONSTRAINT `fk_created_by` FOREIGN KEY (`CreatedBy`) REFERENCES `sli`.`user` (`ID`) ON DELETE RESTRICT,  -- Foreign key constraint for CreatedBy
    CONSTRAINT `fk_updated_by` FOREIGN KEY (`UpdatedBy`) REFERENCES `sli`.`user` (`ID`) ON DELETE RESTRICT   -- Foreign key constraint for UpdatedBy
) ENGINE = InnoDB;

CREATE TABLE `Files` (
    `ID` INT NOT NULL AUTO_INCREMENT,    -- Auto-increment ID
    `Label` TEXT NOT NULL,               -- Label as TEXT (description or title of the file)
    `FileName` TEXT NOT NULL,            -- FileName as TEXT (name of the file)
    `IsActive` BOOLEAN NOT NULL,         -- IsActive as BOOLEAN (0 = false, 1 = true)
    `UploadedBy` INT NOT NULL,           -- UploadedBy as UserID (foreign key reference to User.ID)
    `UploadedDate` DATE NOT NULL,        -- UploadedDate as DATE (when the file was uploaded)
    `Path` TEXT NOT NULL,                -- Path as TEXT (path where the file is stored)
    `Link` TEXT,                         -- Link as TEXT (URL or link to access the file)
    `isIntegrated` BOOLEAN NOT NULL,     -- isIntegrated as BOOLEAN (0 = false, 1 = true)
    PRIMARY KEY (`ID`),                  -- Set ID as primary key
    CONSTRAINT `fk_uploaded_by` FOREIGN KEY (`UploadedBy`) REFERENCES `sli`.`user` (`ID`) ON DELETE RESTRICT  -- Foreign key constraint for UploadedBy
) ENGINE = InnoDB;

CREATE TABLE `UserDetails` (
    `ID` INT NOT NULL AUTO_INCREMENT,      -- Auto-increment ID
    `FirstName` TEXT NOT NULL,             -- FirstName as TEXT
    `LastName` TEXT NOT NULL,              -- LastName as TEXT
    `Birthday` DATE,                       -- Birthday as DATE (nullable)
    `Address` TEXT,                        -- Address as TEXT (nullable)
    `UserID` INT NOT NULL,                 -- UserID as UserID (foreign key reference to User.ID)
    PRIMARY KEY (`ID`),                    -- Set ID as primary key
    CONSTRAINT `fk_user_details_user` FOREIGN KEY (`UserID`) REFERENCES `sli`.`user` (`ID`) ON DELETE CASCADE  -- Foreign key constraint for UserID
) ENGINE = InnoDB;

ALTER TABLE `Album`
ADD COLUMN `order` INT;

ALTER TABLE `Files` 
ADD COLUMN `AlbumID` INT;
ALTER TABLE `Files` 
ADD CONSTRAINT `FK_Album` FOREIGN KEY (`AlbumID`) REFERENCES `sli`.`Album` (`ID`);
