
-- This SQL file is used to keep the fees & deposits table in sync with the original SQLITE database.
-- This will require manual maintenance until the Web Interfaces have matured.
-- 
-- Sanity check using:
-- SELECT * FROM `deposit` WHERE dt > '2020-11-01';

-- To accomodate DDL differences between sqlite & MySQL:
--     Transaction -> Deposit
--     trans       -> deposit
--     fk_trans_id -> fk_deposit_id
--     date        -> dt
--     date        -> dt
--     YYYYMMDD    -> 'YYYY-MM-DD'
--     Remove 'type' field from deposit
--     Add 'id' value to deposit
 
-- 2020-11-05 Transaction 117
INSERT INTO deposit (id, dt, is_reconciled) VALUES(117, '2020-11-02', 0); -- Transaction 117
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-10-09',  94804,  120,  24, 117,  'Investors Title File: 680147');
UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 117) WHERE id = 117;

-- 2020-11-13 Transaction 118
INSERT INTO deposit (id, dt, is_reconciled) VALUES (118, '2020-11-13', 0); -- Transaction 118
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-13',    158,  40,   3, 118,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-08',   5761,  40,  35, 118,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-10',   1080,  40,  36, 118,  '');
UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 118) WHERE id = 118;

-- 2020-11-20 Transaction 119
INSERT INTO deposit (id, dt, is_reconciled) VALUES (119, '2020-11-20', 0); -- Transaction 119

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-09',   3017,  40,   9, 119,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-07',   4515,  40,  10, 119,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-08',   3049,  40,  12, 119,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-10',   4585,  40,  17, 119,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-10',   8245,  40,  18, 119,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-14',   3353,  40,  31, 119,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-14',    149,  40,  32, 119,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-09',   5859,  80,  33, 119,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-15',   5029,  40,  38, 119,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-18',   1066,  40,  40, 119,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-10',   1380,  40,  47, 119,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-17',   2989,  40,  49, 119,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-19',   3217,  40,  53, 119,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-12',    124,  40,  58, 119,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-13',  10438,  40,  59, 119,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-14',   5139,  40,  61, 119,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-09',   6810,  40,  62, 119,  '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 119) WHERE id = 119;

-- 2020-12-04 Transaction 120
INSERT INTO deposit (id, dt, is_reconciled) VALUES (120, '2020-12-04', 0); -- Transaction 120

-- First three were without payment slips
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-18',   8964,  40,  13, 120,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-12-01', 887248,  40,  46, 120,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-25',   8763,  40,  66, 120,  '');

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-18',   5865,  40,   1, 120,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-18',   3098,  40,  16, 120,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-21',   2680,  40,  19, 120,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-30',   5575,  40,  20, 120,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-19',    763,  40,  22, 120,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-29',   2142,  40,  23, 120,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-27',    852,  40,  30, 120,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-23',   2457,  40,  37, 120,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-23',   3433,  40,  44, 120,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-20',   5147,  40,  45, 120,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-23',   6430,  40,  50, 120,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-23',    380,  40,  52, 120,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-14',    185,  40,  54, 120,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-20',    511,  40,  55, 120,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-22',   1231,  40,  56, 120,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-24',   1123,  40,  60, 120,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-11-23',   1195,  40,  64, 120,  '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 120) WHERE id = 120;

-- 2020-12-29 Transaction 121
INSERT INTO deposit (id, dt, is_reconciled) VALUES (121, '2020-12-29', 0); -- Transaction 121

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-12-01',   780,  40,   8, 121,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-12-01',  8110,  40,  11, 121,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-12-18',  1001,  40,  21, 121,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-12-07',  1448,  40,  28, 121,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-12-20',   557, 120,  34, 121,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-12-01',   210,  40,  68, 121,  '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 121) WHERE id = 121;

-- 2021-02-15 Deposit 122
INSERT INTO deposit (id, dt, is_reconciled) VALUES (122, '2021-02-15', 0); -- Deposit 122

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-01-07',  5651,  40,   4, 122,   '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-02-04',  1906,  40,   7, 122,   '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-01-11',  5279, 160,  25, 122,   '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-12-29',  1306,  40,  39, 122,   '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2020-12-29',   104,  40,  65, 122,   '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 122)  WHERE id = 122; 

-- 2021-03-31 Deposit 123
INSERT INTO deposit (id, dt, is_reconciled) VALUES (123, '2021-03-31', 0); -- Deposit 123

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-02-19',  1946,  240,   2, 123,   '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-02-19',  410006014,   40,  21, 123,   'US Title File# 2041021-01227');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-03-10',  116490,   40,  42, 123,   'Main Street Renewal LLC, Vendor# v0009294');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-03-02',  123898,   40,  60, 123,   'Investors Title, File# 692085');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 123)  WHERE id = 123; 

