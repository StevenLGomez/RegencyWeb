
# Owner Management Requirements

> $\_POST variables are **BOLD** in the following table

__Actions Supported: public/staff/owners/index.php__
| Function                | input type             | name                          | value                            |
| :----------             |  :----------           | :----------------             | :---------------                 |
| __Show Owner History__  |                        |                               |                                  |
| Address:                | label for "address_id" | Address:                      |                                  |
|                         | name="address_id"      | id="address_id"               |                                  |
|                         | input type="submit"    | name=**"submit"**             | (Button) value="View By Address" |
|                         |                        |                               |                                  |
| Lot ID:                 | label for "lot_number" | Lot ID:                       |                                  |
|                         | name="lot_number"      | id="lot_number"               |                                  |
|                         | input type="submit"    | name=**"submit"**             | (Button) value="View By Lot"     |
|                         |                        |                               |                                  |
| __Search By Last Name__ |                        |                               |                                  |
| Start of Last Name      | label for "last_name"  | Start Of Last Name            |                                  |
|                         | input type="text"      | id="last_name"                | name="last_name"                 |
|                         | input type="submit"    | name=**"search_last_name"**   | (Button) value="Search"          |
|                         |                        |                               |                                  |
| __View Rentals__        |                        |                               |                                  |
|                         | input type="submit"    | name=**"view_rentals"**       | (Button) value="View"            |
|                         |                        |                               |                                  |
| __New Owner__           |                        |                               |                                  |
|                         | input type="submit"    | name=**"create_owner"**       | (Button) value="Add"             |
|                         |                        |                               |                                  |



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

__Owner Pages workflow__

| __owner_index.php__     |                        |                               |                     |                   |    |
| :----------             | :-------               | :---                          | :---                | :---              | :--- |
|                         |                        |                               |                     |                   |      |
| __$\_POST__             | YES --->               | 'search_by_last_name'         | YES                 | $switch_action    |      |
| NO                      |                        | NO                            |                     | 'Search Owners'   |      |
| |                       |                        | |                             |                     |                   |      |
| |                       |                        | |                             |                     | $page_title       |      |
| |                       |                        | |                             |                     | 'Owner Search'    |      |
| |                       |                        | V                             |                     |                   |      |
| |                       |                        | 'show_create_owner_form'      | YES                 | $switch_action    |      |
| |                       |                        | NO                            |                     | 'ShowCreateOwnerForm' |      |
| |                       |                        | |                             |                     |                   |      |
| |                       |                        | |                             |                     | $page_title       |      |
| |                       |                        | |                             |                     | 'Create Owner'    |      |
| |                       |                        | V                             |                     |                   |      |
| |                       |                        | 'apply_owner_changes_button'  | YES                 | $switch_action    |      |
| |                       |                        | NO                            |                     | 'ApplyOwnerChanges' |      |
| |                       |                        | |                             |                     |                   |      |
| |                       |                        | |                             |                     | $page_title       |      |
| |                       |                        | |                             |                     | 'Apply Owner Changes' |      |
| |                       |                        | V                             |                     |                   |      |
| |                       |                        | 'add_owner_complete_button'   | YES                 | $switch_action    |      |
| |                       |                        | NO                            |                     | 'AddNewOwnerToDB' |      |
| |                       |                        | |                             |                     |                   |      |
| |                       |                        | |                             |                     | $page_title       |      |
| |                       |                        | |                             |                     | 'Review New Owner' |      |
| |                       |                        | V                             |                     |                   |      |
| |                       |                        | 'view_rentals'                | YES                 | $switch_action    |      |
| |                       |                        | NO                            |                     | 'ViewRentals'     |      |
| |                       |                        | |                             |                     |                   |      |
| |                       |                        | |                             |                     | $page_title       |      |
| |                       |                        | |                             |                     | 'Rental Properties' |      |
| |                       |                        | V                             |                     |                   |      |
| |                       |                        | 'address_id'                  | YES                 | $switch_action    |      |
| |                       |                        | NO                            |                     | 'ShowOwnerHistory" |      |
| |                       |                        | |                             |                     |                   |      |
| |                       |                        | |                             |                     | $page_title       |      |
| |                       |                        | |                             |                     | 'History By Address' |      |
| |                       |                        | V                             |                     |                   |      |
| |                       |                        | 'lot_number'                  | YES                 | $switch_action    |      |
| |                       |                        | NO                            |                     | 'ShowOwnerHistory" |      |
| |                       |                        | |                             |                     |                   |      |
| |                       |                        | |                             |                     | $page_title       |      |
| |                       |                        | |                             |                     | 'History By Lot'  |      |
| |                       |                        | |                             |                     |                   |      |
| |                       |                        | > --->                        | ---->               | --->              | ---V |
| |                       |                        |                               |                     |                   |      |
| V                       |                        |                               |                     |                   |      |
| $\_GET                  | YES --->               | 'view_owner_button'           | YES                 | $switch_action    |      |
| NO                      |                        | NO                            |                     | 'ViewOwnerDetail' |      |
|                         |                        | |                             |                     |                   |      |
|                         |                        | |                             |                     | $page_title       |      |
|                         |                        | |                             |                     | 'View Owner Detail' |      |
|                         |                        | V                             |                     |                   |      |
|                         |                        | 'edit_owner_button'           | YES                 | $switch_action    |      |
|                         |                        | NO                            |                     | 'EditOwnerDetail' |      |
|                         |                        | |                             |                     |                   |      |
|                         |                        | |                             |                     | $page_title       |      |
|                         |                        | |                             |                     | 'Edit Owner Detail' |      |
|                         |                        | |                             |                     |                   |      |
|                         |                        | > --->                        | ---->               | --->              | ---V |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |
|                         |                        |                               |                     |                   |      |


---
__TODO List__   
- [X] Create logic to handle current owner cancellation when entering a new one.
- [ ] Review Owner Variables currently used
- [ ] Document Owner workflow
- [ ] Determine missing requirements
---



