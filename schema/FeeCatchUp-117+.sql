
-- This SQL file is used to keep the fees & deposits table in sync with the original SQLITE database.
-- This will require manual maintenance until the Web Interfaces have matured.
--
-- Sanity check using:
-- SELECT * FROM `deposit` WHERE dt > '2020-11-01';

-- To accomodate DDL differences between sqlite & MySQL:
--     Transaction -> Deposit
--     trans       -> deposit
--     fk trans id -> fk_deposit_id
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

-- 2021-05-06 Deposit 124
INSERT INTO deposit (id, dt, is_reconciled) VALUES (124, '2021-05-06', 0); -- Deposit 124
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-04-20',  430009304,   40,  28, 124,   'US Title File# 2043021-03358');
UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 124)  WHERE id = 124;


-- 2021-10-18 Deposit 125
INSERT INTO deposit (id, dt, is_reconciled) VALUES (125, '2021-10-18', 0); -- Deposit 125
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-08-23',  173980,   80,  6, 125,   'Title Partners Agency, LLC 21-292361-CR/54');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-09-09',  22906,   40,  39, 125,   'Synergy Title SYN2116592');
UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 125)  WHERE id = 125;

-- 2021-11-26 Deposit 126
INSERT INTO deposit (id, dt, is_reconciled) VALUES (126, '2021-11-26', 0); -- Deposit 126

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-17',  2373,   40,   1, 126, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-15',  8169,   40,  11, 126, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-14',  3235,   40,  12, 126, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-13',  3138,   40,  16, 126, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-15',  4648,   40,  17, 126, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-13',  8329,   40,  18, 126, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-18',   804,   40,  22, 126, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-16',  3417,   40,  31, 126, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-17',   181,   40,  32, 126, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-25',  5795,   40,  35, 126, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-14',  1067,   40,  36, 126, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-21',  5043,   40,  38, 126, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-13',  3541,   40,  44, 126, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-16',  1576,   40,  47, 126, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-13',  6490,   40,  50, 126, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-17',  3305,   40,  53, 126, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-08',  1289,   40,  56, 126, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-14', 10647,   40,  59, 126, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-13',  6904,   40,  62, 126, '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 126)  WHERE id = 126;


-- 2021-12-20 Deposit 127
INSERT INTO deposit (id, dt, is_reconciled) VALUES (127, '2021-12-20', 0); -- Deposit 127

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-12-04',   790,   40,   8, 127, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-12-01',  4559,   40,  10, 127, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-29',  9246,   40,  13, 127, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-12-06',  2807,   40,  19, 127, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-12-03',  5769,   40,  20, 127, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-12-01',  2162,   40,  23, 127, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-27',   102,   40,  30, 127, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-23',  2526,   40,  37, 127, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-22',  5270,   40,  40, 127, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-12-02',  5213,   40,  45, 127, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-23',  3057,   40,  49, 127, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-27',   433,   40,  55, 127, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-23',  3040,   80,  63, 127, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-11-22',  1252,   40,  64, 127, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-12-10',  8926,   40,  66, 127, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-12-01',  176146, 40,  33, 127, '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 127)  WHERE id = 127;

-- 2022-01-19 Deposit 128
INSERT INTO deposit (id, dt, is_reconciled) VALUES (128, '2022-01-19', 0); -- Deposit 128

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-12-24',  2019,   40,   7, 128, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-12-27',   101,   40,   2, 128, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-12-27',  5730,   40,   4, 128, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-12-15',   107,   40,  58, 128, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-12-03',  5233,   40,  61, 128, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-12-15',  9064,   40,  42, 128, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-12-31',  5063,   40,  51, 128, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-12-15',  2041,   40,  68, 128, '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 128)  WHERE id = 128;

-- 2022-03-26 Deposit 129
INSERT INTO deposit (id, dt, is_reconciled) VALUES (129, '2022-01-18', 0); -- Deposit 129

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-02-14',   170,   40,   3, 129, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-01-29',  1003,   40,  15, 129, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-03-02',     1,   40,  24, 129, 'No number on check');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-03-07',  194155, 40,  55, 129, 'Title Partners Agency, 22-303944-SRH/93');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-02-10',  0016,   40,  65, 129, '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 129)  WHERE id = 129;

-- 2022-04-30 Deposit 130
INSERT INTO deposit (id, dt, is_reconciled) VALUES (130, '2022-04-30', 0); -- Deposit 130
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-04-06', 23361,  120,  27, 130, 'Touchstone Title, File ID 220349');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 130)  WHERE id = 130;

-- 2022-05-11 Deposit 131
INSERT INTO deposit (id, dt, is_reconciled) VALUES (131, '2022-05-11', 0); -- Deposit 131
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-04-04', 209894,   80,  54, 131, 'Continental Title, File 22430990');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2021-12-11',    101,   80,  48, 131, '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 131)  WHERE id = 131;

-- 2022-05-12 Deposit 132
INSERT INTO deposit (id, dt, is_reconciled) VALUES (132, '2022-05-12', 0); -- Deposit 132
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-05-11',   1024,  620,  57, 132, '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 132)  WHERE id = 132;

-- 2022-05-16 Deposit # 129 had incorrect date, fixing here
UPDATE deposit SET dt = '2022-03-28'  WHERE id = 129;

-- 2022-08-31 Deposit 133
INSERT INTO deposit (id, dt, is_reconciled) VALUES (133, '2022-08-31', 0); -- Deposit 133
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-06-08',   14487,  80,  9, 133, 'Pinnacle Title PTA-14360-22/68');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-07-29',   85457,  80, 34, 133, 'Alliance Title 15514ATG');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-08-02',   72734,  40, 58, 133, 'Vision Title BL-22-24586W');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 133)  WHERE id = 133;

-- ****************** owner_pages merge point ***********************

-- Correction for fee entry on 2021-12-01, note was previously omitted
UPDATE fees SET note = "Investors Title File 716041" WHERE fk_deposit_id = 127 AND fk_lot_id = 33;

-- 2022-10-05 Deposit 134
INSERT INTO deposit (id, dt, is_reconciled) VALUES (134, '2022-10-05', 0); -- Deposit 134
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-10-25', 560008707,  40,   3, 134, 'US Title');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-05-11',    219440,  40,  62, 134, 'Investors Title');
UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 134)  WHERE id = 134;

UPDATE fees SET dt = "2022-09-26", note = "Investors Title File 738496" WHERE fk_deposit_id = 134 AND fk_lot_id = 62; -- Corrections for above
UPDATE fees SET note = "US Title File 2056022-11433" WHERE fk_deposit_id = 134 AND fk_lot_id = 3;


-- ************************************************************************************************
-- *****  Start of changes for 2022 Payments ******************************************************
-- ************************************************************************************************

UPDATE fees SET dt = "20220926" WHERE fk_deposit_id = 134 AND fk_lot_id = 62;  -- Date correction, See line 1584 above

-- 2022-11-25 Deposit 135
INSERT INTO deposit (id, dt, is_reconciled) VALUES (135, '2022-11-25', 0); -- Deposit 135

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-18',   3424,  40, 13, 135, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-17',   4717,  40, 17, 135, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-17',   8388,  40, 18, 135, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-17',    104,  40, 22, 135, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-17',    106,  40, 30, 135, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-22',   5829,  40, 35, 135, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-17',   3623,  40, 44, 135, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-18',   3129,  40, 49, 135, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-17',    426,  80, 52, 135, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-22',   3428,  40, 53, 135, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-18',   5321,  40, 61, 135, '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 135)  WHERE id = 135; 

-- 2022-12-02 Deposit 136
INSERT INTO deposit (id, dt, is_reconciled) VALUES (136, '2022-12-02', 0); -- Deposit 136

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-21',   6180,  40,  1, 136, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-18',   9982,  40,  6, 136, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-22',   8233,  40, 11, 136, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-19',   3430,  40, 12, 136, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-20',   3160,  40, 16, 136, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-21',   2922,  40, 19, 136, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-25',   5916,  40, 20, 136, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-19',   4037,  40, 21, 136, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-25',    193,  40, 32, 136, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-29', 6134666,  40, 33, 136, 'Money Order # 22016134666');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-27',   5053,  40, 38, 136, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-22',   1260,  40, 40, 136, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-22', 5749585, 40, 50, 136, 'Money Order # 28295749585');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-11',    759,  40, 59, 136, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-23',    276,  40, 60, 136, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-20',   1619,  40, 64, 136, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-22',     23,  40, 65, 136, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-22',    219,  40, 68, 136, '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 136)  WHERE id = 136; 

-- 2022-12-27 Deposit 137
INSERT INTO deposit (id, dt, is_reconciled) VALUES (137, '2022-12-27', 0); -- Deposit 137

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-12-16',   2124,  40,  7, 137, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-25',   4612,  40, 10, 137, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-12-02',   2190,  40, 23, 137, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-28',   1049,  40, 28, 137, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-28',   3390,  40, 31, 137, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-30',   2648,  40, 37, 137, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-29',   1183,  40, 39, 137, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-12-01', 223504,  40, 42, 137, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-28',   5281,  40, 45, 137, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-12-09', 887592,  80, 46, 137, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-29',   1767,  40, 47, 137, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-28',   1382,  40, 56, 137, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-12-07',   3079,  40, 63, 137, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-11-30',   9052,  40, 66, 137, '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 137)  WHERE id = 137; 

-- START of 2023 ------------------------------------------------------------------------------------------------
-- 2023-02-25 Deposit 138
INSERT INTO deposit (id, dt, is_reconciled) VALUES (138, '2023-02-25', 0); -- Deposit 138

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-12-31',   5791,  40,  4, 138, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-12-18',    798,  40,  8, 138, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-02-08',    547, 200, 14, 138, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-01-16',    254,  40, 48, 138, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-01-24', 145061,  80, 24, 138, 'Integrity Title STL-72589-22/44');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 138)  WHERE id = 138; 

-- 2023-04-11 Deposit 139
INSERT INTO deposit (id, dt, is_reconciled) VALUES (139, '2023-04-11', 0); -- Deposit 139

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-02-23',   5282,  80, 25, 139, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2022-02-17',  18852,  25, 46, 139, '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 139)  WHERE id = 139; 

-- 2023-07-25 Deposit 140
INSERT INTO deposit (id, dt, is_reconciled) VALUES (140, '2023-07-25', 0); -- Deposit 140
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-05-10',   6071,  80, 41, 140, '');
UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 140)  WHERE id = 140;

-- 2023-10-04 Deposit 141
INSERT INTO deposit (id, dt, is_reconciled) VALUES (141, '2023-10-04', 0); -- Deposit 141
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-08-04',  19037,  40, 65, 141, 'Select Title Group - 3524786312');
UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 141)  WHERE id = 141;

-- 2023-12-02 Deposit 142
INSERT INTO deposit (id, dt, is_reconciled) VALUES (142, '2023-12-02', 0); -- Deposit 142

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-02',  375756,  40, 42, 142, 'Mainstreet Renewal - Amherst Residential LLC');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-22', 10059,  40,  6, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-28',  4646,  40, 10, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-27',  8296,  40, 11, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-23',  3654,  40, 12, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-22',  1054,  80, 15, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-20',  4920,  40, 17, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-21',  9868,  40, 18, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-27',  5987,  40, 20, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-22',   110,  40, 30, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-25',  3456,  40, 31, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-24',   151,  40, 32, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-12-01',  5865,  40, 35, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-24',  1019,  80, 36, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-25',  2654,  40, 37, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-23',  5062,  40, 38, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-20',  5454,  40, 40, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-21',  3700,  40, 44, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-25',  5341,  40, 45, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-21',  1918,  40, 47, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-20',  6638,  40, 50, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-30',  3516,  40, 53, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-25',  5433,  40, 61, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-27',  1305,  40, 64, 142, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-27',  9197,  40, 66, 142, '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 142)  WHERE id = 142;

-- 2023-12-12 Deposit 143
INSERT INTO deposit (id, dt, is_reconciled) VALUES (143, '2023-12-12', 0); -- Deposit 143

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-26',    2034,  40,  1, 143, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-28',    3191,  40, 16, 143, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-29',    3026,  40, 19, 143, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-12-04',    4070,  40, 21, 143, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-25',     105,  40, 22, 143, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-12-01',       0,  40, 33, 143, 'Cash payment');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-27',   18864,  15, 46, 143, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-12-01',    3197,  40, 49, 143, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-12-07',      54,  40, 54, 143, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-28',     275,  40, 60, 143, '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 143)  WHERE id = 143;

-- 2023-12-15 Deposit 144 
INSERT INTO deposit (id, dt, is_reconciled) VALUES (144,  '2023-12-15', 0); -- Deposit 144 

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-12-11',   5852,  40,  4, 144, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-12-12',   2157,  40,  7, 144, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-12-10',   2207,  40, 23, 144, '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-12-05',   1384,  40, 56, 144, '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 144)   WHERE id = 144; 

-- START of 2024 ------------------------------------------------------------------------------------------------
-- 2024-01-02 Deposit 145 
INSERT INTO deposit (id, dt, is_reconciled) VALUES (145,  '2024-01-02', 0); -- Deposit 145 

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-11-23',      0,  40,  3, 145,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-12-18',    800,  40,  8, 145,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-12-13',   9740,  40, 13, 145,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-12-14',   6732,  40, 34, 145,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-12-28',   1071,  40, 58, 145,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-12-20',  32315,  40, 59, 145,  'Synergy Title - FILE: SYN2319413');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-12-17',   3093,  40, 63, 145,  '');

UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 145)  WHERE id = 145;
  
-- 2024-01-03 Deposit 146
INSERT INTO deposit (id, dt, is_reconciled) VALUES (146, '2024-01-03', 0); -- Deposit 146
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-12-23',    429,  40, 52, 146,  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('2023-12-29',    171,  40, 68, 146,  '');
UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = 146)  WHERE id = 146;


