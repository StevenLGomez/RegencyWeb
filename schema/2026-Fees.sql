
-- This SQL file is used to enter fee payments deposited after 2026 01 01.
--
-- 
-- YYYY-MM-DD Deposit ddd
-- INSERT INTO deposit (id, dt, is_reconciled) VALUES(ddd, 'YYYY-MM-DD', 0); -- Deposit ddd
-- INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, note) VALUES('YYYY-MM-DD',  ck,  amt,  lot, ddd,  '');
-- UPDATE deposit SET amount = (SELECT SUM(amount) FROM fees WHERE fk_deposit_id = ddd) WHERE id = ddd;

-- The following entries were entered manually here while the web form was being finalized.
-- Entered manually to track deposits that were actually made in the mean time to prevent
-- hanging on to checks for too long.

-- 2026-00-00 Deposit 165
INSERT INTO deposit (id, dt, is_reconciled) VALUES(165, '2025-11-07', 0); -- Deposit 165

INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-12-25',   3457,  50, 59, 165, 'Grieb',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-12-30',    144,  50, 65, 165, 'Matyi',  '');
INSERT INTO fees(dt, ck_no, amount, fk_lot_id, fk_deposit_id, payee, note) VALUES('2025-12-15',   5096,  40, 42, 165, '',  'Main Street Renewal LLC');


