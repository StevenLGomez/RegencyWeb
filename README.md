
# Regency Estates Web Site Documentation #

## Table of contents
1. [Introduction](#introduction)
2. [Owner Management](#owner)
3. [Section 3](#section3)
    1. [Sub paragraph](#section3_sp_1)
4. [Another paragraph](#section4)
5. [References](#references)
    1. [PHP Debugging](#referenes_sp_1)

---
<a name="introduction"></a>
### Introduction
Development site for Regency Estates Homeowners Association
management web site.

---
<a name="owner"></a>
## Owner Management

**Variable values for Owner Page**
| Template Variable | New author value | Existing author value |
| :---------------- | :--------------- | :-------------------- |
| $pageTitle        | 'Search Owners'  | 'Edit Author'         |
| $action           | 'addform'        | 'editform'            |
| $name             | ''(empty string) | Existing name         |
| $email            | ''(empty string) | Existing email addr   |
| $id               | ''(empty string) | Existing Author ID    |
| $button           | 'Add Author'     | 'Update Author'       |


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

---
<a name="section3"></a>
### Section 3
Section 3 paragraph text

<a name="section3_sp_1"></a>
### Sub paragraph
This is a sub paragraph, formatted in heading 3 style

---
<a name="references"></a>
### References
Section 4 paragraph text

<a name="referenes_sp_1"></a>
### PHP Support Information Links

Good PHP debugging link [here](https://stackify.com/php-debugging-guide/)

---
