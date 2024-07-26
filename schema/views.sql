
-- Views ----------------------------------------------------------------------

-- DROP VIEW IF EXISTS amount_paid_per_lot_v;
-- CREATE VIEW amount_paid_per_lot_v AS 
--     SELECT l.id AS Lot, 
--         l.address AS Address, 
--         o.last AS Last, 
--         o.first AS First, 
--         (SELECT SUM(amount) FROM fees WHERE fk_lot_id = l.id) FROM lot l, 
--         owner o WHERE o.lot = l.id AND o.is_current = 1 
--         ORDER BY l.id
--         ;

-- DROP VIEW IF EXISTS owner_info_v;
-- CREATE VIEW owner_info_v AS 
--     SELECT l.id AS Lot, 
--         l.address AS Address, 
--         o.last AS Last, 
--         o.first AS First FROM lot l, 
--         owner o WHERE o.lot = l.id AND o.is_current = 1 
--         ORDER BY l.id
--         ;


-- COPIED from SQLite project WILL FAIL IF USED AS IS -------------------------------------
-- DROP VIEW IF EXISTS owner_mailing_export_v;
-- CREATE VIEW owner_mailing_export_v AS 
--     SELECT l.id AS Lot, 
--         o.is_current AS Curr, 
--         o.last AS Last, 
--         o.first AS First, 
--         o.address AS Owner_Add, 
--         o.city AS Owner_City, 
--         o.state AS O_St, 
--         o.zip AS O_Zip, 
--         l.address AS Lot_Add, 
--         o.phone AS Phone, 
--         o.email, 
--         o.buy_date, 
--         (SELECT SUM(amount) FROM fees WHERE fk_lot_id = l.id) AS Total FROM owner AS o, 
--         lot AS l WHERE o.lot = l.id AND is_current = 1 ORDER BY Total DESC, 
--         l.id, 
--         buy_date
--         ;

-- The following VIEW is useful for finding owners who are behind in their payments;
-- not useful for the real "owner_mailing_export_v" function as with python due to 
-- separation of Lot Addresses & Owner Addresses to handle rental properties.
DROP VIEW IF EXISTS owner_mailing_export_v;
CREATE VIEW owner_mailing_export_v AS 
    SELECT 
        l.id AS Lot, 
        o.is_current AS Curr, 
        o.last AS Last, 
        o.first AS First, 
        o.address AS Owner_Add, 
        o.city AS Owner_City,  
        o.state AS O_St, 
        o.zip AS O_Zip, 
        l.address AS Lot_Add, 
        o.phone AS Phone, 
        o.email, 
        o.buy_date, 
    (SELECT SUM(amount) FROM fees WHERE fk_lot_id = l.id) 
    AS Total FROM owner AS o, lot AS l 
    WHERE o.fk_lot_id = l.id AND o.is_current = 1 
    ORDER BY Total ASC;

-- ----------------------------------------------------------------------------
-- End of VIEWs  --------------------------------------------------------------
-- ----------------------------------------------------------------------------


