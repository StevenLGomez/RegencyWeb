
# Owner Management Requirements

## Owner Management

__Actions Supported: public/staff/owners/index.php__
| Function          | type           | name              | value            |                       |
| :----------       |  :----------   | :---------------- | :--------------- | :-------------------- |
| __Owner History__ |                |                   |                  |                       |
| By Address        |                |                   |                  |                       |
| By Lot            |                |                   |                  |                       |
|                   |                |                   |                  |                       |
| __By Last Name__  |                |                   |                  |                       |
| Enter Last Name   |                |                   |                  |                       |
|                   |                |                   |                  |                       |
| __View Rentals__  |                |                   |                  |                       |
| View              |                |                   |                  |                       |
|                   |                |                   |                  |                       |
| __New Owner__     |                |                   |                  |                       |
| Create            |                |                   |                  |                       |
|                   |                |                   |                  |                       |
|                   |                |                   |                  |                       |



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


---

__Create Owner Form Layout__

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
| Property Address          | 3759 Hyatt Court |
| Lot #                     |                  |
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
__Owner Workflow__




__TODO List__   
- [X] Create logic to handle previous current owner cancellation when entering a new one.
- [ ] Review Owner Variables currently used
- [ ] Document Owner workflow
- [ ] Determine missing requirements



