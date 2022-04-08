
# Regency Estates Web Site Development Documentation #

<a name="toc"></a>
## Table of contents
1. [Introduction](#introduction)

2. [Category](#category)
    1. [Category Page Variables](#category_sp_1)
    2. [Category Workflow](#category_sp_2)

3. [Deposit](#deposit)
    1. [Deposit Page Variables](#deposit_sp_1)
    2. [Deposit Workflow](#deposit_sp_2)

4. [Expense](#expense)
    1. [Expense Page Variables](#expense_sp_1)
    2. [Expense Workflow](#expense_sp_2)

5. [Fee](#fee)
    1. [Fee Page Variables](#fee_sp_1)
    2. [Fee Workflow](#fee_sp_2)

6. [Owner Management](#owner)
    1. [Owner Page Variables](#owner_sp_1)
    2. [Owner Workflow](#owner_sp_2)
	2. [Add Owner Screen Layout](#owner_sp_3)

7. [References](#references)
    1. [PHP Debugging](#referenes_sp_1)

---
<a name="Introduction"></a>
### Introduction
This is the development repository for Regency Estates Homeowners Association
management web site.

---
<a name="category"></a>
### Category Management

<a name="category_sp_1"></a>
**Variables for public/staff/categories/index.php**
Placeholder table for variables
| Template Variable | New author value | Existing author value |
| :---------------- | :--------------- | :-------------------- |
| $pageTitle        | 'Search Owners'  | 'Edit Author'         |

<a name="category_sp_2"></a>
### Category Workflow
Placeholder diagram for workflow 
~~~~~ {.ditaa .no-separation}

+-----------------+       +--------+           +--------------------+
| markdown source |------>| mdddia |------*--->| processed markdown |
+-----------------+       +--------+      |    +--------------------+
~~~~~

[**^ Top ^**](#toc)

---
<a name="deposit"></a>
### Deposit Management

<a name="deposit_sp_1"></a>
**Variables for public/staff/deposit/index.php**
Placeholder table for variables
| Template Variable | New author value | Existing author value |
| :---------------- | :--------------- | :-------------------- |
| $pageTitle        | 'Search Owners'  | 'Edit Author'         |

<a name="deposit_sp_2"></a>
### Deposit Workflow
Placeholder diagram for workflow 
~~~~~ {.ditaa .no-separation}
                                  
+-----------------+       +--------+           +--------------------+
| markdown source |------>| mdddia |------*--->| processed markdown |
+-----------------+       +--------+      |    +--------------------+
~~~~~

```flow
st=>start: Start:>http://www.google.com[blank]
e=end:>http://www.google.com
op1=operation: My Operation
sub1=subroutine: My Subroutine
cond=>condition: Yes
or No?:>http://www.google.com
io=>inputout: catch something...

st->op1->cond
cond(yes) >io->e
cond(no) ->sub1(right)->op1
```

[**^ Top ^**](#toc)

---
<a name="expense"></a>
### Expense Management

<a name="expense_sp_1"></a>
**Variables for public/staff/expenses/index.php**
Placeholder table for variables
| Template Variable | New author value | Existing author value |
| :---------------- | :--------------- | :-------------------- |
| $pageTitle        | 'Search Owners'  | 'Edit Author'         |

<a name="expense_sp_2"></a>
### Expense Workflow
Placeholder diagram for workflow 
~~~~~ {.ditaa .no-separation}
                                  
+-----------------+       +--------+           +--------------------+
| markdown source |------>| mdddia |------*--->| processed markdown |
+-----------------+       +--------+      |    +--------------------+
~~~~~

[**^ Top ^**](#toc)

---
<a name="fee"></a>
### Fee Management

<a name="fee_sp_1"></a>
**Variables for public/staff/fees/index.php**
Placeholder table for variables
| Template Variable | New author value | Existing author value |
| :---------------- | :--------------- | :-------------------- |
| $pageTitle        | 'Search Owners'  | 'Edit Author'         |

<a name="fee_sp_2"></a>
### Fee Workflow
Placeholder diagram for workflow 
~~~~~ {.ditaa .no-separation}
                                  
+-----------------+       +--------+           +--------------------+
| markdown source |------>| mdddia |------*--->| processed markdown |
+-----------------+       +--------+      |    +--------------------+
~~~~~

[**^ Top ^**](#toc)

---
<a name="owner"></a>
## Owner Management

<a name="owner_sp_1"></a>
**Variables for public/staff/owners/index.php**
| Template Variable | New author value | Existing author value |
| :---------------- | :--------------- | :-------------------- |
| $pageTitle        | 'Search Owners'  | 'Edit Author'         |
| $action           | 'addform'        | 'editform'            |
| $name             | ''(empty string) | Existing name         |
| $email            | ''(empty string) | Existing email addr   |
| $id               | ''(empty string) | Existing Author ID    |
| $button           | 'Add Author'     | 'Update Author'       |


<a name="owner_sp_2"></a>
**Owner Workflow**
~~~~~ {.ditaa .no-separation}
                                  
+-----------------+       +--------+           +--------------------+
| markdown source |------>| mdddia |------*--->| processed markdown |
+-----------------+       +--------+      |    +--------------------+
                              |           \--->| image files        |
                    +------------------+       +--------------------+
                    | diagram creation |
                    +------------------+
                    | ditaa/dot/rdfdot |
                    +------------------+
~~~~~

<a name="owner_sp_3"></a>
**Add Owner Screen Layout**

|                | Primary Owner   | Secondary Owner |
| :-------       | :----------     | :-------------  |
| First Name     | Abraham         | Amelia          |
| Middle         |                 | Mary            |
| Last  Name     | Lincoln         | Earhart         |
| Phone          | 636-404-1920    | 1-900-123-4567  |
| Email          | abe@lincoln.com | findme@aol.com  |
|                |                 |                 |
| Buy Date       | 2022-05-01      |                 |
| Current Owner  | No              |                 |
| Is Rental      | Yes             |                 |
| Address        | 101 Main Street |                 |
| City           | Long Beach      |                 |
| State          | CA              |                 |
| Zip            | 90815           |                 |
|                |                 |                 |
|                | **Submit**      |                 |


[**^ Top ^**](#toc)

---
<a name="references"></a>
## References

<a name="referenes_sp_1"></a>
### PHP Support Information Links

Good PHP debugging link [here](https://stackify.com/php-debugging-guide/)  
Check out Laravel PHP Framwork [here](https://laravel.com)  

[**^ Top ^**](#toc)

---

