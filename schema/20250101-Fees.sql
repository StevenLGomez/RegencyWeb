
-- This SQL file is used to enter fee payments deposited after 2025 01 01.
--
-- 
-- YYYY-MM-DD Deposit ddd
-- INSERT INTO deposit (id, dt, is_reconciled) VALUES(ddd, 'YYYY-MM-DD', 0); -- Deposit ddd
-- INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('YYYY-MM-DD',  ck,  amt,  lot, ddd,  '');
-- UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = ddd) WHERE id = ddd;

-- 2025-01-08 Deposit 155
INSERT INTO deposit (id, dt, is_reconciled) VALUES(155, '2025-01-08', 0); -- Deposit 155

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2024-12-09',   6087,  80,  41, 155,  'Zerr');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2024-12-28',    103,  80,  48, 155,  'Vollmer');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2024-12-20',   1001,  80,  62, 155,  'Gardiner');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 155) WHERE id = 155;

-- 2025-02-06 Deposit 156
INSERT INTO deposit (id, dt, is_reconciled) VALUES(156, '2025-02-06', 0); -- Deposit 156

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-01-06',    135,  40,   3, 156,  'Blackledge', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-01-07',   5090,  40,  51, 156,  'Petrillo', '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-02-04',    290,  80,  60, 156,  'Donihue', '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 156) WHERE id = 156;

-- 2025-05-07 Deposit 157
INSERT INTO deposit (id, dt, is_reconciled) VALUES(157, '2025-05-07', 0); -- Deposit 157
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-04-25', 166326,  40,  38, 157,  'Title Company', 'Investors Title FILE 784780');
UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 157) WHERE id = 157;

-- 2025-05-12 Deposit 158
INSERT INTO deposit (id, dt, is_reconciled) VALUES(158, '2025-05-12', 0); -- Deposit 158
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-05-10', 0, 200,  43, 158,  'Daugherty', 'Cash Payment');
UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 158) WHERE id = 158;

-- 2025-06-06 Deposit 159
INSERT INTO deposit (id, dt, is_reconciled) VALUES(159, '2025-06-06', 0); -- Deposit 159
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-06-05', 452, 200,  5, 159,  'Brown', '');
UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 159) WHERE id = 159;

-- 2025-07-22 Deposit 160
INSERT INTO deposit (id, dt, is_reconciled) VALUES(160, '2025-07-22', 0); -- Deposit 160
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-06-16', 6988, 40, 30, 160,  'Title Company', 'City Title Co. CTY-01628-25');
UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 160) WHERE id = 160;





