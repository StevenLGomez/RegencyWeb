--
-- Data Definition Language queries
--

-- Based on Python sqlite database prototyped previously

DROP TABLE IF EXISTS project;
CREATE TABLE IF NOT EXISTS project (
    id               INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name             TEXT
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

DROP TABLE IF EXISTS category;
CREATE TABLE IF NOT EXISTS category (
    id               INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name             TEXT
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

DROP TABLE IF EXISTS requestor;
CREATE TABLE IF NOT EXISTS requestor (
    id               INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    first            TEXT,
    last             TEXT,
    dept             TEXT
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

DROP TABLE IF EXISTS dept;
CREATE TABLE IF NOT EXISTS dept (
    id               INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name             TEXT
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

DROP TABLE IF EXISTS url;
CREATE TABLE IF NOT EXISTS url (
    id               INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ip               TEXT,
    hostname         TEXT,
    domain           TEXT,
    os               TEXT,
    service          TEXT,
    protocol         TEXT,
    port             TEXT
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

DROP TABLE IF EXISTS scm;
CREATE TABLE IF NOT EXISTS scm (
    id               INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fk_url_id        INTEGER, -- REFERENCES url,
    repository       TEXT,
    path             TEXT,
    revision         INTEGER
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

DROP TABLE IF EXISTS ecn;
CREATE TABLE IF NOT EXISTS ecn(
    id               INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    num              TEXT,
    date             INTEGER,
    fk_req_id        INTEGER, -- REFERENCES requestor,
    fk_project_id    INTEGER, -- REFERENCES project,
    fk_cat_id        INTEGER, -- REFERENCES category,
    document         TEXT,
    is_fw            TEXT,
    doc_desc         TEXT,
    fk_doc_scm       INTEGER, -- REFERENCES scm,  -- New column (location of document AFTER migrations)
    change_desc      TEXT,
    approval_date    INTEGER,
    drawing_date     INTEGER,
    ver_comp_date    INTEGER,
    ver_needed       TEXT,
    ewo_comp_date    INTEGER,
    ewo_needed       TEXT,
    fk_scm_a         INTEGER, -- REFERENCES scm,  -- New column
    fk_scm_b         INTEGER  -- REFERENCES scm   -- New column
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;



