
-- TABLE expense --------------------------------------------------------------
-- Do not include ID column, it will be populated automatically

-- 2020 Expenses
START TRANSACTION;
INSERT INTO `expense` (dt, ck_no, payee, amount, fk_cat_id, note) VALUES
    ('2020-07-18', 1278, 'Darla Yoakum',                300.00,   2, 'Apr, May, June Mowing'),
    ('2020-09-01',    0, 'Missouri Secretary of State', 10.50,    6, 'Annual Filing Fee'),
    ('2020-10-05', 1279, 'Darla Yoakum',                200.00,   2, 'July & August Mowing'),
    ('2020-11-03', 1280, 'Postmaster',                  33.00,    5, 'Postage Stamps'),
    ('2020-11-20', 1281, 'Darla Yoakum',                300.00,   2, 'Sept, Oct, Nov Mowing');
COMMIT;

-- 2021 Expenses
START TRANSACTION;
INSERT INTO `expense` (dt, ck_no, payee, amount, fk_cat_id, note) VALUES
    ('2021-02-15', 1282, 'State Farm',                 1316.00,   4, 'Liability Insurance'),
    ('2021-04-01', 1283, 'Postmaster',                  168.00,   5, 'PO Box Renewal'),
    ('2021-04-01', 1284, 'Postmaster',                   36.00,   5, 'PO Box Renewal (price increase)'),
    ('2021-06-03', 1285, 'Darla Yoakum',                300.00,   2, 'Mar, Apr, May Mowing'),
    ('2021-08-23', 1286, 'Darla Yoakum',                256.50,   2, 'Jun, Jul Mowing & herbicide'), 
    ('2021-10-16',    0, 'Missouri Secretary of State',  15.50,   6, 'Annual Filing Fee'),
    ('2021-11-08', 1287, 'Darla Yoakum',                200.00,   2, 'Aug & Sept Mowing'),
    ('2021-11-10', 1288, 'Postmaster',                   46.40,   5, 'Postage Stamps'),
    ('2021-12-20', 1289, 'Darla Yoakum',                200.00,   2, 'Oct & Nov Mowing');
COMMIT;

-- 2022 Expenses
START TRANSACTION;
INSERT INTO `expense` (dt, ck_no, payee, amount, fk_cat_id, note) VALUES
    ('2022-03-19', 1290, 'State Farm',                 1316.00,   4, 'Liability Insurance'),
    ('2022-04-09', 1297, 'Postmaster',                  232.00,   5, 'PO Box Renewal'),
    ('2022-05-17', 1298, 'Darla Yoakum',                375.00,   2, 'Mar, Apr, May Mowing'),
    ('2022-09-12', 1299, 'Darla Yoakum',                375.00,   2, 'Jun, Jul, Aug Mowing'),
    ('2022-09-24', 1300, 'Missouri Secretary of State',  15.50,   6, 'Annual Filing Fee'),
    ('2022-11-07',    0, 'Postmaster',                   36.00,   5, 'Postage Stamps (debit card)'),
    ('2022-11-14',    0, 'Office Depot',                174.86,   5, 'Print Supplies (debit card)'),
    ('2022-12-29', 1301, 'Darla Yoakum',                375.00,   2, 'Sep, Oct, Nov Mowing');
COMMIT;

-- 2023 Expenses
START TRANSACTION;
INSERT INTO `expense` (dt, ck_no, payee, amount, fk_cat_id, note) VALUES
    ('2023-02-25', 1302, 'State Farm',                 1264.00,   4, 'Liability Insurance'),
    ('2023-04-19',    0, 'Postmaster',                  248.00,   5, 'PO Box Renewal (debit)'),
    ('2023-05-29', 1303, 'Darla Yoakum',                125.00,   2, 'Apr 2023 mowing'),
    ('2023-07-05', 1304, 'Darla Yoakum',                500.00,   2, '3 Mowings & spray'),
    ('2023-09-05', 1305, 'Darla Yoakum',                125.00,   2, 'July Mowing'),
    ('2023-09-10',    0, 'Missouri Secretary of State',  15.55,   6, 'Annual Filing Fee (debit)'),
    ('2023-11-18',    0, 'Postmaster',                   26.40,   5, 'Postage Stamps (debit)'),
    ('2023-12-27', 1306, 'Darla Yoakum',                375.00,   2, 'Sep, Oct, Nov Mowing');
COMMIT;



