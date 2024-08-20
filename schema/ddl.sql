
-- Data Definition Language queries

-- Budget categories
DROP TABLE IF EXISTS category;
CREATE TABLE category(
    id INTEGER NOT NULL AUTO_INCREMENT, 
    name VARCHAR(30), 
    note VARCHAR(100),
    PRIMARY KEY (id)
    ) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

-- Association expenses
DROP TABLE IF EXISTS expense;
CREATE TABLE expense(
    id INTEGER NOT NULL AUTO_INCREMENT, 
    fk_cat_id INTEGER, 
    dt DATE, 
    ck_no INTEGER, 
    payee VARCHAR(50), 
    amount DECIMAL(10,2),
    note VARCHAR(50), 
    PRIMARY KEY (id),
    FOREIGN KEY(fk_cat_id) REFERENCES category(id) 
    ) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

DROP TABLE IF EXISTS lot;
CREATE TABLE lot(
    id INTEGER NOT NULL AUTO_INCREMENT,
    num INTEGER,
    address VARCHAR(50), 
    fk_curr_owner INTEGER, 
    note VARCHAR(50),
    PRIMARY KEY (id)
    ) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

DROP TABLE IF EXISTS deposit;
CREATE TABLE deposit(
    id INTEGER NOT NULL, 
    fk_cat_id INTEGER,
    dt DATE, 
    is_reconciled BOOLEAN, 
    amount DECIMAL(10,2),
    note VARCHAR(50), 
    ck_no INTEGER, 
    payee VARCHAR(50), 
    PRIMARY KEY (id),
    FOREIGN KEY(fk_cat_id) REFERENCES category(id) 
    ) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

DROP TABLE IF EXISTS fees;
CREATE TABLE fees(
    id INTEGER NOT NULL AUTO_INCREMENT,
    dt DATE, 
    ck_no INTEGER NOT NULL, 
    amount DECIMAL(10,2),
    fk_lot_id INTEGER NOT NULL, 
    fk_deposit_id INTEGER,
    note VARCHAR(250),
    PRIMARY KEY (id),
    FOREIGN KEY(fk_lot_id) REFERENCES lot(id), 
    FOREIGN KEY(fk_deposit_id) REFERENCES deposit(id) 
    ) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

DROP TABLE IF EXISTS owner;
CREATE TABLE owner(
    id INTEGER NOT NULL AUTO_INCREMENT,
    fk_lot_id INTEGER, 
    first VARCHAR(50), 
    mi VARCHAR(50), 
    last VARCHAR(50), 
    first_2 VARCHAR(50), 
    mi_2 VARCHAR(50), 
    last_2 VARCHAR(50), 
    address VARCHAR(50), 
    city VARCHAR(50), 
    state VARCHAR(50), 
    zip VARCHAR(50), 
    phone VARCHAR(15), 
    email VARCHAR(50), 
    phone_2 VARCHAR(15), 
    email_2 VARCHAR(50), 
    buy_date DATE, 
    is_current BOOLEAN,
    PRIMARY KEY (id)
    -- FOREIGN KEY(fk_lot_id) REFERENCES lot(id) 
    ) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

-- The following were entered 2022-04-30 to add columns to owner table:
ALTER TABLE owner ADD COLUMN is_rental BOOLEAN;
ALTER TABLE owner ADD COLUMN notes VARCHAR(50);
ALTER TABLE owner DROP COLUMN is_in_subdv;

-- Added 2024-07-25 for tracking total fee amount as sum of all assessments.
DROP TABLE IF EXISTS assessment;
CREATE TABLE assessment(
    id INTEGER NOT NULL AUTO_INCREMENT,
    yr INTEGER,
    amount DECIMAL(10,2),
    note VARCHAR(256),
    PRIMARY KEY (id)
    ) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

-- The following were entered 2022-08-20 to aid in creating mail merge info:
ALTER TABLE lot ADD COLUMN city VARCHAR(50);
ALTER TABLE lot ADD COLUMN state VARCHAR(50);
ALTER TABLE lot ADD COLUMN zip VARCHAR(50);

-- ----------------------------------------------------------------------------
-- End of TABLEs --------------------------------------------------------------
-- ----------------------------------------------------------------------------

DROP TRIGGER IF EXISTS test_trigger;
CREATE TRIGGER test_trigger AFTER UPDATE OF is_current ON owner BEGIN UPDATE lot SET fk_curr_owner = new.id WHERE id = new.lot;

