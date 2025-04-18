
-- This SQL file is used to enter fee payments deposited after 2024 11 01.
--
-- 
-- YYYY-MM-DD Deposit ddd
-- INSERT INTO deposit (id, dt, is_reconciled) VALUES(ddd, 'YYYY-MM-DD', 0); -- Deposit ddd
-- INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('YYYY-MM-DD',  ck,  amt,  lot, ddd,  '');
-- UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = ddd) WHERE id = ddd;

-- 2024-11-01 Deposit 150
INSERT INTO deposit (id, dt, is_reconciled) VALUES(150, '2024-11-01', 0); -- Deposit 150

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2024-10-23',  10126,  40,   6, 150,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2024-10-21',   3861,  40,  12, 150,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2024-10-20',    122,  40,  22, 150,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2024-10-26',   5905,  40,  35, 150,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2024-10-24',   5072,  40,  38, 150,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2024-10-22',   3741,  40,  44, 150,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2024-10-23',   3247,  40,  49, 150,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2024-10-24',   6705,  40,  50, 150,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2024-10-24',   3577,  40,  53, 150,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2024-10-24',    174,  40,  68, 150,  '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 150) WHERE id = 150;


-- 2024-11-11 Deposit 151
INSERT INTO deposit (id, dt, is_reconciled) VALUES(151, '2024-11-11', 0); -- Deposit 151

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-10-26',   2089,  40,   1, 151, 'Colley', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-10-24',   1995, 120,   2, 151, 'Wing', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-10-30',   4683,  40,  10, 151, 'Martin', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-11-01',   9959,  40,  13, 151, 'Downing', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-10-28',    206,  40,  14, 151, 'Fischer', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-10-30',   3199,  40,  16, 151, 'Baysic', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-10-28',   3117,  40,  19, 151, 'Parks', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-11-01',   4080,  40,  21, 151, 'Darr', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-10-25',    125, 350,  26, 151, 'Jennings', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-10-26',    126,  40,  30, 151, 'Mizera', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-10-24',   1311,  40,  40, 151, 'GPI Properties LLC', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-10-25', 520925,  40,  42, 151, 'Amherst Residential LLC', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-11-01',   5399,  40,  45, 151, 'Beerman', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-10-27',   2086,  40,  47, 151, 'Peer', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-10-25',    431,  40,  52, 151, 'Hansen', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-11-01',   5522,  40,  61, 151, 'Carenza', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-10-27',   1337,  40,  64, 151, 'Gardner', '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 151) WHERE id = 151;


-- 2024-11-18 Deposit 152
INSERT INTO deposit (id, dt, is_reconciled) VALUES(152, '2024-11-18', 0); -- Deposit 152

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-11-08',   5885,  40,   4, 152, 'McGuire', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-11-09',   3523,  40,  31, 152, 'Degenhardt', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-11-03',    155,  40,  32, 152, 'McCowen', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-10-26',   1096,  40,  36, 152, 'Hristova', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-11-08',  18877,  40,  46, 152, 'McCullough', '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 152) WHERE id = 152;

-- 2024-12-03 Deposit 153
INSERT INTO deposit (id, dt, is_reconciled) VALUES(153, '2024-12-03', 0); -- Deposit 153

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-11-16',   8349,  40,  11, 153, 'Vossenkemper', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-11-20',   6029,  40,  20, 153, 'Ziegler', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-11-24',   2223,  40,  23, 153, 'Sullivan', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-11-28',      1,  40,  33, 153, 'Pak', 'Money Order');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-11-25',   2026,  40,  37, 153, 'Luketin', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-11-18',     55,  40,  54, 153, 'Weaver', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-11-29',   1003, 160,  67, 153, 'Rodriguez Benitez', '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 153) WHERE id = 153;

-- 2024-12-11 Deposit 154
INSERT INTO deposit (id, dt, is_reconciled) VALUES(154, '2024-12-11', 0); -- Deposit 154

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-11-25',   5292,  40,  25, 154, 'Williams', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-10-29',   1102,  40,  58, 154, 'Purnell', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-11-26',   3510,  40,  59, 154, 'Grieb', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-11-25',   3101,  40,  63, 154, 'White', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-11-24',      1,  40,  65, 154, 'Matyi', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2024-11-29',   9338,  40,  66, 154, 'Eck', '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 154) WHERE id = 154;




