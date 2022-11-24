
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



