
# Owner Management Requirements

__Create Owner Form Layout___

| __Primary Owner__         |                  |
| :-------                  | :----------      |
| First Name                | Abraham          |
| Middle                    |                  |
| Last  Name                | Lincoln          |
| Phone                     | 636-404-1920     |
| Email                     | abe@lincoln.com  |
|                           |                  |
| __Secondary Owner__       |                  |
| First Name                | Amelia           |
| Middle                    | Mary             |
| Last Name                 | Earhart          |
| Phone                     | 1-900-123-4567   |
| Email                     | amlost@some.net  |
|                           |                  |
| __Property Information__  |                  |
| Lot #                     |                  |
| Property Address          | 3759 Hyatt Court |
| Purchased (YYYY_MM_DD)    | 2022-05-01       |
| Current Owner             | X                |
| Is Rental                 | O                |
|                           |                  |
| __Rental Property Info__  |                  |
| Owner Address             | 101 Main Street  |
| Owner City                | Long Beach       |
| Owner State               | CA               |
| Owner Zip                 | 90815            |
|                           |                  |
| Notes                     |                  |
|                           |                  |
| __Action__                |                  |

---
## Owner Management

__Variables for public/staff/owners/index.php__
| Function         | type           | name              | value            |                       |
| :----------      |  :----------   | :---------------- | :--------------- | :-------------------- |
| __Full View__    |                |                   |                  |                       |
|                  | "text"         | "last_name"       |                  |                       |
|                  | "input"        | view_owner        | View             |                       |
|                  | "input"        | edit_owner        | Edit             |                       |
|                  | "input"        | create_owner      | Create           |                       |
| __View Rentals__ |                |                   |                  |                       |
|                  | "input"        | view_rentals      | View Rentals     |                       |
|                  |                |                   |                  |                       |
| __Lot History__  |                |                   |                  |                       |
|                  | "select"       | "address_id"      | "address_id"     |                       |
|                  | "submit"       | "submit"          | Display History  |                       |
|                  |                |                   |                  |                       |
|                  |                |                   |                  |                       |


__Owner Workflow__



__Current Status__

Failure from first INSERT attempt   
Adding from form INSERT INTO owner (fk_lot_id, first, mi, last, first_2, mi_2, last_2, address, city, state, zip, phone, email, phone_2, email_2, buy_date, is_current, is_rental) VALUES ('''''''''''''''''''''''''''''''''''')Insert Failed :(Column count doesn't match value count at row 1


