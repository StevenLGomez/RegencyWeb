
## Regency Web Documentation ##

# Table of contents
1. [Introduction](#introduction)
2. [Some paragraph](#paragraph1)
    1. [Sub paragraph](#subparagraph1)
3. [Another paragraph](#paragraph2)

## This is the introduction <a name="introduction"></a>
Some introduction text, formatted in heading 2 style

## Some paragraph <a name="paragraph1"></a>
The first paragraph text

### Sub paragraph <a name="subparagraph1"></a>
This is a sub paragraph, formatted in heading 3 style

## Another paragraph <a name="paragraph2"></a>
The second paragraph text

**Variable values for Owner Page**

| Template Variable | New author value | Existing author value |
| :---------------- | :--------------- | :-------------------- |
| $pageTitle        | 'Search Owners'     | 'Edit Author'         |
| $action           | 'addform'        | 'editform'            |
| $name             | ''(empty string) | Existing name         |
| $email            | ''(empty string) | Existing email addr   |
| $id               | ''(empty string) | Existing Author ID    |
| $button           | 'Add Author'     | 'Update Author'       |


[Good PHP debugging link:](https://stackify.com/php-debugging-guide/)


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


