
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







