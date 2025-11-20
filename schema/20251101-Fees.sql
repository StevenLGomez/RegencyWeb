
-- This SQL file is used to enter fee payments deposited after 2025 01 01.
--
-- 
-- YYYY-MM-DD Deposit ddd
-- INSERT INTO deposit (id, dt, is_reconciled) VALUES(ddd, 'YYYY-MM-DD', 0); -- Deposit ddd
-- INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('YYYY-MM-DD',  ck,  amt,  lot, ddd,  '');
-- UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = ddd) WHERE id = ddd;

-- 2025-11-07 Deposit 161
INSERT INTO deposit (id, dt, is_reconciled) VALUES(161, '2025-11-07', 0); -- Deposit 161

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-10-25',   2126,  50,  1, 161, 'Colley',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-10-24',    156,  50,  2, 161, 'Wing',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-10-29',   5922,  50,  4, 161, 'McGuire',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-11-04',  10185,  50,  6, 161, 'Gleason',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-10-30',   8398,  50, 11, 161, 'Vossenkemper',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-10-20',   4059,  50, 12, 161, 'Brinkerhoff',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-10-31',   5168,  50, 13, 161, 'Downing',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-10-30',    223,  50, 14, 161, 'Fischer',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-10-27',   3208,  50, 16, 161, 'Baysic',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-10-28',    156,  50, 17, 161, 'Gilmet',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-11-02',  10061,  90, 18, 161, 'Eggleston',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-11-03',   3206,  50, 19, 161, 'Parks',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-10-20',    105,  50, 22, 161, 'Muckerman',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-10-20',   2232,  50, 23, 161, 'Sullivan',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-11-01',   3574,  50, 31, 161, 'Degenhardt',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-10-17',   5934,  50, 35, 161, 'Gomez',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-10-19',   1087,  50, 36, 161, 'Hristova',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-10-30',   2094,  50, 37, 161, 'Luketin',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-10-20',   3755,  50, 44, 161, 'Angelo',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-10-18',   2259,  50, 47, 161, 'Peer',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-10-29',   3306,  50, 49, 161, 'Bostwick',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-10-15',   6772,  50, 50, 161, 'Hawkins',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-10-19',    443,  50, 52, 161, 'Hansen',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-10-24',   3623,  50, 53, 161, 'Rice',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-10-17',   5202,  90, 56, 161, 'Yoakum',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-10-26',   1360,  50, 64, 161, 'Gardner',  '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 161) WHERE id = 161;


-- 2025-11-21 Deposit 162
INSERT INTO deposit (id, dt, is_reconciled) VALUES(162, '2025-11-21', 0); -- Deposit 162

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-11-11',   2285,  90,  7, 162, 'Arle',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-11-11',   1010,  50, 10, 162, 'Martin',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-11-10',   6112,  50, 20, 162, 'Ziegler',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-11-10',    226,  50, 32, 162, 'McCowen',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-11-13',  61557,  50, 33, 162, 'Pak',  'QT Money Order');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-11-03',   5466,  50, 45, 162, 'Beerman',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-11-13',    182,  50, 68, 162, 'Gibson',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-11-03',  18887,  50, 46, 162, 'McCullough',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-11-07',   9454,  50, 66, 162, 'Eck',  '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 162) WHERE id = 162;

